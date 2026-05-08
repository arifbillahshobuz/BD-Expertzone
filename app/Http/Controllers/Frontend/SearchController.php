<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $tab = $request->input('tab', 'post'); // 'post', 'friend', 'comment'

        if (!$query) {
            return response()->json(['html' => '']);
        }

        $html = '';

        if ($tab === 'post') {
            $posts = Post::with([
                'user:id,name,username,avatar,email,phone,password,role,designation_id',
                'reactions',
                'reactions.user:id,name,username,avatar,email,phone,password,role,designation_id',
                'comments',
                'comments.user'
            ])
                ->where('content', 'LIKE', "%{$query}%")
                ->latest()
                ->get();

            $html = view('user-interface.pages.search.partials.posts', compact('posts'))->render();
        } elseif ($tab === 'friend') {
            $users = User::where('name', 'LIKE', "%{$query}%")
                ->orWhere('username', 'LIKE', "%{$query}%")
                ->latest()
                ->get();
            $html = view('user-interface.pages.search.partials.friends', compact('users'))->render();
        } elseif ($tab === 'comment') {
            $comments = Comment::with(['user', 'post'])->where('content', 'LIKE', "%{$query}%")->latest()->get();
            $html = view('user-interface.pages.search.partials.comments', compact('comments'))->render();
        }

        return response()->json([
            'html' => $html,
            'tab' => $tab,
            'query' => $query
        ]);
    }

    public function saveRecent(Request $request)
    {
        $query = trim($request->input('q'));
        if (!$query) {
            return response()->json(['success' => false]);
        }

        $recent = session()->get('recent_searches', []);
        if (!is_array($recent))
            $recent = [];

        // Smart Replacement: If new query starts with the most recent one, replace it
        if (!empty($recent)) {
            $last = $recent[0]['query'] ?? '';
            if (str_starts_with(strtolower($query), strtolower($last)) || str_starts_with(strtolower($last), strtolower($query))) {
                array_shift($recent);
            }
        }

        // Remove any other duplicates
        $recent = array_filter($recent, function ($item) use ($query) {
            $val = is_array($item) ? ($item['query'] ?? '') : $item;
            return trim(strtolower($val)) !== trim(strtolower($query));
        });

        // Add to top
        array_unshift($recent, [
            'query' => $query,
            'time' => date('Y-m-d H:i:s')
        ]);

        // Keep maximum of 10 unique recent searches
        $recent = array_values(array_slice($recent, 0, 10));

        session()->put('recent_searches', $recent);
        session()->save();

        $html = view('user-interface.pages.search.partials.recent-list', ['recentSearches' => $recent])->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    public function deleteRecent(Request $request)
    {
        $query = trim($request->input('q'));
        $recent = session()->get('recent_searches', []);

        $recent = array_filter($recent, function ($item) use ($query) {
            return strtolower($item['query']) !== strtolower($query);
        });

        session()->put('recent_searches', array_values(array_slice($recent, 0, 10)));
        session()->save();

        return response()->json(['success' => true]);
    }

    public function clearRecent()
    {
        session()->forget('recent_searches');
        return response()->json(['success' => true]);
    }
}


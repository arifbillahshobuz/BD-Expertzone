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
        
        // Remove existing if any, to boost it to the top
        $recent = array_filter($recent, function($item) use ($query) {
            return strtolower($item['query']) !== strtolower($query);
        });

        array_unshift($recent, [
            'query' => $query,
            'time' => now()->toDateTimeString()
        ]);

        // Keep maximum of 10 recent searches
        $recent = array_slice($recent, 0, 10);
        
        session()->put('recent_searches', $recent);

        return response()->json(['success' => true]);
    }

    public function deleteRecent(Request $request)
    {
        $query = trim($request->input('q'));
        $recent = session()->get('recent_searches', []);
        
        $recent = array_filter($recent, function($item) use ($query) {
            return strtolower($item['query']) !== strtolower($query);
        });

        session()->put('recent_searches', array_values($recent));

        return response()->json(['success' => true]);
    }

    public function clearRecent()
    {
        session()->forget('recent_searches');
        return response()->json(['success' => true]);
    }
}


<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Partner;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function test()
    {
        return view('layouts.guest');
    }
    public function home()
    {
        $user = auth()->user();
        $currentPage = (int) request()->get('page', 1);
        $perPage = 20;

        $postsRelation = [
            'user:id,name,username,avatar,email,phone,password,role,designation_id',
            'reactions' => function ($q) {
                $q->latest()->take(5);
            }, // Only for avatars
            'reactions.user:id,name,username,avatar,email,phone,password,role,designation_id',
            // Load only parent comments for the feed to keep it fast
            'comments' => function ($q) {
                $q->whereNull('parent_id')->latest()->take(5);
            },
            'comments.user:id,name,username,avatar',
            'comments.reactions',
            'comments.replies' => function ($q) {
                $q->latest()->take(2);
            },
            'comments.replies.user:id,name,username,avatar',
        ];

        $userPostsQuery = Post::with($postsRelation)
            ->withCount(['reactions', 'comments']) // Get total counts efficiently
            ->where('post_type', 'user')
            ->latest()
            ->published();

        if ($currentPage == 1) {
            // First load: 7 Admin posts + 13 User posts
            $feedAdminPosts = Post::with($postsRelation)
                ->withCount(['reactions', 'comments'])
                ->where('post_type', 'admin')
                ->latest()
                ->published()
                ->take(7)
                ->get();

            // Use Simple Pagination for speed (prevents total count query)
            $posts = $userPostsQuery->simplePaginate(13);
        } else {
            // Manual simple pagination logic for offset
            $offset = 13 + ($currentPage - 2) * $perPage;
            // Fetch perPage + 1 to detect next page
            $items = $userPostsQuery->offset($offset)->limit($perPage + 1)->get();
            $hasNextPage = $items->count() > $perPage;
            if ($hasNextPage) {
                $items->pop();
            }

            $posts = new \Illuminate\Pagination\Paginator(
                $items,
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        if (request()->ajax()) {
            $view = '';
            foreach ($posts as $post) {
                $view .= view('user-interface.pages.post.show-post', compact('post'))->render();
            }
            return response()->json([
                'html' => $view,
                'nextPageUrl' => $posts->nextPageUrl()
            ]);
        }

        $partners = Partner::all();
        $friends = collect();
        $friendRequests = collect();
        $jobPosts = collect();

        if ($user) {
            // Get friends
            $friends = $user->friends()->latest()->take(5)->get();

            // Get pending friend requests
            $friendRequests = \App\Models\FriendRequest::where('receiver_id', $user->id)
                ->where('status', 'pending')
                ->with('sender')
                ->latest()
                ->take(5)
                ->get();

            // Get job-based posts (Always include admin, and add user posts matching designation)
            $jobPosts = Post::with('user')
                ->where(function ($query) use ($user) {
                    if ($user->designation_id) {
                        $query->whereHas('user', function ($q) use ($user) {
                            $q->where('designation_id', $user->designation_id)
                                ->where('id', '!=', $user->id);
                        })->where('post_type', 'user');
                    }

                    $query->orWhere('post_type', 'admin');
                })
                ->latest()
                ->published()
                ->take(10)
                ->get();
        }

        return view('user-interface.app', compact('partners', 'posts', 'friends', 'friendRequests', 'jobPosts', 'feedAdminPosts'));
    }

    public function show($id)
    {
        $post = Post::with(['user', 'comments.user', 'reactions.user'])
            ->findOrFail($id);

        // If you want to show a list of posts (e.g., for sidebar)
        $posts = Post::latest()->take(10)->get();

        // Pass any other data needed (e.g., $friends, $partners)
        return view('user-interface.pages.post.show-post', compact('post', 'posts'));
    }

    public function partnerList()
    {
        $partners = Partner::all();
        return view('user-interface.pages.partner.list', compact('partners'));
    }

}

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
        $currentPage = request()->get('page', 1);
        $feedAdminPosts = collect();
        if ($currentPage == 1) {
            $feedAdminPosts = Post::with([
                'user:id,name,username,avatar,email,phone,password,role,designation_id',
                'reactions',
                'reactions.user:id,name,username,avatar,email,phone,password,role,designation_id',
                'comments',
                'comments.user'
            ])
                ->where('post_type', 'admin')
                ->latest()
                ->published()
                ->take(7)
                ->get();
        }

        $posts = Post::with([
            'user:id,name,username,avatar,email,phone,password,role,designation_id',
            'reactions',
            'reactions.user:id,name,username,avatar,email,phone,password,role,designation_id',
            'comments',
            'comments.user'
        ])
            ->where('post_type', 'user')
            ->latest()
            ->published()
            ->select('id', 'content', 'media', 'slug', 'is_published', 'type', 'post_type', 'published_at', 'created_at', 'updated_at', 'user_id', 'post_category_id', 'is_featured')
            ->paginate(10);

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

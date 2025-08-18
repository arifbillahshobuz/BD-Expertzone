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


//        dd($adminPosts);
//        $posts = Post::with(['user', 'reactions.user'])
//            ->latest()
//            ->published()
//            ->paginate(10);
        $posts = Post::with([
            'user:id,name,username,avatar,email,phone,password,role,designation_id',
            'reactions',
            'reactions.user:id,name,username,avatar,email,phone,password,role,designation_id'
        ])
            ->where('type', 0)
            ->latest()
            ->published()
            ->select('id','content','media','slug','is_published','type','published_at','user_id','post_category_id','is_featured')
            ->paginate(10);
        // $post = $posts->first();
        // dd($post->media);
        $partners = Partner::all();
        return view('user-interface.app', compact('partners', 'posts'));
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

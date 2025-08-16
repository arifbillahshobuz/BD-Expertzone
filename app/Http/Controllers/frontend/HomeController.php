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
        $jobCategories = PostCategory::where('title', '=', 'government')->get();
        $posts = Post::with(['user', 'reactions.user'])
            ->latest()
            ->published()
            ->paginate(10);

        // $post = $posts->first();
        // dd($post->media);

        $partners = Partner::all();
        return view('user-interface.app', compact('partners', 'posts'));
    }
    public function partnerList()
    {
        $partners = Partner::all();
        return view('user-interface.pages.partner.list', compact('partners'));
    }

}

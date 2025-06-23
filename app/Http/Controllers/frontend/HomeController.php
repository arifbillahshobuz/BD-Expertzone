<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $jobCategories = PostCategory::where('title', '=', 'government')->get();
        $partners = Partner::all();
        return view('user-interface.app', compact('partners'));
    }
    public function partnerList()
    {
        $partners = Partner::all();
        return view('user-interface.pages.partner.list', compact('partners'));
    }

}

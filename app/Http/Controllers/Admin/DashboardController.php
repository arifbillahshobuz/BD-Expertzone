<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Partner;
use App\Models\Designation;
use App\Models\PostCategory;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index(Request $request)
    {
        $stats = [
            'total_users' => User::count(),
            'total_posts' => Post::count(),
            'total_partners' => Partner::count(),
            'total_designations' => Designation::count(),
            'total_categories' => PostCategory::count(),
            
            // Recent data
            'recent_users' => User::latest()->limit(5)->get(),
            'recent_partners' => Partner::with('designation')->latest()->limit(5)->get(),
        ];

        return view('admin.app', compact('stats'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;
use App\Models\Partner;
use App\Models\Designation;
use App\Models\PostCategory;

class AdminProfileController extends Controller
{
     public function hi(Request $request)
    {
        $total_user = User::count();
        $total_posts = Post::count();
        $total_partners =  Partner::count();
        $total_designations = Designation::count();
        $total_categories = PostCategory::count();
        // Recent data
        $recent_users = User::latest()->limit(5)->get();
        $recent_partners = Partner::with('designation')->latest()->limit(5)->get();
        return view('admin.dashboard', compact([
            'total_user',
            'total_posts',
            'total_partners',
            'total_designations',
            'total_categories',
            'recent_users',
            'recent_partners'
        ]));
    }
    public function editProfile(): View
    {
        return view('admin.profile.edit-profile');
    }

    function updateProfile(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
            $user->password = bcrypt($request->password);
            $user->save();
        }
        return redirect()->back()->with('success', 'Password changed successfully.');
    }

}

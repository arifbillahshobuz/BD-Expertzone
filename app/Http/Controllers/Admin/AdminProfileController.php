<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    public function editProfile() :View
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

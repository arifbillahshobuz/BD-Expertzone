<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('user-list')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $users = User::with(['roles'])->withCount(['friends', 'followers', 'posts', 'comments', 'reactions'])->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        if (!auth()->user()->hasPermissionTo('user-list')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $user->load(['profile', 'designation', 'roles', 'posts' => function($q) {
            $q->latest()->limit(5);
        }, 'comments' => function($q) {
            $q->latest()->limit(5);
        }]);
        
        $user->loadCount(['friends', 'followers', 'posts', 'comments', 'reactions']);
        
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        if (!auth()->user()->hasPermissionTo('user-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!auth()->user()->hasPermissionTo('user-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'status' => ['required', 'in:active,inactive,banned'],
            'roles' => ['nullable', 'array'],
        ]);

        $data = $request->only(['name', 'username', 'email', 'phone', 'status']);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $avatar->getClientOriginalName();
            $path = 'uploads/users/';
            $avatar->move(public_path($path), $filename);
            $data['avatar'] = $path . $filename;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Sync Roles
        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            // Remove all roles if none selected (except maybe admin safety)
            $user->syncRoles([]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if (!auth()->user()->hasPermissionTo('user-delete')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        // For safety, maybe just soft delete or forbid deleting admins
        if ($user->hasRole('admin')) {
            return back()->with('error', 'Cannot delete an administrator.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

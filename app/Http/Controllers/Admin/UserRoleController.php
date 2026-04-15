<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Show the role assignment form.
     */
    public function index()
    {
        $roles = Role::all();
        // Just show the form initially
        return view('admin.roles.assign', compact('roles'));
    }

    /**
     * Handle the role assignment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Roles assigned to ' . $user->name . ' successfully.');
    }

    /**
     * Search users for Select2.
     */
    public function search(Request $request)
    {
        $term = $request->term;
        $users = User::where('name', 'LIKE', "%$term%")
            ->orWhere('email', 'LIKE', "%$term%")
            ->orWhere('username', 'LIKE', "%$term%")
            ->limit(10)
            ->get(['id', 'name', 'email']);

        return response()->json($users->map(fn($user) => [
            'id' => $user->id,
            'text' => $user->name . ' (' . $user->email . ')'
        ]));
    }
}

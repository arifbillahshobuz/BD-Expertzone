<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->hasAnyPermission(['role-list', 'role-create', 'role-edit', 'role-delete'])) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->hasPermissionTo('role-create')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('role-create')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        // Convert permission IDs from strings to integers to avoid "permission named ID" error
        $permissions = array_map('intval', $request->input('permission'));
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->hasPermissionTo('role-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('role-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions(array_map('intval', $request->input('permission')));

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasPermissionTo('role-delete')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully');
    }
}

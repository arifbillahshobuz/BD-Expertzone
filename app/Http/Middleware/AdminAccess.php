<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Allow access if user is admin (role column or Spatie role)
        if ($user->role === 'admin' || $user->hasRole('admin')) {
            return $next($request);
        }

        // Allow access if user has any of the admin-level permissions
        $adminPermissions = [
            'dashboard-view',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'permission-list', 'permission-create', 'permission-edit', 'permission-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'post-list', 'post-create', 'post-edit', 'post-delete',
            'post-category-list', 'post-category-create', 'post-category-edit', 'post-category-delete',
            'designation-list', 'designation-create', 'designation-edit', 'designation-delete',
            'partner-list', 'partner-create', 'partner-edit', 'partner-delete',
            'setting-manage'
        ];

        if ($user->hasAnyPermission($adminPermissions)) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'You do not have permission to access the admin panel.');
    }
}

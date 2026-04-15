<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'dashboard-view',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'post-category-list',
            'post-category-create',
            'post-category-edit',
            'post-category-delete',
            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-delete',
            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',
            'setting-manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign created permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions(['post-list', 'post-create']);

        // Assign admin role to specific user
        $admin = User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $admin->assignRole($adminRole);
        } else {
             $firstUser = User::first();
             if($firstUser) {
                 $firstUser->assignRole($adminRole);
             }
        }
    }
}

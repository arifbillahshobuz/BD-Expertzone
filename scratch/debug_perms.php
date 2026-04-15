<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

echo "Users and Permissions Check:\n";
foreach (User::all() as $user) {
    echo "--- User: {$user->email} ---\n";
    echo "Role Column: {$user->role}\n";
    echo "Spatie Roles: " . $user->getRoleNames()->implode(', ') . "\n";
    echo "Direct Permissions: " . $user->getDirectPermissions()->pluck('name')->implode(', ') . "\n";
    echo "All Permissions: " . $user->getAllPermissions()->pluck('name')->implode(', ') . "\n";
    echo "Can user-list? " . ($user->can('user-list') ? 'YES' : 'NO') . "\n";
}

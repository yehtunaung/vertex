<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $administrator_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, -7) != '_delete' && substr($permission->title, 0, 9) != 'audit_log';
        });
        Role::findOrFail(2)->permissions()->sync($administrator_permissions);

        $engineer_permissions = $administrator_permissions->filter(function ($permission) {
            return $permission->title == 'service_assign_access' || $permission->title == 'service_assign_suspend' || $permission->title == 'service_assign_complete';
        });
        Role::findOrFail(3)->permissions()->sync($engineer_permissions);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class NewPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 95,
                'title' => 'store_list_create',
            ],
            [
                'id'    => 96,
                'title' => 'store_list_edit',
            ],
            [
                'id'    => 97,
                'title' => 'store_list_show',
            ],
            [
                'id'    => 98,
                'title' => 'store_list_delete',
            ],
            [
                'id'    => 99,
                'title' => 'store_list_access',
            ],
            [
                'id'    => 100,
                'title' => 'usage_create',
            ],
            [
                'id'    => 101,
                'title' => 'usage_edit',
            ],
            [
                'id'    => 102,
                'title' => 'usage_show',
            ],
            [
                'id'    => 103,
                'title' => 'usage_delete',
            ],
            [
                'id'    => 104,
                'title' => 'usage_access',
            ],
        ];

        Permission::insert($permissions);

        //update new permission to role
        
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $administrator_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, -7) != '_delete' && substr($permission->title, 0, 9) != 'audit_log';
        });
        Role::findOrFail(2)->permissions()->sync($administrator_permissions);
    }
}

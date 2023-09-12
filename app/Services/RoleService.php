<?php

namespace App\Services;

use App\Models\Role;
use App\Helpers\helper;


class RoleService
{

    /**
     * get roles id array
     * @param $request
     */
    public static function getRoleIds($request)
    {
        $roles = [];
        if ($request['admin']) {
            array_push($roles, (new self)->getRoleId('Admin'));
        }
        if ($request['adminstrator']) {
            array_push($roles, (new self)->getRoleId('Adminstrator'));
        }
        if ($request['engineer']) {
            array_push($roles, (new self)->getRoleId('Engineer'));
        }
        return $roles;
    }

    /**
     * get role id by role title
     * @param $role_title
     */
    public static function getRoleId($role_title)
    {
        return Role::where('title', $role_title)->first()->id;
    }
}

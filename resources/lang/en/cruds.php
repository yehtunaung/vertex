<?php

return [

    // Admin
    'userManagement' => [
        'title' => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title' => 'Permissions',
        'title_singular' => 'Permission',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'title' => 'Title',
            'title_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title' => 'Roles',
        'title_singular' => 'Role',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'title' => 'Title',
            'title_helper' => ' ',
            'permissions' => 'Permissions',
            'permissions_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'user' => [
        'title' => 'Users',
        'title_singular' => 'User',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'name' => 'Name',
            'name_helper' => ' ',
            'email' => 'Email',
            'email_helper' => ' ',
            'email_verified_at' => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password' => 'Password',
            'password_helper' => ' ',
            'roles' => 'Roles',
            'roles_helper' => ' ',
            'remember_token' => 'Remember Token',
            'remember_token_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => ' ',
            'all_privilege' => 'All Privillege'
        ],
    ],
    'room_category' => [
        "title" => "Room Categories",
        "title_singular" => "Room Category",
        "room_category_add" => "Add Room Category",
        "fields" => [
            "no" => "NO",
            "id" => "ID",
            "room_type" => "Room Type",
            "room_img" => "Room Image",
            "capacity" => "capacity",
            "cost" => "Cost",
            "description" => "description",
            "created_at" => "Created at",
            "updated_at" => "Updated at",
            "deleted_at" => "Deleted at"
        ]
    ],
    'room' => [
        "title" => "Rooms",
        "title_singular" => "Room",
        "room_add" => "Add Room",
        "fields" => [
            "no" => "NO",
            "id" => "ID",
            "room_no" => "Room No",
            "created_at" => "Created at",
            "updated_at" => "Updated at",
            "deleted_at" => "Deleted at"
        ]
    ],
    'auditLog' => [
        'title' => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'description' => 'Description',
            'description_helper' => ' ',
            'subject_id' => 'Subject ID',
            'subject_id_helper' => ' ',
            'subject_type' => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id' => 'User ID',
            'user_id_helper' => ' ',
            'properties' => 'Properties',
            'properties_helper' => ' ',
            'host' => 'Host',
            'host_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],


    'frontend' => [
        'home'          => 'Home',
        'about'         => 'About',
        'room'          => 'Room',
        'service'       => 'Service',
        'contact'          => 'Contact',
    ]
];

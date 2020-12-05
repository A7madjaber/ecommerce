<?php

return [
    'role_structure' => [
        'Super_admin' => [
            'categories' => 'c,r,u,d',
            'brands' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'settings' => 'r,u',
            'coupon' => 'c,r,u,d',
            'deal' => 'c,r,u,d',
            'newsLetter' => 'r,d',
            'product' => 'c,r,u,d',
            'subcategory' => 'c,r,u,d',
            'blogCategory' => 'c,r,u,d',
            'blogPost' => 'c,r,u,d',
            'contact' => 'r,u,d',
            'order' =>'r,u,d',
            'seo' => 'r,u',

        ],
        'admin' => [],

    ],
    'permission_structure' => [

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

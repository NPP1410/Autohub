<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSampleSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $roles = [
            ['id' => 1, 'name' => 'Super Admin', 'detail' => 'Full access', 'isActive' => 'Y'],
            ['id' => 2, 'name' => 'Admin', 'detail' => 'Read-only executive overview', 'isActive' => 'Y'],
        ];

        foreach ($roles as $role) {
            DB::table('tb_role')->updateOrInsert(
                ['id' => $role['id']],
                [
                    'name' => $role['name'],
                    'detail' => $role['detail'],
                    'isActive' => $role['isActive'],
                    'updated_at' => $now,
                    'created_at' => DB::raw('COALESCE(created_at, NOW())'),
                ]
            );
        }

        $menus = [
            ['id' => 1, '_id' => null, 'topic_id' => null, 'name' => 'Menu', 'menu_key' => null, 'url' => null, 'icon' => null, 'position' => 'topic', 'sort' => 1, 'status' => 'on'],
            ['id' => 2, '_id' => null, 'topic_id' => 1, 'name' => 'Dashboard', 'menu_key' => 'dashboard', 'url' => '', 'icon' => 'bx bx-home-circle', 'position' => 'main', 'sort' => 2, 'status' => 'on'],
            ['id' => 3, '_id' => null, 'topic_id' => 1, 'name' => 'Profile', 'menu_key' => 'profile', 'url' => 'profile', 'icon' => 'bx bx-user-circle', 'position' => 'main', 'sort' => 3, 'status' => 'on'],
            ['id' => 1000, '_id' => null, 'topic_id' => null, 'name' => 'Administrator', 'menu_key' => null, 'url' => null, 'icon' => null, 'position' => 'topic', 'sort' => 1000, 'status' => 'on'],
            ['id' => 1001, '_id' => null, 'topic_id' => 1000, 'name' => 'Permission', 'menu_key' => 'administrator.permission', 'url' => 'administrator/permission', 'icon' => 'bx bx-cog', 'position' => 'main', 'sort' => 1001, 'status' => 'on'],
            ['id' => 1002, '_id' => null, 'topic_id' => 1000, 'name' => 'User', 'menu_key' => 'administrator.user', 'url' => 'administrator/user', 'icon' => 'bx bx-user', 'position' => 'main', 'sort' => 1002, 'status' => 'on'],
            ['id' => 1003, '_id' => null, 'topic_id' => 1000, 'name' => 'Error Log', 'menu_key' => 'administrator.log', 'url' => 'administrator/log', 'icon' => 'bx bx-error-circle', 'position' => 'main', 'sort' => 1003, 'status' => 'on'],
        ];

        foreach ($menus as $menu) {
            DB::table('tb_menu')->updateOrInsert(
                ['id' => $menu['id']],
                [
                    '_id' => $menu['_id'],
                    'topic_id' => $menu['topic_id'],
                    'name' => $menu['name'],
                    'menu_key' => $menu['menu_key'],
                    'url' => $menu['url'],
                    'icon' => $menu['icon'],
                    'position' => $menu['position'],
                    'sort' => $menu['sort'],
                    'status' => $menu['status'],
                    'delete_status' => 'off',
                    'updated_at' => $now,
                    'created_at' => DB::raw('COALESCE(created_at, NOW())'),
                ]
            );
        }

        $permissionMap = [
            1 => [
                2 => ['read' => 'on', 'add' => 'off', 'edit' => 'off', 'delete' => 'off'],
                3 => ['read' => 'on', 'add' => 'off', 'edit' => 'on', 'delete' => 'off'],
                1002 => ['read' => 'on', 'add' => 'on', 'edit' => 'on', 'delete' => 'on'],
                1001 => ['read' => 'on', 'add' => 'on', 'edit' => 'on', 'delete' => 'on'],
                1003 => ['read' => 'on', 'add' => 'off', 'edit' => 'off', 'delete' => 'off'],
            ],
            2 => [
                2 => ['read' => 'on', 'add' => 'off', 'edit' => 'off', 'delete' => 'off'],
                3 => ['read' => 'on', 'add' => 'off', 'edit' => 'on', 'delete' => 'off'],
                1003 => ['read' => 'on', 'add' => 'off', 'edit' => 'off', 'delete' => 'off'],
            ],
        ];

        foreach ($permissionMap as $roleId => $menusByRole) {
            foreach ($menusByRole as $menuId => $permission) {
                $menu = DB::table('tb_menu')->select('menu_key')->where('id', $menuId)->first();

                DB::table('tb_role_list')->updateOrInsert(
                    [
                        'role_id' => $roleId,
                        'menu_key' => $menu->menu_key ?? null,
                    ],
                    [
                        'menu_id' => $menuId,
                        'menu_key' => $menu->menu_key ?? null,
                        'read' => $permission['read'],
                        'add' => $permission['add'],
                        'edit' => $permission['edit'],
                        'delete' => $permission['delete'],
                        'updated_at' => $now,
                        'created_at' => DB::raw('COALESCE(created_at, NOW())'),
                    ]
                );
            }
        }
    }
}

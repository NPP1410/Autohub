<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $menuData = [
            '_id' => null,
            'topic_id' => 1000,
            'name' => 'Error Log',
            'menu_key' => 'administrator.log',
            'url' => 'administrator/log',
            'icon' => 'bx bx-error-circle',
            'position' => 'main',
            'sort' => 1003,
            'status' => 'on',
            'delete_status' => 'off',
            'created_at' => DB::raw('COALESCE(created_at, NOW())'),
            'updated_at' => $now,
            'deleted_at' => null,
        ];

        if (Schema::hasColumn('tb_menu', 'menu_type')) {
            $menuData['menu_type'] = 'administrator';
        }

        DB::table('tb_menu')->updateOrInsert(
            ['id' => 1003],
            $menuData
        );

        $roles = DB::table('tb_role')
            ->select('id')
            ->where('id', 1)
            ->orWhere('name', 'like', '%Admin%')
            ->get();

        foreach ($roles as $role) {
            DB::table('tb_role_list')->updateOrInsert(
                [
                    'role_id' => $role->id,
                    'menu_key' => 'administrator.log',
                ],
                [
                    'menu_id' => 1003,
                    'menu_key' => 'administrator.log',
                    'read' => 'on',
                    'add' => 'off',
                    'edit' => 'off',
                    'delete' => 'off',
                    'created_at' => DB::raw('COALESCE(created_at, NOW())'),
                    'updated_at' => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        DB::table('tb_role_list')->where('menu_key', 'administrator.log')->delete();
        DB::table('tb_menu')->where('id', 1003)->delete();
    }
};

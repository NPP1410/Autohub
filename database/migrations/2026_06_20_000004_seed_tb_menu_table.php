<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('tb_menu')->insert([
            ['id' => 1, '_id' => null, 'topic_id' => null, 'name' => 'Menu', 'menu_key' => null, 'url' => null, 'icon' => null, 'position' => 'topic', 'sort' => 1, 'status' => 'on', 'delete_status' => 'off', 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id' => 2, '_id' => null, 'topic_id' => 1, 'name' => 'Dashboard', 'menu_key' => 'dashboard', 'url' => '', 'icon' => 'bx bx-home-circle', 'position' => 'main', 'sort' => 2, 'status' => 'on', 'delete_status' => 'off', 'created_at' => '2026-06-19 14:26:45', 'updated_at' => '2026-06-19 14:26:45', 'deleted_at' => null],
            ['id' => 3, '_id' => null, 'topic_id' => 1, 'name' => 'Profile', 'menu_key' => 'profile', 'url' => 'profile', 'icon' => 'bx bx-user-circle', 'position' => 'main', 'sort' => 3, 'status' => 'on', 'delete_status' => 'off', 'created_at' => '2026-06-19 14:26:45', 'updated_at' => '2026-06-19 14:26:45', 'deleted_at' => null],
            ['id' => 1000, '_id' => null, 'topic_id' => null, 'name' => 'Administrator', 'menu_key' => null, 'url' => null, 'icon' => null, 'position' => 'topic', 'sort' => 1000, 'status' => 'on', 'delete_status' => 'off', 'created_at' => null, 'updated_at' => null, 'deleted_at' => null],
            ['id' => 1001, '_id' => null, 'topic_id' => 1000, 'name' => 'Permission', 'menu_key' => 'administrator.permission', 'url' => 'administrator/permission', 'icon' => 'bx bx-cog', 'position' => 'main', 'sort' => 1001, 'status' => 'on', 'delete_status' => 'off', 'created_at' => '2026-06-19 14:26:45', 'updated_at' => '2026-06-19 14:26:45', 'deleted_at' => null],
            ['id' => 1002, '_id' => null, 'topic_id' => 1000, 'name' => 'User', 'menu_key' => 'administrator.user', 'url' => 'administrator/user', 'icon' => 'bx bx-user', 'position' => 'main', 'sort' => 1002, 'status' => 'on', 'delete_status' => 'off', 'created_at' => '2026-06-19 14:26:45', 'updated_at' => '2026-06-19 14:26:45', 'deleted_at' => null],
        ]);
    }

    public function down(): void
    {
        DB::table('tb_menu')->whereIn('id', [1, 2, 3, 1000, 1001, 1002])->delete();
    }
};

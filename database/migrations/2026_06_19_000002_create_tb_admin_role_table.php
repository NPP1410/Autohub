<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_admin_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->unique(['admin_id', 'role_id'], 'tb_admin_role_admin_role_unique');
            $table->index('admin_id');
            $table->index('role_id');
        });

        $now = now();
        $admins = DB::table('tb_admin')
            ->select('id', 'role')
            ->whereNotNull('role')
            ->get();

        foreach ($admins as $admin) {
            DB::table('tb_admin_role')->updateOrInsert(
                ['admin_id' => $admin->id, 'role_id' => $admin->role],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_admin_role');
    }
};

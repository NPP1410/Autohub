<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable()->unique();
            $table->enum('customer_type', ['company', 'individual', 'government', 'other'])->default('company');
            $table->string('name', 255);
            $table->string('tax_id', 20)->nullable()->index();
            $table->string('branch_code', 10)->nullable();
            $table->string('branch_name', 100)->nullable();
            $table->string('contact_name', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('address')->nullable();
            $table->string('subdistrict', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->unsignedSmallInteger('credit_days')->default(0);
            $table->text('note')->nullable();
            $table->enum('isActive', ['Y', 'N'])->default('Y');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $now = now();
        DB::table('tb_menu')->updateOrInsert(
            ['id' => 100],
            [
                '_id' => null,
                'topic_id' => null,
                'name' => 'CRM',
                'menu_key' => null,
                'url' => null,
                'icon' => null,
                'position' => 'topic',
                'sort' => 100,
                'status' => 'on',
                'delete_status' => 'off',
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ]
        );

        DB::table('tb_menu')->updateOrInsert(
            ['id' => 101],
            [
                '_id' => null,
                'topic_id' => 100,
                'name' => 'Customer',
                'menu_key' => 'customer',
                'url' => 'customer',
                'icon' => 'bx bx-group',
                'position' => 'main',
                'sort' => 101,
                'status' => 'on',
                'delete_status' => 'off',
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ]
        );

        $roles = DB::table('tb_role')
            ->select('id')
            ->where('id', 1)
            ->orWhere('name', 'like', '%Admin%')
            ->get();

        foreach ($roles as $role) {
            DB::table('tb_role_list')->updateOrInsert(
                ['role_id' => $role->id, 'menu_key' => 'customer'],
                [
                    'menu_id' => 101,
                    'menu_key' => 'customer',
                    'read' => 'on',
                    'add' => 'on',
                    'edit' => 'on',
                    'delete' => 'on',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        DB::table('tb_role_list')->where('menu_key', 'customer')->delete();
        DB::table('tb_menu')->whereIn('id', [101, 100])->delete();
        Schema::dropIfExists('tb_customer');
    }
};

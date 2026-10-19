<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_role_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->nullable();
            $table->integer('menu_id')->nullable();
            $table->string('menu_key', 150)->nullable();
            $table->enum('read', ['on', 'off'])->nullable()->default('off');
            $table->enum('add', ['on', 'off'])->nullable()->default('off');
            $table->enum('edit', ['on', 'off'])->nullable()->default('off');
            $table->enum('delete', ['on', 'off'])->nullable()->default('off');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_role_list');
    }
};

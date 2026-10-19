<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('menu_key', 150)->nullable();
            $table->text('url')->nullable();
            $table->text('icon')->nullable();
            $table->enum('position', ['main', 'secondary', 'topic'])->nullable();
            $table->integer('sort')->nullable();
            $table->enum('status', ['on', 'off'])->nullable()->default('on');
            $table->enum('delete_status', ['on', 'off'])->nullable()->default('off');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_menu');
    }
};

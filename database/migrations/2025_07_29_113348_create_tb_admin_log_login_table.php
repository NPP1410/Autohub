<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAdminLogLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin_log_login', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->comment('FK to tb_admin');
            $table->string('ip_address',20)->nullable();
            $table->string('device')->nullable();
            $table->string('browser')->nullable();
            $table->smallInteger('type')->comment("0=ล็อคอินผิดพลาด, 1=ล็อคอินสำเร็จ")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_admin_log_login');
    }
}

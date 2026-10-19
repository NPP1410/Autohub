
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {

            // Primary Key + Auto Increment
            $table->id();

            // รหัสกลุ่มสินค้า
            $table->string('category_id', 150)->unique();

            // ชื่อกลุ่มสินค้า
            $table->string('name', 255)->nullable();
            $table->string('name_th', 255);
            $table->string('name_en', 255)->nullable();

            // รายละเอียด
            $table->text('description')->nullable();

            // สถานะและลำดับการแสดงผล
            $table->boolean('status')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            // วันที่สร้างและแก้ไข
            $table->timestamps();

            // Index สำหรับค้นหาชื่อ
            $table->index('name_th');
            $table->index('name_en');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

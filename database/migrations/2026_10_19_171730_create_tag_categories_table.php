
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_categories', function (Blueprint $table) {
            $table->id();

            // Keyword เช่น ผักสด, คะน้า, Chinese kale
            $table->string('tag', 255);

            // คำค้นภาษาอังกฤษหรือชื่อสำหรับแสดงผล (ถ้ามี)
            $table->string('slug', 255)->nullable()->unique();

            // เชื่อม Category
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->restrictOnDelete();

            // เชื่อม Subcategory
            $table->foreignId('subcategory_id')
                ->nullable()
                ->constrained('subcategories')
                ->restrictOnDelete();

            $table->text('description')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->index('tag');
            $table->index(['category_id', 'status']);
            $table->index(['subcategory_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_categories');
    }
};

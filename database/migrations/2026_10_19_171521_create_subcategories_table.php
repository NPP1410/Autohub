
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            // รหัสหมวดหมู่ย่อย เช่น 199
            $table->string('subcategory_id', 150)->unique();

            // เชื่อมกับ categories.id
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            $table->string('name', 255)->nullable();
            $table->string('name_th', 255);
            $table->string('name_en', 255)->nullable();

            $table->text('description')->nullable();

            $table->boolean('status')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index('name_th');
            $table->index('name_en');
            $table->index('status');
            $table->index(['category_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};

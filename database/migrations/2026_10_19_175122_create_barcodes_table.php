
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barcodes', function (Blueprint $table) {
            $table->id();

            $table->string('code', 100)->unique();

            // อ้างอิงรหัสสินค้า products.product_id
            $table->string('product_id', 150);

            $table->boolean('status')->default(true);

            $table->date('startdate')->nullable();
            $table->date('expdate')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // ใช้ product_id เป็นรหัสธุรกิจ
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->restrictOnDelete();

            $table->index(['product_id', 'status']);
            $table->index(['startdate', 'expdate']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barcodes');
    }
};

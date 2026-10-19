
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
          Schema::create('products', function (Blueprint $table) {

        // Primary Key + Auto Increment
        $table->id();

        // Product ID: ไม่ซ้ำ แต่ไม่ใช่ Primary Key
        $table->string('product_id', 150)->unique();

        // Product names and descriptions
        $table->string('product_name', 255);
        $table->string('product_name_en', 255)->nullable();
        $table->string('product_buy', 255)->nullable();
        $table->string('product_buy_en', 255)->nullable();
        $table->text('sell_detail')->nullable();
        $table->text('buy_detail')->nullable();
            // Prices and tax
            $table->decimal('sell_price', 15, 2)->default(0);
            $table->decimal('buy_price', 15, 2)->default(0);
            $table->decimal('floor_price', 15, 2)->nullable();
            $table->decimal('vat', 5, 2)->default(7);
            $table->decimal('pvat', 5, 2)->default(0);
            $table->decimal('discount', 5, 2)->default(0);

            // Product type and accounting
            $table->boolean('status')->default(0);
            $table->string('type', 7)->nullable();

            $table->string('acc_sell', 50)->nullable();
            $table->string('acc_buy', 50)->nullable();
            $table->string('acc_whmr', 50)->nullable();
            $table->string('acc_whgr', 50)->nullable();
            $table->string('acc_begin', 50)->nullable();
            $table->string('acc_end', 50)->nullable();
            $table->string('acc_inventory', 50)->nullable();
            $table->string('acc_cost', 50)->nullable();

            // Categories and product information
            $table->string('category', 100)->nullable();
            $table->string('sub_category', 100)->nullable();
            $table->string('unit', 100)->nullable();
            $table->string('tag', 100)->nullable();
            $table->string('thumbnail', 255)->nullable();

            // Cost and inventory
            $table->decimal('std_cost', 15, 2)->default(0);
            $table->decimal('po_rule', 15, 3)->default(0);
            $table->string('brand', 100)->nullable();
            $table->decimal('reorder_point', 15, 3)->nullable();
            $table->decimal('maximum_stock', 15, 3)->default(0);

            $table->string('product_for', 4)->nullable();
            $table->decimal('weight', 15, 3)->default(0);
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->unsignedInteger('life')->nullable();
            $table->decimal('yield', 5, 2)->default(100);

            // Product settings
            $table->boolean('obsolete')->default(0);
            $table->boolean('restrict')->default(0);
            $table->boolean('eordering')->default(0);
            $table->boolean('activate_reorder')->default(0);
            $table->boolean('activate_maxstock')->default(0);
            $table->boolean('mkt')->default(0);
            $table->string('originate', 100)->nullable();
            $table->boolean('follow_category')->default(0);
            $table->string('tariff_code', 100)->nullable();
            $table->string('distributor', 255)->nullable();

            // Laravel timestamps
            $table->timestamps();

            // Indexes
            $table->index('product_name');
            $table->index('category');
            $table->index('brand');
            $table->index('obsolete');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

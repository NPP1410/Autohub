<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('frontend_users', function (Blueprint $table) {
            $table->id();
            // Optional future company link; creating a login does not change tb_customer.
            $table->unsignedBigInteger('customer_id')->nullable()->index();
            $table->string('name', 150);
            $table->string('email', 254)->unique();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('frontend_password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 254)->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('frontend_password_reset_tokens');
        Schema::dropIfExists('frontend_users');
    }
};

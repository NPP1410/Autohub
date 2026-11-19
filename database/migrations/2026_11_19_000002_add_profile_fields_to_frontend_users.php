<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('frontend_users', function (Blueprint $table) {
            $table->string('phone', 30)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address', 1000)->nullable();
            $table->text('biography')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('frontend_users', fn (Blueprint $table) => $table->dropColumn(['phone', 'birth_date', 'address', 'biography']));
    }
};
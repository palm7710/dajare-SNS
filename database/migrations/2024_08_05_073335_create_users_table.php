<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void

    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('user_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_name');
            $table->string('profile_image')->nullable();
            $table->string('profile_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

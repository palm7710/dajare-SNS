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
        Schema::create('likes', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('common_post_id')->nullable()->constrained();
            $table->foreignId('dajare_post_id')->nullable()->constrained();
            $table->timestamps();
        });

        DB::statement('
            ALTER TABLE likes
            ADD CONSTRAINT check_common_post_id_or_dajare_post_id_null
            CHECK (
                (common_post_id IS NULL AND dajare_post_id IS NOT NULL) OR
                (common_post_id IS NOT NULL AND dajare_post_id IS NULL)
            )
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('
            ALTER TABLE likes
            DROP CONSTRAINT check_common_post_id_or_dajare_post_id_null
        ');

        Schema::dropIfExists('likes');
    }
};

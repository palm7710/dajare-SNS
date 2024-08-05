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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('common_post_id')->nullable()->constrained();
            $table->foreignId('dajare_post_id')->nullable()->constrained();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::table('comments' , function (Blueprint $table) {
            DB::statement('ALTER TABLE comments ADD CONSTRAINT chk_text_or_image CHECK (text IS NOT NULL OR image IS NOT NULL)');
            DB::statement('
                ALTER TABLE comments
                ADD CONSTRAINT check_common_post_id_or_dajare_post_id_null
                CHECK (
                    (common_post_id IS NULL AND dajare_post_id IS NOT NULL) OR
                    (common_post_id IS NOT NULL AND dajare_post_id IS NULL)
                )
            ');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

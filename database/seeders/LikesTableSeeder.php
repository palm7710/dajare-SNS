<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'common_post_id' => 1,
                'dajare_post_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'common_post_id' => null,
                'dajare_post_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'common_post_id' => 2,
                'dajare_post_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'common_post_id' => null,
                'dajare_post_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'common_post_id' => 3,
                'dajare_post_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'common_post_id' => null,
                'dajare_post_id' => 1,
                'text' => '面白いダジャレですね！',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'common_post_id' => 1,
                'dajare_post_id' => null,
                'text' => null,
                'image' => 'image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'common_post_id' => null,
                'dajare_post_id' => 2,
                'text' => 'いいダジャレですね！',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'common_post_id' => 2,
                'dajare_post_id' => null,
                'text' => null,
                'image' => 'image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'common_post_id' => 3,
                'dajare_post_id' => null,
                'text' => 'さすがですね！',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

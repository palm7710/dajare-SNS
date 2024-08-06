<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DajarePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dajare_posts')->insert([
            [
                'user_id' => 1,
                'text' => '布団が吹っ飛んだ！',
                'image' => null,
                'dajare_score' => 85,
                'impression' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'text' => 'アルミ缶の上にあるミカン',
                'image' => 'image1.jpg',
                'dajare_score' => 90,
                'impression' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'text' => 'カレーは辛れぇ',
                'image' => 'image2.jpg',
                'dajare_score' => 75,
                'impression' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'text' => '冷蔵庫にレーズンがいる',
                'image' => null,
                'dajare_score' => 80,
                'impression' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'text' => '生麦生米生卵',
                'image' => null,
                'dajare_score' => 95,
                'impression' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

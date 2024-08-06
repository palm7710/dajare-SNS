<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommonPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('common_posts')->insert([
            [
                'user_id' => 1,
                'text' => '今日もいい天気だなぁ',
                'image' => null,
                'impression' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'text' => 'たまには外に出てみるのもいいかもしれない',
                'image' => 'image1.jpg',
                'impression' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'text' => 'うちの猫がかわいい',
                'image' => 'image2.jpg',
                'impression' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'text' => 'good morning',
                'image' => null,
                'impression' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'text' => 'あの映画面白かったなぁ',
                'image' => 'image3.jpg',
                'impression' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

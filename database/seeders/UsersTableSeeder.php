<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB追加
use Illuminate\Support\Facades\Hash; // Hash追加

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'user_id' => 'tarou_00',
                'mail' => 'tarou@example.com',
                'password' => Hash::make('password123'),
                'user_name' => 'Tarou',
                'profile_image' => 'user1.jpg',
                'profile_text' => '大学生。ダジャレ王を目指しています！布団が吹っ飛んだ！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_id' => 'yamada_00',
                'mail' => 'yamada@example.com',
                'password' => Hash::make('password123'),
                'user_name' => 'Yamada',
                'profile_image' => 'user2.jpg',
                'profile_text' => '中学生。今日もダジャレが止まらない。アルミ缶の上にあるミカン',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'user_id' => 'hanako_00',
                'mail' => 'hanako@example.com',
                'password' => Hash::make('password123'),
                'user_name' => 'Hanako',
                'profile_image' => 'user3.jpg',
                'profile_text' => '女子大学生。ダジャレの天才です！カレーは辛れぇ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'user_id' => 'suzuki_00',
                'mail' => 'suzuki@example.com',
                'password' => Hash::make('password123'),
                'user_name' => 'Suzuki',
                'profile_image' => 'user4.jpg',
                'profile_text' => '丸の内OL。ダジャレで笑顔を届けます！冷蔵庫の中にレーズンがいる',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'user_id' => 'tanaka_00',
                'mail' => 'tanaka@example.com',
                'password' => Hash::make('password123'),
                'user_name' => 'Tanaka',
                'profile_image' => 'user5.jpg',
                'profile_text' => '高校教師。ダジャレの魔術師！生麦生米生卵',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

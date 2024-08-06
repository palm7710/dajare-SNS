<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UsersTableSeeder::class, // ユーザーをシード
            //CommonPostsTableSeeder::class, //普通の投稿をシード
            //DajarePostsTableSeeder::class, // ダジャレ投稿をシード
            FollowsTableSeeder::class, // フォローをシード
            CommentsTableSeeder::class, // コメントをシード
            LikesTableSeeder::class, // いいねをシード
        ]);
    }
}

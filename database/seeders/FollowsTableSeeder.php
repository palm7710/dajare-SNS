<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('follows')->insert([
            [
                'follower_id' => 1,
                'followee_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'follower_id' => 2,
                'followee_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'follower_id' => 3,
                'followee_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'follower_id' => 4,
                'followee_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'follower_id' => 5,
                'followee_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Like extends Model
{
    use HasFactory;

    public static function countByPostId($postId)
    {
        return self::where('common_post_id', $postId)
            ->count();
    }
}

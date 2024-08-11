<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    // CommonPostとのリレーション
    public function commonPost()
    {
        return $this->belongsTo(CommonPost::class, 'common_post_id');
    }

    // DajarePostとのリレーション
    public function dajarePost()
    {
        return $this->belongsTo(DajarePost::class, 'dajare_post_id');
    }

    // Userとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

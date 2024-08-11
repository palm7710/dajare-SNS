<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DajarePost extends CommonPost
{
    use HasFactory;

    protected $table = 'dajare_posts';

    protected $fillable = ['user_id', 'text', 'image', 'impression', 'dajare_score'];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // コメントとのリレーションを定義
    public function comments()
    {
        return $this->hasMany(Comment::class, 'dajare_post_id');
    }
}

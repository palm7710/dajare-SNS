<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'text', 'image', 'impression'];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

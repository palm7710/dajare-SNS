<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends CommonPost
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'txit',
        'image',
        'impression',
    ];
}

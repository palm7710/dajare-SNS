<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DajarePost extends CommonPost
{
    use HasFactory;

    protected $table = 'dajare_posts';

    protected $fillable = ['user_id', 'text', 'image', 'impression', 'dajare_score'];
}

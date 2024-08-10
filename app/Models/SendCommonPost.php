<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SendCommonPost extends Model
{
    use HasFactory;
    protected $table = 'common_posts';
    protected $fillable = [
        'user_id',
        'text',
        'image',
        'impression',
    ];
}

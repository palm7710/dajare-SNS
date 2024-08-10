<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SendDajarePost extends Model
{
    use HasFactory;
    protected $table = 'dajare_posts';
    protected $fillable = [
        'user_id',
        'text',
        'image',
        'dajare_score',
        'impression',
    ];
}

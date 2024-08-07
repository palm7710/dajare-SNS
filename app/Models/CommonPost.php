<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonPost extends Model
{
    use HasFactory;

    // テーブル名
    protected $fillable = ['user_id', 'text', 'image'];

    public static function getAllCommonPosts()
    {
        return self::all();
    }

    public static function getCommonPostById($id)
    {
        return self::find($id);
    }

    public static function createCommonPost($data)
    {
        return self::create($data);
    }

    public function updateCommonPost($data)
    {
        return $this->update($data);
    }

    public static function deleteCommonPost($id)
    {
        $common_post = self::find($id);
        return $common_post->delete();
    }
}

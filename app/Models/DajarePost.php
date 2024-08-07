<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DajarePost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'text', 'image'];

    public static function createDajarePost($data)
    {
        return self::create($data);
    }

    public function updateDajarePost($data)
    {
        return $this->update($data);
    }

    public static function deleteDajarePost($id)
    {
        $dajare_post = self::find($id);
        return $dajare_post ? $dajare_post->delete() : false;
    }
}

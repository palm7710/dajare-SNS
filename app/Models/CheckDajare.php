<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckDajare extends Model
{
    //最も長さの長いダジャレの文字数を返す。
    //ダジャレでない場合-1
    public function findMaxDajare($text){
        //'っ'と'-'を消去する
        $S = str_replace(['っ', '-'], '', $text);
        dd($S);
        return 5;
    }
}

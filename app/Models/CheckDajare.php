<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckDajare extends Model
{
    //最も長さの長いダジャレの文字数を返す。
    //ダジャレでない場合-1
    public function findMaxDajare($text){
        //カタカナをひらがなに統一
        $text2 = mb_convert_kana($text, 'c', 'UTF-8');

        //'っ'と'-'を消去する
        $text3 = str_replace(['っ','-' ,'ー'], '', $text2);

        //dd($text3);

        //マルチバイト対応のため、文字配列へ変換
        $S = $this->mb_str_to_array($text3);
        $size=sizeof($S);

        for($i=intdiv($size,2);3<=$i;$i--){
            //長さ$iのダジャレが存在するか探す
            for($j=0;$i*2+$j<=$size;$j++){
                for($k=$j+$i;$i+$k<=$size;$k++){
                    //j番目の文字とk番目の文字から長さiの文字列を取る。
                    //それらが完全一致しているかを確認
                    $flag=true;
                    for($l=0;$l<$i;$l++){
                        if($S[$j+$l]!==$S[$k+$l]){
                            $flag=false;
                            break;
                        }
                    }
                    if($flag){
                        return $i;
                    }
                }
            }
        }

        //最後までダジャレが見つからなかったので-1を返す
        return -1;
    }
    //マルチバイトに対応するため、文字の配列に変換(普通にやると毎回文字列の長さ分探索が発生する)
    private function mb_str_to_array($string, $encoding = 'UTF-8') {
        $array = [];
        $length = mb_strlen($string, $encoding);

        for ($i = 0; $i < $length; $i++) {
            $array[] = mb_substr($string, $i, 1, $encoding);
        }

        return $array;
    }
}

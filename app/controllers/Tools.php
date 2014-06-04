<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 3/16/14
 * Time: 1:24 AM
 */

class Tools {
    public static function stringShortener($string,$size){
        $res = "";
        foreach (explode(" ", $string) as $part) {
            $res .= $part." ";
            if(strlen($res)>=$size)
                return $res;
        }
        return $res;

    }

} 
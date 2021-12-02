<?php

namespace App\Helpers;

class StringHelper
{
    public static function primeiraLetraMaiscula($string) {
        if($string && !is_array($string)) {
            $string = (string) $string;
            return mb_strtoupper($string[0]) . mb_strtolower(substr($string, 1, strlen($string)));
        }
        return $string;
    }
}

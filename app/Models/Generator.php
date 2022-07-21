<?php

namespace App\Models;

class Generator
{
    static function generateNumbers($min, $max,$offset=0,$length=5): array
    {
        $a = range($min, $max);
        shuffle($a);
        return array_slice($a, $offset, $length);
    }
    static function generateRows($min, $max, $middle = false): array
    {
        $array = Generator::generateNumbers($min, $max);
        if ($middle) {
            $array[2] = null;
        }
        return $array;
    }
}

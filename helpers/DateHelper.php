<?php
namespace app\helpers;

class DateHelper
{
    public static function youbi($index)
    {
        $names = ["日", "月", "火", "水", "木", "金", "土"];
        return $names[$index];
    }
}
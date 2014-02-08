<?php
namespace app\helpers;

class DateHelper
{
    public static function youbi($index)
    {
        $names = ["", "月", "火", "水", "木", "金", "土", "日"];
        return $names[$index];
    }
}
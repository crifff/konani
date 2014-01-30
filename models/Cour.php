<?php

namespace app\models;

use yii\base\Model;
use Yii;

class Cour extends Model
{
    public static $courList = array(
        'winter' => ['1', '2', '3'],
        'spring' => ['4', '5', '6'],
        'summer' => ['7', '8', '9'],
        'autumn' => ['10', '11', '12'],
    );

    public static function currentSeason()
    {
        $month = date('m');
        foreach (self::$courList as $season => $cour) {
            if (in_array($month, $cour)) {
                return $season;
            }
        }
        return reset(array_keys(self::$courList));
    }

    public static function seasonMonthArray($season = '')
    {
        if ($season == 'current') {
            $season = self::currentSeason();
        }

        if ($season == 'next') {
            $season = self::getNextSeason(self::currentSeason());
        }

        return self::$courList[$season];
    }

    public function attributeNames() { }

    public static function seasonLabel()
    {
        return array(
            '冬' => 'winter',
            '春' => 'spring',
            '夏' => 'summer',
            '秋' => 'autumn',
        );
    }

    public static function seasonName($label)
    {
        return array_search($label, self::seasonLabel());
    }

    public static function getNextSeason($season)
    {
        $nextSeasons = array(
            'winter' => 'spring',
            'spring' => 'summer',
            'summer' => 'autumn',
            'autumn' => 'winter',
        );

        return $nextSeasons[$season];
    }

    public static function getNextSeasonUrl($year, $season)
    {
        if ($season === 'autumn') {
            $year++;
        }
        $season = self::getNextSeason($season);

    }

    public static function getBeforeSeason($season)
    {
        $beforeSeasons = array(
            'winter' => 'autumn',
            'spring' => 'winter',
            'summer' => 'spring',
            'autumn' => 'summer',
        );

        return $beforeSeasons[$season];
    }

    public static function getbeforeSeasonUrl($year, $season)
    {
        if ($season === 'winter') {
            $year--;
        }
        $season = self::getBeforeSeason($season);

    }
}

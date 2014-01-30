<?php
namespace app\models;

use yii\db\ActiveQuery;

class TitleQuery extends ActiveQuery
{
    public function season($year = 0, $season = '')
    {
        if (!$year) {
            $year = date('Y');
        }

        if (!$season) {
            $season = Cour::currentSeason();
        }
        $month = Cour::seasonMonthArray($season);


        $this->andWhere('first_year = ' . $year);
        $this->andWhere('first_month IN (' . implode(',', $month) . ')');

        return $this;
    }
}
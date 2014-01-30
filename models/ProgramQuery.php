<?php
namespace app\models;

use yii\db\ActiveQuery;

class ProgramQuery extends ActiveQuery
{
    public function yet()
    {
        $this->andWhere('start_time >' . time());
        return $this;
    }

    public function today(\DateTime $date = null, $offset = 4)
    {
        //0時から4時は前日あつかい
        if ((int)date('H') <= 4) {
            $offset -= 24;
        }
        $timestamp = $date ? $date->getTimestamp() : strtotime('today');
        $timestamp += 3600 * $offset;
        $today = date('Y-m-d H:00:00', $timestamp);
        $this->andWhere("start_time >= '{$today}'");

        $timestamp = $date ? $date->add(new \DateInterval('P1D'))->getTimestamp() : strtotime('tomorrow');
        $timestamp += 3600 * $offset;
        $tomorrow = date('Y-m-d H:00:00', $timestamp);
        $this->andWhere("start_time <= '{$tomorrow}'");
        return $this;
    }
}
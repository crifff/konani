<?php
namespace app\models;

use yii\db\ActiveQuery;

class ProgramQuery extends ActiveQuery
{
    public function yet()
    {
        $now = date('Y-m-d H:i:s');
        $this->andWhere("end_time > '{$now}'");
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
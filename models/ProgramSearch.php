<?php

namespace app\models;

use DateTime;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProgramSearch represents the model behind the search form about Program.
 */
class ProgramSearch extends Model
{
    public $id;
    public $channel_id;
    public $title_id;
    public $count;
    public $start_offset;
    public $start_time;
    public $end_time;
    public $last_update;
    public $sub_title;
    public $flag;
    public $deleted;
    public $warn;
    public $revision;
    public $all_day;

    public function rules()
    {
        return [
            [
                [
                    'id',
                    'channel_id',
                    'title_id',
                    'count',
                    'start_offset',
                    'flag',
                    'deleted',
                    'warn',
                    'revision',
                    'all_day'
                ],
                'integer'
            ],
            [['start_time', 'end_time', 'last_update', 'sub_title'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'title_id' => 'Title ID',
            'count' => 'Count',
            'start_offset' => 'Start Offset',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'last_update' => 'Last Update',
            'sub_title' => 'Sub Title',
            'flag' => 'Flag',
            'deleted' => 'Deleted',
            'warn' => 'Warn',
            'revision' => 'Revision',
            'all_day' => 'All Day',
        ];
    }

    public function byDate(DateTime $date = null)
    {
        $query = Program::find()->with('title', 'channel')->orderBy(['start_time' => SORT_ASC])->yet();
        if ($date) {
            $query->today($date);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        $value = $this->$attribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}

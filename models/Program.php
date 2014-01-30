<?php

namespace app\models;

/**
 * This is the model class for table "program".
 *
 * @property integer $id
 * @property integer $channel_id
 * @property integer $title_id
 * @property integer $count
 * @property integer $start_offset
 * @property string $start_time
 * @property string $end_time
 * @property string $last_update
 * @property string $sub_title
 * @property integer $flag
 * @property integer $deleted
 * @property integer $warn
 * @property integer $revision
 * @property integer $all_day
 *
 * @property Channel $channel
 * @property Title $title
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'channel_id',
                    'title_id',
                    'start_time',
                    'end_time',
                    'last_update',
                    'flag',
                    'deleted',
                    'warn',
                    'revision',
                    'all_day'
                ],
                'required'
            ],
            [
                ['channel_id', 'title_id', 'count', 'start_offset', 'flag', 'deleted', 'warn', 'revision', 'all_day'],
                'integer'
            ],
            [['start_time', 'end_time', 'last_update'], 'safe'],
            [['sub_title'], 'string']
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

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getTitle()
    {
        return $this->hasOne(Title::className(), ['id' => 'title_id']);
    }

    public static function createQuery()
    {
        return new ProgramQuery(['modelClass' => get_called_class()]);
    }

    /**
     * @param null $q
     * @return null|\app\models\ProgramQuery|static
     */
    public static function find($q = null)
    {
        return parent::find($q);
    }
}

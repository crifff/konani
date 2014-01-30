<?php

namespace app\models;

/**
 * This is the model class for table "channel".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $url
 *
 * @property Program[] $programs
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['name', 'url'], 'required'],
            [['name', 'url'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['channel_id' => 'id']);
    }

}

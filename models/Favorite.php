<?php

namespace app\models;

/**
 * This is the model class for table "favorite".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $title_id
 * @property integer $channel_id
 * @property string $created_at
 *
 * @property Channel $channel
 * @property User $user
 * @property Title $title
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title_id', 'created_at'], 'required'],
            [['user_id', 'title_id', 'channel_id'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title_id' => 'Title ID',
            'channel_id' => 'Channel ID',
            'created_at' => 'Created At',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getTitle()
    {
        return $this->hasOne(Title::className(), ['id' => 'title_id']);
    }
}

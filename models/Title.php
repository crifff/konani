<?php

namespace app\models;

/**
 * This is the model class for table "title".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_title
 * @property integer $category
 * @property string $urls
 * @property string $title_kana
 * @property string $title_english
 * @property string $comment
 * @property integer $title_flag
 * @property integer $first_year
 * @property integer $first_month
 * @property integer $first_end_year
 * @property integer $first_end_month
 * @property string $first_channel
 * @property string $keywords
 * @property string $sub_titles
 *
 * @property Program[] $programs
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [
                [
                    'title',
                    'short_title',
                    'urls',
                    'title_kana',
                    'title_english',
                    'comment',
                    'first_channel',
                    'keywords',
                    'sub_titles'
                ],
                'string'
            ],
            [['category', 'title_flag', 'first_year', 'first_month', 'first_end_year', 'first_end_month'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'short_title' => 'Short Title',
            'category' => 'Category',
            'urls' => 'Urls',
            'title_kana' => 'Title Kana',
            'title_english' => 'Title English',
            'comment' => 'Comment',
            'title_flag' => 'Title Flag',
            'first_year' => 'First Year',
            'first_month' => 'First Month',
            'first_end_year' => 'First End Year',
            'first_end_month' => 'First End Month',
            'first_channel' => 'First Channel',
            'keywords' => 'Keywords',
            'sub_titles' => 'Sub Titles',
        ];
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['title_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getChannels()
    {
        return $this->hasMany(Channel::className(), ['id' => 'channel_id'])->via('programs');
    }

    /**
     * @return TitleQuery|\yii\db\ActiveQuery
     */
    public static function createQuery()
    {
        return new TitleQuery(['modelClass' => get_called_class()]);
    }

    /**
     * @param null $q
     * @return null|\app\models\TitleQuery|static
     */
    public static function find($q = null)
    {
        return parent::find($q);
    }
}

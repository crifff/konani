<?php
class Series extends EMongoDocument
{
  public $TID;
  public $Title;
  public $ShortTitle;
  public $TitleYomi;
  public $TitleEN;
  public $Comment;
  public $cat;
  public $TitleFlag;
  public $FirstYear;
  public $FirstMonth;
  public $FirstEndYear;
  public $FirstEndMonth;
  public $FirstCh;
  public $Keywords;
  public $SubTitles;

	public function primaryKey()
	{
		return '_id'; 
	}

  public function getCollectionName()
  {
    return 'series';
  }

  public function rules()
  {
    return array(
      array('
      TID
      ,Title
      ,ShortTitle
      ,TitleYomi
      ,TitleEN
      ,Comment
      ,cat
      ,TitleFlag
      ,FirstYear
      ,FirstMonth
      ,FirstEndYear
      ,FirstEndMonth
      ,FirstCh
      ,Keywords
      ,SubTitles
      ,_id
      ',
      'safe'),
    );
  }

  public function scopes()
  {
    return array(
    );
  }

  public function attributeLabels()
  {
    return array(
      'ID' => '_id',
      'タイトル' => 'Title',
    );
  }

  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function setAttributes($values, $safeOnly = true)
  {
    foreach($values as $key => $value)
    {
      if(is_array($value) && count($value) === 0)
        $values[$key] = '';
    }
    return parent::setAttributes($values);
  }
}

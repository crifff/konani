<?php
class Program extends EMongoDocument
{
  public $StTime;
  public $EdTime;
  public $LastUpdate;
  public $Count;
  public $StOffset;
  public $TID;
  public $PID;
  public $ProgComment;
  public $ChID;
  public $SubTitle;
  public $Flag;
  public $Deleted;
  public $Warn;
  public $Revision;
  public $AllDay;
  public $UserID;
  public $ConfFlag;
  public $Title;
  public $ShortTitle;
  public $Cat;
  public $Urls;
  public $ChName;
  public $ChURL;
  public $ChGID;

	public function primaryKey()
	{
		return '_id'; 
	}

  public function getCollectionName()
  {
    return 'programs';
  }

  public function indexes()
  {
    return array(
      'PID'=>array(
        'key'=>array('PID'),
        'unique'=>true
      )
    );
  }

  public function rules()
  {
    return array(
      array('StTime
      ,EdTime
      ,LastUpdate
      ,Count
      ,StOffset
      ,TID
      ,PID
      ,ProgComment
      ,ChID
      ,SubTitle
      ,Flag
      ,Deleted
      ,Warn
      ,Revision
      ,AllDay
      ,UserID
      ,ConfFlag
      ,Title
      ,ShortTitle
      ,Cat
      ,Urls
      ,ChName
      ,ChURL
      ,ChGID
      ,_id',
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

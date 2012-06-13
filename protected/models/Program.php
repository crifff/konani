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

  /**
   * This method have to be defined in every Model
   * @return string MongoDB collection name, witch will be used to store documents of this model
   */
  public function getCollectionName()
  {
    return 'programs';
  }

  // We can define rules for fields, just like in normal CModel/CActiveRecord classes
  public function rules()
  {
    return array(
      array('Title', 'safe'),
      array('Title', 'safe', 'on'=>'search'),
    );
  }

  // the same with attribute names
  public function attributeLabels()
  {
    return array(
      'ID' => '_id',
      'タイトル' => 'Title',
    );
  }

  /**
   * This method have to be defined in every model, like with normal CActiveRecord
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

}

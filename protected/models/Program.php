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
  public $Title;
  public $Shorttitle;
  public $Cat;
  public $Urls;
  public $ChName;
  public $ChUTL;
  public $ChGID;

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
  }

  // the same with attribute names
  public function attributeNames()
  {
    return array(
      'Title' => 'タイトル',
    );
  }

  /**
   * This method have to be defined in every model, like with normal CActiveRecord
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($classname);
  }
}

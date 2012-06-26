<?php
class User extends EMongoDocument
{
  public $twitter_id;
  public $nickname;
  public $checklist;

	public function primaryKey()
	{
		return '_id'; 
	}

  public function getCollectionName()
  {
    return 'users';
  }

  public function indexes()
  {
    return array(
      'twitter_id'=>array(
        'key'=>array('twitter_id'),
        'unique'=>true
      )
    );
  }

  public function rules()
  {
    return array(
      array('twitter_id,nickname',
      'required'),
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
      'twitterアカウント' => 'twitter_id',
      'ニックネーム' => 'nickname',
    );
  }

  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function check($tid)
  {
    if(!is_array($this->checklist))
      $this->checklist=array();

    $this->checklist[$tid]=true;
    return $this->save();
  }

  public function isChecked($tid)
  {
    return isset($this->checklist[$tid]);
  }
}

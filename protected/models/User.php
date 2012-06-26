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

  public function check($conditions)
  {
    if(!is_array($this->checklist))
      $this->checklist=array();

    $this->checklist[]=$conditions;
    return $this->save();
  }

  public function isChecked($tid)
  {
    return isset($this->checklist[$tid]);
  }

  public function getCheckedSeries()
  {
    if(count($this->checklist)===0)
      return array();

    $tids=array();
    foreach($this->checklist as $conditions){
      if($conditions['TID'])
        $tids[]=$conditions['TID'];
    }
    $criteria = new EMongoCriteria;
    $criteria->addCond('TID','in',$tids);
    return Series::model()->findAll($criteria);
  }

  public function getCheckedPrograms()
  {
    if(count($this->checklist)===0)
      return array();

    $tids=array();
    $criteria = new EMongoCriteria;
    foreach($this->checklist as $conditions){
      $criteria->addCond(null,'or',$conditions);
    }
    $criteria->sort('StTime',1);
    return Program::model()->findAll($criteria);
  }
}

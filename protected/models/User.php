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

    ksort($conditions);
    $key=implode('_', $conditions);
    $this->checklist[$key]=$conditions;
    Yii::log($this->twitter_id.' check '.$key,'info','application.model.user');
    return $this->save();
  }

  public function uncheck($conditions)
  {
    if(!is_array($this->checklist))
      $this->checklist=array();

    ksort($conditions);
    $key=implode('_', $conditions);
    unset($this->checklist[$key]);
    Yii::log($this->twitter_id.' uncheck '.$key,'info','application.model.user');
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

  public function marking(&$checklist)
  {
    if(count($this->checklist)===0)
      return false;

    foreach($checklist as $key=>$program)
    {
      $checklist[$key]->isChecked=false;
      if(get_class($program)==='Series')
        $tmp=array('TID'=>$program->TID);
      else
        $tmp=array('TID'=>$program->TID,'ChID'=>$program->ChID);
      if($this->isCheckedSeries($tmp))
        $checklist[$key]->isChecked=true;
    }
  }

  public function isCheckedSeries($condition)
  {
    if($this->checklist===null)
      $this->checklist=array();
    if(count($condition)===1)
    {
      foreach($this->checklist as $program)
      {
        $var=key($condition);
        if($program[$var]===$condition[$var])
          return true;
      }
    }
    else
    {
      ksort($condition);
      $key=implode('_', $condition);
      return array_key_exists($key, $this->checklist);
    }
    return false;
  }
}

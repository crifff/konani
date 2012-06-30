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

  public $isChecked;

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
      'unique_PID'=>array(
        'key'=>array('PID'),
        'unique'=>true
      ),
      'unique_TID'=>array(
        'key'=>array('TID'),
        'unique'=>false
      ),
      'order_by_StTime'=>array(
        'key'=>array('StTime'=>EMongoCriteria::SORT_ASC),
        'unique'=>false
      ),
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
      'beforeOneHour'=>array(
        'conditions'=>array(
          'StTime'=>array(
            'greaterEq'=>(string)(time()-(60*60))
          )
        )
      ),
      'yet'=>array(
        'conditions'=>array(
          'StTime'=>array(
            'greaterEq'=>(string)time()
          )
        )
      ),
      'oneWeek'=>array(
        'conditions'=>array(
          'StTime'=>array(
            '<'=>(string)(time()+(60*60*24*7))
          )
        )
      ),
      'oneDay'=>array(
        'conditions'=>array(
          'StTime'=>array(
            '<'=>(string)(time()+(60*60*24))
          )
        )
      ),
    );
  }

  public function defualtScope()
  {
    return array(
      'sort'=>array('StTime'=>EMongoCriteria::SORT_ASC)
    );
  }

  public function checkedByList($checklist)
  {
    if(count($checklist)===0)
      return array();

    $criteria=$this->getDbCriteria();
    foreach($checklist as $conditions){
      $criteria->addCond(null,'or',$conditions);
    }
    $criteria->sort('StTime',1);
    $this->setDbCriteria($criteria);

    return $this;
  }

  public function checkedByUser($user)
  {
    return $this->checkedByList($user->checklist);
  }

  public function season($season,$year='')
  {
    if(empty($year))
      $year=date('Y');

    $programs=Series::model()->season($season,$year)->findAll();
    $ids=array();
    foreach($programs as $program)
    {
      $ids[]=(string)$program->TID;
    }
    $criteria=$this->getDbCriteria();
    $criteria->addCond('TID','in',$ids);
    $this->setDbCriteria($criteria);

    return $this;
  }

  public function konki()
  {
    return $this->season('current');
  }

  public function raiki()
  {
    return $this->season('next');
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

  public static function getTodayPrograms()
  {
    $programs=Series::model()->konki()->findAll();
    $criteria = new EMongoCriteria;
    $criteria->addCond('StTime','>',(string)(time()-(60*60)));
    $criteria->sort('StTime',1);
    return self::model()->konki()->oneDay()->findAll($criteria);
  }

  public function isAttention()
  {
    return $this->Flag & 0x01;
  }
  public function isFirst()
  {
    return $this->Flag & 0x02;
  }
  public function isLast()
  {
    return $this->Flag & 0x04;
  }
  public function isRepeat()
  {
    return $this->Flag & 0x08;
  }

}

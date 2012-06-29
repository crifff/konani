<?php
class Cour extends CModel
{
  public static $cours=array(
    'winter'=>array('1','2','3'),
    'spring'=>array('4','5','6'),
    'summer'=>array('7','8','9'),
    'autumn'=>array('10','11','12'),
  );

  public static function currentSeason()
  {
    $month=date('m');
    foreach(self::$cours as $season=>$cour)
    {
      if(in_array($month,$cour))
        return $season;
    }
  }

  public static function seasonMonthArray($season='')
  {
    if($season=='current')
      $season=self::currentSeason();

    if($season=='next')
    {
      $nextSeasons=array(
        'winter'=>'spring',
        'spring'=>'summer',
        'summer'=>'autumn',
        'autumn'=>'winter',
      );
      $season=$nextSeasons[self::currentSeason()];
    }

    return self::$cours[$season];
  }

  public function attributeNames(){ }

  public static function seasonLabel(){
    return array(
      '冬'=>'winter',
      '春'=>'spring',
      '夏'=>'summer',
      '秋'=>'autumn',
    );
  }
}

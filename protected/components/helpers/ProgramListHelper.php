<?php
class ProgramListHelper
{
  static $date=0;
  static public function item($data)
  {
    $date=date('Ymd',$data->StTime-60*60*6);
    $header='';

    if(self::$date != $date)
    {
      self::$date = $date;

      $header=CHtml::tag('li',
        array('class'=>'nav-header'), 
        date('n/d(D)',$data->StTime)
      );
    }

    $str='';
    $str.=self::over24format($data->StTime).' ';

    if($data->isAttention())
      $str.= CHtml::tag('span',array('class'=>'label label-warning'),'注');
    if($data->isFirst())
      $str.=CHtml::tag('span',array('class'=>'label label-important'),'新');
    if($data->isLast())
      $str.=CHtml::tag('span',array('class'=>'label label-important'),'終');
    if($data->isRepeat())
      $str.=CHtml::tag('span',array('class'=>'label label-success'),'再');

    $str.=$data->Title.' ';
    $str.=CHtml::tag('span',array('class'=>'label'),$data->ChName);

    $str= CHtml::tag('li',array(),
      CHtml::link( $str, array('series/view','id'=>$data->TID))
    );
    return $header.$str;
  }

  static public function over24format($timestamp)
  {
    if(date('H',$timestamp)<=6)
      return (date('H',$timestamp)+24). date(':i',$timestamp);
    else
      return date('H:i',$timestamp);
  }
}

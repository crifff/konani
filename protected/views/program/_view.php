    <li>
    <?php echo CHtml::link(
      date('m/d H:i',$data->StTime).' '.
      ($data->isAttention()?CHtml::tag('span',array('class'=>'label label-warning'),'注'):'').
      ($data->isFirst()?CHtml::tag('span',array('class'=>'label label-important'),'新'):'').
      ($data->isLast()?CHtml::tag('span',array('class'=>'label label-important'),'終'):'').
      ($data->isRepeat()?CHtml::tag('span',array('class'=>'label label-success'),'再'):'').
      $data->Title.' '.
      CHtml::tag('span',array('class'=>'label'),$data->ChName)
      ,
      array('series/view','id'=>$data->TID)
    )?>
    </li>

<?php
$this->breadcrumbs=array(
//	'Series'=>array('index'),
//	$model->Title,
);

$this->menu=array(
    array('label'=>'List Series', 'url'=>array('index')),
    array('label'=>'Create Series', 'url'=>array('create')),
    array('label'=>'Update Series', 'url'=>array('update', 'id'=>$model->_id)),
    array('label'=>'Delete Series', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<p>番組名とチャンネルの組み合わせでチェックリストに登録できます</p>
<h1><?php echo $model->Title; ?></h1>
<ul class="nav nav-tabs nav-stacked">
<?php foreach($programs as $program):?>
<li class="">
<?php if(Yii::app()->user->isGuest):?>
<?php echo CHtml::link(
      date('m/d H:i',$program->StTime).' '.
      ($program->isAttention()?CHtml::tag('span',array('class'=>'label label-warning'),'注'):'').
      ($program->isFirst()?CHtml::tag('span',array('class'=>'label label-important'),'新'):'').
      ($program->isLast()?CHtml::tag('span',array('class'=>'label label-important'),'終'):'').
      ($program->isRepeat()?CHtml::tag('span',array('class'=>'label label-success'),'再'):'').
      $program->Title.' '.
      CHtml::tag('span',array('class'=>'label'),$program->ChName)
      ,'#'
    )?>
<?php else:?>
<?php echo CHtml::link(
  date('m/d H:i',$program->StTime).' '.
  ($program->isAttention()?CHtml::tag('span',array('class'=>'label label-warning'),'注'):'').
  ($program->isFirst()?CHtml::tag('span',array('class'=>'label label-important'),'新'):'').
  ($program->isLast()?CHtml::tag('span',array('class'=>'label label-important'),'終'):'').
  ($program->isRepeat()?CHtml::tag('span',array('class'=>'label label-success'),'再'):'').
  $program->Title.' '.
  CHtml::tag('span',array('class'=>'label'),$program->ChName).
  CHtml::button('✔',
    array(
      'class'=>'checkBtn btn pull-right series_'.$program->ChID.'_'.$program->TID.' '.($program->isChecked?'btn-primary':''),
      'style'=>'margin-top:-5px',
      'data-url'=>$this->createUrl('series/check', array('tid' => $model->TID, 'chid' => $program->ChID))
  )),'')?>
<?php endif?>
 </li>
<?php endforeach?>
</ul>
<script type="text/javascript">
jQuery(function($) {
  $('.checkBtn').live('click',function(){
    self=this;
    url=$(this).attr('data-url');
    $.get(url,function(data){
      series=$(self).attr('class').match(/series_\d+_\d+/);
      if (data==='check') {
        $('.'+series).addClass('btn-primary')
      } else {
        $('.'+series).removeClass('btn-primary')
      }
    });
  });
});
</script>

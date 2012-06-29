<?php
$this->breadcrumbs=array(
	'Series'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Series', 'url'=>array('index')),
	array('label'=>'Create Series', 'url'=>array('create')),
	array('label'=>'Update Series', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete Series', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->Title; ?></h1>
<ul class="nav nav-tabs nav-stacked">
<?php foreach($programs as $program):?>
<li>
 <?php echo CHtml::ajaxLink(
      date('m/d H:i',$program->StTime).' '.
      ($program->isAttention()?CHtml::tag('span',array('class'=>'label label-warning'),'注'):'').
      ($program->isFirst()?CHtml::tag('span',array('class'=>'label label-important'),'新'):'').
      ($program->isLast()?CHtml::tag('span',array('class'=>'label label-important'),'終'):'').
      ($program->isRepeat()?CHtml::tag('span',array('class'=>'label label-success'),'再'):'').
      $program->Title.' '.
      CHtml::tag('span',array('class'=>'label'),$program->ChName)
      ,array('series/check', 'tid' => $model->TID, 'chid' => $program->ChID)
    )?>
 </li>
<?php endforeach?>
</ul>

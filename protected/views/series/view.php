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

<h1>View Series #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TID',
		'Title',
		'ShortTitle',
		'TitleYomi',
		'TitleEN',
		'Comment',
		'cat',
		'TitleFlag',
		'FirstYear',
		'FirstMonth',
		'FirstEndYear',
		'FirstEndMonth',
		'FirstCh',
		'Keywords',
		'SubTitles',
		'_id',
	),
)); ?>

<?php foreach($programs as $program):?>
<?php echo date('Y-m-d H:i',$program->StTime)?>
 <?php echo CHtml::encode($program->ChName)?> 
 <?php echo CHtml::encode($program->SubTitle)?>
 <?php echo CHtml::ajaxButton($program->ChName,array('series/check', 'tid' => $model->TID, 'chid' => $program->ChID))?>
<br>
<?php endforeach?>

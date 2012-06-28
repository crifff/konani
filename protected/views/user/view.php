<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'twitter_id',
		'nickname',
		'_id',
	),
)); ?>
<?php foreach($model->getCheckedPrograms() as $program):?>
<?php echo date('m/d H:i', $program->StTime)?>
<?php echo ($program->ChName)?>
<?php echo ($program->Title)?>

#<?php echo ($program->Count)?>
<?php echo ($program->SubTitle)?>
<br>
<?php endforeach?>
<?php foreach($model->checklist as $conditions):?>
<?php echo json_encode($conditions)?><br>
<?php endforeach?>

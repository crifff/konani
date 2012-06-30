<?php
$this->breadcrumbs=array(
	'User',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>@<?php echo $model->twitter_id; ?></h2>
<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'twitter_id',
		'nickname',
		'_id',
	),
)); ?>
-->
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">放送予定</a>
  </li>
  <li><a href="#">チェックリスト</a></li>
</ul>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemsTagName'=>'ul',
	'itemView'=>'/program/_view',
	'itemsCssClass'=>'nav nav-tabs nav-stacked',
)); ?>

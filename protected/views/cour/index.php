<?php
$this->breadcrumbs=array(
	'Series',
);
?>

<h1>Series</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
  'columns'=>array(
    'Title'
  )
)); ?>

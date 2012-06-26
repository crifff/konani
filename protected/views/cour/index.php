<?php
$this->breadcrumbs=array(
	'Series',
);
?>

<h1>Series</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
  )
); ?>

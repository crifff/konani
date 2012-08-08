<?php
$this->breadcrumbs=array(
    'Series',
);

$this->menu=array(
    array('label'=>'Create Series', 'url'=>array('create')),
    array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<h1>Series</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
));

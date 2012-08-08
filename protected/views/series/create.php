<?php
$this->breadcrumbs=array(
    'Series'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List Series', 'url'=>array('index')),
    array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<h1>Create Series</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model));

<?php
$this->breadcrumbs=array(
    'Series'=>array('index'),
    $model->Title=>array('view','id'=>$model->_id),
    'Update',
);

$this->menu=array(
    array('label'=>'List Series', 'url'=>array('index')),
    array('label'=>'Create Series', 'url'=>array('create')),
    array('label'=>'View Series', 'url'=>array('view', 'id'=>$model->_id)),
    array('label'=>'Manage Series', 'url'=>array('admin')),
);
?>

<h1>Update Series <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model));

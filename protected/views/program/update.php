<?php
$this->breadcrumbs=array(
    'Programs'=>array('index'),
    $model->Title=>array('view','id'=>$model->_id),
    'Update',
);

$this->menu=array(
    array('label'=>'List Program', 'url'=>array('index')),
    array('label'=>'Create Program', 'url'=>array('create')),
    array('label'=>'View Program', 'url'=>array('view', 'id'=>$model->_id)),
    array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Update Program <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model));

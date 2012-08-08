<?php
$this->breadcrumbs=array(
    'Programs'=>array('index'),
    $model->Title,
);

$this->menu=array(
    array('label'=>'List Program', 'url'=>array('index')),
    array('label'=>'Create Program', 'url'=>array('create')),
    array('label'=>'Update Program', 'url'=>array('update', 'id'=>$model->_id)),
    array('label'=>'Delete Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>View Program #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'StTime',
        'EdTime',
        'LastUpdate',
        'Count',
        'StOffset',
        'TID',
        'PID',
        'ProgComment',
        'ChID',
        'SubTitle',
        'Flag',
        'Deleted',
        'Warn',
        'Revision',
        'AllDay',
        'UserID',
        'ConfFlag',
        'Title',
        'ShortTitle',
        'Cat',
        'Urls',
        'ChName',
        'ChURL',
        'ChGID',
        '_id',
    ),
));

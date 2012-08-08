<?php
$this->breadcrumbs=array(
    'Programs',
);

$this->menu=array(
    array('label'=>'Create Program', 'url'=>array('create')),
    array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Programs</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'program-grid',
    'dataProvider'=>new EMongoDocumentDataProvider($model->search()->model, array(
        'sort'=>array(
      'attributes'=>array(
        'StTime',
        'SubTitle',
        'Title',
        'ChName',
      ),
    ),
  )),
  'filter'=>$model,
  'columns'=>array(
    'ChName',
    'StTime:date',
    'Title',
    'SubTitle',
  ),
));

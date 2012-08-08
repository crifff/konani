<?php
$this->breadcrumbs=array(
    'Series'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Series', 'url'=>array('index')),
    array('label'=>'Create Series', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();

    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('series-grid', {
        data: $(this).serialize()
    });

    return false;
});
");

?>

<h1>Manage Series</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'series-grid',
    'dataProvider'=>new EMongoDocumentDataProvider($model->search()->model, array(
        'sort'=>array(
            'attributes'=>array(
                'TID',
                'Title',
                'FirstYear',
                'FirstMonth',
                /*
                'cat',
                'TitleFlag',
                'FirstEndYear',
                'FirstEndMonth',
                'FirstCh',
                'Keywords',
                'SubTitles',
                '_id',
                */
            ),
        ),
    )),
    'filter'=>$model,
    'columns'=>array(
        'TID',
        'Title',
        'FirstYear',
        'FirstMonth',
        /*
        'cat',
        'TitleFlag',
        'FirstEndYear',
        'FirstEndMonth',
        'FirstCh',
        'Keywords',
        'SubTitles',
        '_id',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));

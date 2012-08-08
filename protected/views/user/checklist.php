<h2>@<?php echo $model->twitter_id; ?>のチェックリスト</h2>
<ul class="nav nav-tabs">
  <li><?php echo CHtml::link('放送予定',array('user/view','id'=>$model->twitter_id))?></li>
  <li class="active"><?php echo CHtml::link('チェックリスト',array('user/checklist','id'=>$model->twitter_id))?></li>
</ul>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemsTagName'=>'ul',
    'itemView'=>'/series/_view',
    'itemsCssClass'=>'nav nav-tabs nav-stacked',
)); ?>

<h2>@<?php echo $model->twitter_id; ?></h2>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">放送予定</a>
  </li>
  <li></a><?php echo CHtml::link('チェックリスト',array('user/checklist','id'=>$model->twitter_id))?></li>
</ul>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemsTagName'=>'ul',
    'itemView'=>'/program/_view',
    'itemsCssClass'=>'nav nav-tabs nav-stacked',
  'summaryText'=>'<span id="clock"></span>',
)); ?>

<div class="row">
  <div class="span12">

<p>アニメ視聴リストを登録できるます。開発中だよ。</p>

<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">今期のアニメ</a>
  </li>
  <li><?php echo CHtml::link('2012夏期',array('cour/index','season'=>'summer','year'=>2012))?></li>
      <?php if(!Yii::app()->user->isGuest):?>
  <li><?php echo CHtml::link('マイリスト',array('user/view','id'=>Yii::app()->session['twitter_user']->screen_name))?></li>
      <?php endif?>
</ul>
 
  <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemsTagName'=>'ul',
    'itemView'=>'/program/_view',
    'itemsCssClass'=>'nav nav-tabs nav-stacked',
    'summaryText'=>'<span id="clock"></span>',
  )); ?>
 
  </div>
</div>

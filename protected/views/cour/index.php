<?php
$this->breadcrumbs=array(
//	'Series',
);
?>

<p>今期開始のリストです。2クール目や再放送は無いです。</p>
<ul class="pager">
  <li class="previous">
<?php echo CHtml::link('&laquo;前期',Cour::getBeforeSeasonUrl($year,$season))?>
  </li>
<li>
<h1 style="display:inline"><?php echo $year?>年<?php echo Cour::seasonName($season)?>期</h1>

</li>
  <li class="next">
<?php echo CHtml::link('来期&raquo;',Cour::getNextSeasonUrl($year,$season))?>
  </li>
</ul>
<ul class="nav nav-tabs nav-stacked">
  <?php foreach($series as $program):?>
  <li>
  <?php echo CHtml::link(
    $program->Title
    .'<span style="float:right" class="check">'.($program->isChecked?'✔':'').'</span>'
    ,
    array('series/view','id'=>$program->TID)
  )?>
  </li>
  <?php endforeach?>
</ul>

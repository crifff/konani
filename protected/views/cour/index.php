<?php
$this->breadcrumbs=array(
	'Series',
);
?>

  <h1><?php echo $year?>/<?php echo $season?></h1>

<ul class="nav nav-tabs nav-stacked">
  <?php foreach($series as $program):?>
  <li>
  <?php echo CHtml::link(
    $program->Title
    ,
    array('series/view','id'=>$program->TID)
  )?>
  </li>
  <?php endforeach?>
</ul>

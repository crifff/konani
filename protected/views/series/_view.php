<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TID')); ?>:</b>
	<?php echo CHtml::encode($data->TID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cat')); ?>:</b>
	<?php echo CHtml::encode($data->cat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TitleFlag')); ?>:</b>
	<?php echo CHtml::encode($data->TitleFlag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstYear')); ?>:</b>
	<?php echo CHtml::encode($data->FirstYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstMonth')); ?>:</b>
	<?php echo CHtml::encode($data->FirstMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstEndYear')); ?>:</b>
	<?php echo CHtml::encode($data->FirstEndYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstEndMonth')); ?>:</b>
	<?php echo CHtml::encode($data->FirstEndMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstCh')); ?>:</b>
	<?php echo CHtml::encode($data->FirstCh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Keywords')); ?>:</b>
	<?php echo CHtml::encode($data->Keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubTitles')); ?>:</b>
	<?php echo CHtml::encode($data->SubTitles); ?>
	<br />

	*/ ?>

</div>

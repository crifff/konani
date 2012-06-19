<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StTime')); ?>:</b>
	<?php echo date('Y-m-d H:i:s',$data->StTime); ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('StOffset')); ?>:</b>
	<?php echo CHtml::encode($data->StOffset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TID')); ?>:</b>
	<?php echo CHtml::encode($data->TID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PID')); ?>:</b>
	<?php echo CHtml::encode($data->PID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgComment')); ?>:</b>
	<?php echo CHtml::encode($data->ProgComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChID')); ?>:</b>
	<?php echo CHtml::encode($data->ChID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubTitle')); ?>:</b>
	<?php echo CHtml::encode($data->SubTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deleted')); ?>:</b>
	<?php echo CHtml::encode($data->Deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Warn')); ?>:</b>
	<?php echo CHtml::encode($data->Warn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Revision')); ?>:</b>
	<?php echo CHtml::encode($data->Revision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AllDay')); ?>:</b>
	<?php echo CHtml::encode($data->AllDay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ConfFlag')); ?>:</b>
	<?php echo CHtml::encode($data->ConfFlag); ?>
	<br />

-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('ShortTitle')); ?>:</b>
	<?php echo CHtml::encode($data->ShortTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cat')); ?>:</b>
	<?php echo CHtml::encode($data->Cat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Urls')); ?>:</b>
	<?php echo CHtml::encode($data->Urls); ?>
	<br />

-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChName')); ?>:</b>
	<?php echo CHtml::encode($data->ChName); ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('ChURL')); ?>:</b>
	<?php echo CHtml::encode($data->ChURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChGID')); ?>:</b>
	<?php echo CHtml::encode($data->ChGID); ?>
	<br />

-->

</div>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'StTime'); ?>
		<?php echo $form->textField($model,'StTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EdTime'); ?>
		<?php echo $form->textField($model,'EdTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastUpdate'); ?>
		<?php echo $form->textField($model,'LastUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Count'); ?>
		<?php echo $form->textField($model,'Count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StOffset'); ?>
		<?php echo $form->textField($model,'StOffset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TID'); ?>
		<?php echo $form->textField($model,'TID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PID'); ?>
		<?php echo $form->textField($model,'PID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProgComment'); ?>
		<?php echo $form->textField($model,'ProgComment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChID'); ?>
		<?php echo $form->textField($model,'ChID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubTitle'); ?>
		<?php echo $form->textField($model,'SubTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Deleted'); ?>
		<?php echo $form->textField($model,'Deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Warn'); ?>
		<?php echo $form->textField($model,'Warn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Revision'); ?>
		<?php echo $form->textField($model,'Revision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AllDay'); ?>
		<?php echo $form->textField($model,'AllDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ConfFlag'); ?>
		<?php echo $form->textField($model,'ConfFlag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Title'); ?>
		<?php echo $form->textField($model,'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShortTitle'); ?>
		<?php echo $form->textField($model,'ShortTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cat'); ?>
		<?php echo $form->textField($model,'Cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Urls'); ?>
		<?php echo $form->textField($model,'Urls'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChName'); ?>
		<?php echo $form->textField($model,'ChName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChURL'); ?>
		<?php echo $form->textField($model,'ChURL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChGID'); ?>
		<?php echo $form->textField($model,'ChGID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'_id'); ?>
		<?php echo $form->textField($model,'_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

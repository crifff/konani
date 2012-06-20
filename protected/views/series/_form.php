<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'series-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TID'); ?>
		<?php echo $form->textField($model,'TID'); ?>
		<?php echo $form->error($model,'TID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title'); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShortTitle'); ?>
		<?php echo $form->textField($model,'ShortTitle'); ?>
		<?php echo $form->error($model,'ShortTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TitleYomi'); ?>
		<?php echo $form->textField($model,'TitleYomi'); ?>
		<?php echo $form->error($model,'TitleYomi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TitleEN'); ?>
		<?php echo $form->textField($model,'TitleEN'); ?>
		<?php echo $form->error($model,'TitleEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comment'); ?>
		<?php echo $form->textField($model,'Comment'); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat'); ?>
		<?php echo $form->textField($model,'cat'); ?>
		<?php echo $form->error($model,'cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TitleFlag'); ?>
		<?php echo $form->textField($model,'TitleFlag'); ?>
		<?php echo $form->error($model,'TitleFlag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstYear'); ?>
		<?php echo $form->textField($model,'FirstYear'); ?>
		<?php echo $form->error($model,'FirstYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstMonth'); ?>
		<?php echo $form->textField($model,'FirstMonth'); ?>
		<?php echo $form->error($model,'FirstMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstEndYear'); ?>
		<?php echo $form->textField($model,'FirstEndYear'); ?>
		<?php echo $form->error($model,'FirstEndYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstEndMonth'); ?>
		<?php echo $form->textField($model,'FirstEndMonth'); ?>
		<?php echo $form->error($model,'FirstEndMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstCh'); ?>
		<?php echo $form->textField($model,'FirstCh'); ?>
		<?php echo $form->error($model,'FirstCh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Keywords'); ?>
		<?php echo $form->textField($model,'Keywords'); ?>
		<?php echo $form->error($model,'Keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubTitles'); ?>
		<?php echo $form->textField($model,'SubTitles'); ?>
		<?php echo $form->error($model,'SubTitles'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
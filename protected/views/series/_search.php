<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TID'); ?>
		<?php echo $form->textField($model,'TID'); ?>
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
		<?php echo $form->label($model,'TitleYomi'); ?>
		<?php echo $form->textField($model,'TitleYomi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TitleEN'); ?>
		<?php echo $form->textField($model,'TitleEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textField($model,'Comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cat'); ?>
		<?php echo $form->textField($model,'cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TitleFlag'); ?>
		<?php echo $form->textField($model,'TitleFlag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstYear'); ?>
		<?php echo $form->textField($model,'FirstYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstMonth'); ?>
		<?php echo $form->textField($model,'FirstMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstEndYear'); ?>
		<?php echo $form->textField($model,'FirstEndYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstEndMonth'); ?>
		<?php echo $form->textField($model,'FirstEndMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstCh'); ?>
		<?php echo $form->textField($model,'FirstCh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Keywords'); ?>
		<?php echo $form->textField($model,'Keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubTitles'); ?>
		<?php echo $form->textField($model,'SubTitles'); ?>
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
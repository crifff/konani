<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'twitter_id'); ?>
        <?php echo $form->textField($model,'twitter_id'); ?>
        <?php echo $form->error($model,'twitter_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'nickname'); ?>
        <?php echo $form->textField($model,'nickname'); ?>
        <?php echo $form->error($model,'nickname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'checklist'); ?>
        <?php echo $form->textField($model,'checklist'); ?>
        <?php echo $form->error($model,'checklist'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

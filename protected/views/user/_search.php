<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'twitter_id'); ?>
        <?php echo $form->textField($model,'twitter_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'nickname'); ?>
        <?php echo $form->textField($model,'nickname'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'checklist'); ?>
        <?php echo $form->textField($model,'checklist'); ?>
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

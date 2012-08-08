<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'program-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'StTime'); ?>
        <?php echo $form->textField($model,'StTime'); ?>
        <?php echo $form->error($model,'StTime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'EdTime'); ?>
        <?php echo $form->textField($model,'EdTime'); ?>
        <?php echo $form->error($model,'EdTime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'LastUpdate'); ?>
        <?php echo $form->textField($model,'LastUpdate'); ?>
        <?php echo $form->error($model,'LastUpdate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Count'); ?>
        <?php echo $form->textField($model,'Count'); ?>
        <?php echo $form->error($model,'Count'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'StOffset'); ?>
        <?php echo $form->textField($model,'StOffset'); ?>
        <?php echo $form->error($model,'StOffset'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'TID'); ?>
        <?php echo $form->textField($model,'TID'); ?>
        <?php echo $form->error($model,'TID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'PID'); ?>
        <?php echo $form->textField($model,'PID'); ?>
        <?php echo $form->error($model,'PID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ProgComment'); ?>
        <?php echo $form->textField($model,'ProgComment'); ?>
        <?php echo $form->error($model,'ProgComment'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ChID'); ?>
        <?php echo $form->textField($model,'ChID'); ?>
        <?php echo $form->error($model,'ChID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'SubTitle'); ?>
        <?php echo $form->textField($model,'SubTitle'); ?>
        <?php echo $form->error($model,'SubTitle'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Flag'); ?>
        <?php echo $form->textField($model,'Flag'); ?>
        <?php echo $form->error($model,'Flag'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Deleted'); ?>
        <?php echo $form->textField($model,'Deleted'); ?>
        <?php echo $form->error($model,'Deleted'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Warn'); ?>
        <?php echo $form->textField($model,'Warn'); ?>
        <?php echo $form->error($model,'Warn'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Revision'); ?>
        <?php echo $form->textField($model,'Revision'); ?>
        <?php echo $form->error($model,'Revision'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'AllDay'); ?>
        <?php echo $form->textField($model,'AllDay'); ?>
        <?php echo $form->error($model,'AllDay'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'UserID'); ?>
        <?php echo $form->textField($model,'UserID'); ?>
        <?php echo $form->error($model,'UserID'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ConfFlag'); ?>
        <?php echo $form->textField($model,'ConfFlag'); ?>
        <?php echo $form->error($model,'ConfFlag'); ?>
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
        <?php echo $form->labelEx($model,'Cat'); ?>
        <?php echo $form->textField($model,'Cat'); ?>
        <?php echo $form->error($model,'Cat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Urls'); ?>
        <?php echo $form->textField($model,'Urls'); ?>
        <?php echo $form->error($model,'Urls'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ChName'); ?>
        <?php echo $form->textField($model,'ChName'); ?>
        <?php echo $form->error($model,'ChName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ChURL'); ?>
        <?php echo $form->textField($model,'ChURL'); ?>
        <?php echo $form->error($model,'ChURL'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ChGID'); ?>
        <?php echo $form->textField($model,'ChGID'); ?>
        <?php echo $form->error($model,'ChGID'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

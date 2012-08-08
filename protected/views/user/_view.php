<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('twitter_id')); ?>:</b>
    <?php echo CHtml::encode($data->twitter_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
    <?php echo CHtml::encode($data->nickname); ?>
    <br />

</div>

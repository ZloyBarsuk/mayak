<?php
/* @var $this DocumentTemplatesController */
/* @var $data DocumentTemplates */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
            <?php echo CHtml::encode($data->title); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
            <?php echo CHtml::encode($data->content); ?>
            <br/>
            <b><?php echo CHtml::encode($data->getAttributeLabel('actualnost')); ?>:</b>
            <?php echo CHtml::encode($data->actualnost); ?>
            <br/>

            <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
            <?php echo CHtml::encode($data->date); ?>
            <br/>


        </div>
    </div>
</div>
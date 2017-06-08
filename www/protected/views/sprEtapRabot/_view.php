<?php
/* @var $this SprEtapRabotController */
/* @var $data SprEtapRabot */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etap_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->etap_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actualnost')); ?>:</b>
	<?php echo CHtml::encode($data->actualnost); ?>
	<br />


        </div>
    </div>
</div>
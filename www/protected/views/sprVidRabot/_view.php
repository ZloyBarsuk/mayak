<?php
/* @var $this SprVidRabotController */
/* @var $data SprVidRabot */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rabot')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rabot), array('view', 'id'=>$data->id_rabot)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naimenovaniye')); ?>:</b>
	<?php echo CHtml::encode($data->naimenovaniye); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('procent_ot_summi')); ?>:</b>
	<?php echo CHtml::encode($data->procent_ot_summi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actualnost')); ?>:</b>
	<?php echo CHtml::encode($data->actualnost); ?>
	<br />


        </div>
    </div>
</div>
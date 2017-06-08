<?php
/* @var $this TipSchetaController */
/* @var $data TipScheta */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naimenovanie')); ?>:</b>
	<?php echo CHtml::encode($data->naimenovanie); ?>
	<br />


        </div>
    </div>
</div>
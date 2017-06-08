<?php
/* @var $this SprRayonyController */
/* @var $data SprRayony */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naimenovaniye')); ?>:</b>
	<?php echo CHtml::encode($data->naimenovaniye); ?>
	<br />


        </div>
    </div>
</div>
<?php
/* @var $this RayonController */
/* @var $data Rayon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naimenovaniye')); ?>:</b>
	<?php echo CHtml::encode($data->naimenovaniye); ?>
	<br />


</div>
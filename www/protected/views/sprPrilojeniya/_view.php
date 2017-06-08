<?php
/* @var $this SprPrilojeniyaController */
/* @var $data SprPrilojeniya */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vid_prilojeniya')); ?>:</b>
	<?php echo CHtml::encode($data->vid_prilojeniya); ?>
	<br />


        </div>
    </div>
</div>
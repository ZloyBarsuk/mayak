<?php
/* @var $this DogovorHistoryController */
/* @var $data DogovorHistory */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dogovor')); ?>:</b>
	<?php echo CHtml::encode($data->id_dogovor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_info')); ?>:</b>
	<?php echo CHtml::encode($data->old_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_info')); ?>:</b>
	<?php echo CHtml::encode($data->new_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />


        </div>
    </div>
</div>
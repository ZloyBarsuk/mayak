<?php
/* @var $this DopSoglasheniyeController */
/* @var $data DopSoglasheniye */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_podpisaniya')); ?>:</b>
	<?php echo CHtml::encode($data->data_podpisaniya); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_vneseniya')); ?>:</b>
	<?php echo CHtml::encode($data->data_vneseniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summa')); ?>:</b>
	<?php echo CHtml::encode($data->summa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nds')); ?>:</b>
	<?php echo CHtml::encode($data->nds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
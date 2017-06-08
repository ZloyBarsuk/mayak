<?php
/* @var $this SchetController */
/* @var $data Schet */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dopsoglasheniya')); ?>:</b>
	<?php echo CHtml::encode($data->id_dopsoglasheniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tip_oplati')); ?>:</b>
	<?php echo CHtml::encode($data->tip_oplati); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summa')); ?>:</b>
	<?php echo CHtml::encode($data->summa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nds')); ?>:</b>
	<?php echo CHtml::encode($data->nds); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_scheta')); ?>:</b>
	<?php echo CHtml::encode($data->data_scheta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_oplati')); ?>:</b>
	<?php echo CHtml::encode($data->data_oplati); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schet_tip')); ?>:</b>
	<?php echo CHtml::encode($data->schet_tip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
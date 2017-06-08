<?php
/* @var $this ZatratiPoDogovoruController */
/* @var $data ZatratiPoDogovoru */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_objecta_po_dogovoru')); ?>:</b>
	<?php echo CHtml::encode($data->id_objecta_po_dogovoru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_zatrat')); ?>:</b>
	<?php echo CHtml::encode($data->id_zatrat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_author')); ?>:</b>
	<?php echo CHtml::encode($data->id_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summa')); ?>:</b>
	<?php echo CHtml::encode($data->summa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
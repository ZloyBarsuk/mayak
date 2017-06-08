<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $data EtapRaborPoObjectu */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_objecta')); ?>:</b>
	<?php echo CHtml::encode($data->id_objecta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_spr_etap_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->id_spr_etap_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_otvetstvennogo')); ?>:</b>
	<?php echo CHtml::encode($data->id_otvetstvennogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_nachala_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->data_nachala_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_okonchaniya_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->data_okonchaniya_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_number')); ?>:</b>
	<?php echo CHtml::encode($data->document_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('srok_dney')); ?>:</b>
	<?php echo CHtml::encode($data->srok_dney); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
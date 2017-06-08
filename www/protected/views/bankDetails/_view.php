<?php
/* @var $this BankDetailsController */
/* @var $data BankDetails */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bank')); ?>:</b>
	<?php echo CHtml::encode($data->id_bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inn')); ?>:</b>
	<?php echo CHtml::encode($data->inn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_author')); ?>:</b>
	<?php echo CHtml::encode($data->id_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kpp')); ?>:</b>
	<?php echo CHtml::encode($data->kpp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yur_address')); ?>:</b>
	<?php echo CHtml::encode($data->yur_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fiz_address')); ?>:</b>
	<?php echo CHtml::encode($data->fiz_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ogrm')); ?>:</b>
	<?php echo CHtml::encode($data->ogrm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_s')); ?>:</b>
	<?php echo CHtml::encode($data->r_s); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('k_s')); ?>:</b>
	<?php echo CHtml::encode($data->k_s); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bic')); ?>:</b>
	<?php echo CHtml::encode($data->bic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swift')); ?>:</b>
	<?php echo CHtml::encode($data->swift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_type')); ?>:</b>
	<?php echo CHtml::encode($data->account_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_date')); ?>:</b>
	<?php echo CHtml::encode($data->record_date); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
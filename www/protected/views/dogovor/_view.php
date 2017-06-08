<?php
/* @var $this DogovorController */
/* @var $data Dogovor */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">
safdsdfdsdsfdsfdsf
            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ispolnitel')); ?>:</b>
	<?php echo CHtml::encode($data->id_ispolnitel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_contragent')); ?>:</b>
	<?php echo CHtml::encode($data->id_contragent); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('id_author')); ?>:</b>
	<?php echo CHtml::encode($data->id_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dogovor_number')); ?>:</b>
	<?php echo CHtml::encode($data->dogovor_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dogovor_number_old')); ?>:</b>
	<?php echo CHtml::encode($data->dogovor_number_old); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primechaniye')); ?>:</b>
	<?php echo CHtml::encode($data->primechaniye); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('avans_procent')); ?>:</b>
	<?php echo CHtml::encode($data->avans_procent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summa_avansa')); ?>:</b>
	<?php echo CHtml::encode($data->summa_avansa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summa_dogovora_nachalnaya')); ?>:</b>
	<?php echo CHtml::encode($data->summa_dogovora_nachalnaya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('closed_date')); ?>:</b>
	<?php echo CHtml::encode($data->closed_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('srok_ispolneniya')); ?>:</b>
	<?php echo CHtml::encode($data->srok_ispolneniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('podpisan_date')); ?>:</b>
	<?php echo CHtml::encode($data->podpisan_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otkat')); ?>:</b>
	<?php echo CHtml::encode($data->otkat); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
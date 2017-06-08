<?php
/* @var $this SoprovoditelniylistController */
/* @var $data SoprovoditelniyList */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_polevik_1')); ?>:</b>
	<?php echo CHtml::encode($data->id_polevik_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_polevik_2')); ?>:</b>
	<?php echo CHtml::encode($data->id_polevik_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kameralka')); ?>:</b>
	<?php echo CHtml::encode($data->id_kameralka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mejevoy')); ?>:</b>
	<?php echo CHtml::encode($data->id_mejevoy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveril_pole')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveril_pole); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveril_mejevoy')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveril_mejevoy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveril_kameralka')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveril_kameralka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_vidachi_pole')); ?>:</b>
	<?php echo CHtml::encode($data->data_vidachi_pole); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_sdachi_pole')); ?>:</b>
	<?php echo CHtml::encode($data->data_sdachi_pole); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_sdachi_mejevoy')); ?>:</b>
	<?php echo CHtml::encode($data->data_sdachi_mejevoy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_vidachi_kameralka')); ?>:</b>
	<?php echo CHtml::encode($data->data_vidachi_kameralka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_sdachii_kameralka')); ?>:</b>
	<?php echo CHtml::encode($data->data_sdachii_kameralka); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
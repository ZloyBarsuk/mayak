<?php
/* @var $this SprGosOrganController */
/* @var $data SprGosOrgan */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rayon')); ?>:</b>
	<?php echo CHtml::encode($data->id_rayon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uchreghdenie')); ?>:</b>
	<?php echo CHtml::encode($data->uchreghdenie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fio_nachalnik_otdela')); ?>:</b>
	<?php echo CHtml::encode($data->fio_nachalnik_otdela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adress')); ?>:</b>
	<?php echo CHtml::encode($data->adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cell_phone')); ?>:</b>
	<?php echo CHtml::encode($data->cell_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />


        </div>
    </div>
</div>
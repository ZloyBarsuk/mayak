<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otchestvo')); ?>:</b>
	<?php echo CHtml::encode($data->otchestvo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('familiya')); ?>:</b>
	<?php echo CHtml::encode($data->familiya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_group')); ?>:</b>
	<?php echo CHtml::encode($data->id_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doljnost')); ?>:</b>
	<?php echo CHtml::encode($data->doljnost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_cell')); ?>:</b>
	<?php echo CHtml::encode($data->phone_cell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_home')); ?>:</b>
	<?php echo CHtml::encode($data->phone_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skype')); ?>:</b>
	<?php echo CHtml::encode($data->skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_firma')); ?>:</b>
	<?php echo CHtml::encode($data->id_firma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pol')); ?>:</b>
	<?php echo CHtml::encode($data->pol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport')); ?>:</b>
	<?php echo CHtml::encode($data->passport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acronym')); ?>:</b>
	<?php echo CHtml::encode($data->acronym); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actualnost')); ?>:</b>
	<?php echo CHtml::encode($data->actualnost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folder_documents')); ?>:</b>
	<?php echo CHtml::encode($data->folder_documents); ?>
	<br />

	*/ ?>

</div>
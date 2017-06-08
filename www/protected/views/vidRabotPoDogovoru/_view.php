<?php
/* @var $this VidRaborPoDogovoruController */
/* @var $data VidRaborPoDogovoru */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vid_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->id_vid_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_otvetstvennogo')); ?>:</b>
	<?php echo CHtml::encode($data->id_otvetstvennogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vid_dney')); ?>:</b>
	<?php echo CHtml::encode($data->vid_dney); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('summa')); ?>:</b>
	<?php echo CHtml::encode($data->summa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nds_summa')); ?>:</b>
	<?php echo CHtml::encode($data->nds_summa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('srok_ispolneniya')); ?>:</b>
	<?php echo CHtml::encode($data->srok_ispolneniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_nachala')); ?>:</b>
	<?php echo CHtml::encode($data->data_nachala); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_okonchaniya')); ?>:</b>
	<?php echo CHtml::encode($data->data_okonchaniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nds')); ?>:</b>
	<?php echo CHtml::encode($data->nds); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
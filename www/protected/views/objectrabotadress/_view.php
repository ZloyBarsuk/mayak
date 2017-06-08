<?php
/* @var $this ObjectrabotadressController */
/* @var $data ObjectRabotAdress */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adress')); ?>:</b>
	<?php echo CHtml::encode($data->adress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plochad_rabot')); ?>:</b>
	<?php echo CHtml::encode($data->plochad_rabot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomer_dopsvedeniya')); ?>:</b>
	<?php echo CHtml::encode($data->nomer_dopsvedeniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_dopsvedeniya')); ?>:</b>
	<?php echo CHtml::encode($data->data_dopsvedeniya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dogovor')); ?>:</b>
	<?php echo CHtml::encode($data->id_dogovor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archiv_number')); ?>:</b>
	<?php echo CHtml::encode($data->archiv_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rayon')); ?>:</b>
	<?php echo CHtml::encode($data->id_rayon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_avtor')); ?>:</b>
	<?php echo CHtml::encode($data->id_avtor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_date')); ?>:</b>
	<?php echo CHtml::encode($data->record_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kadastroviy_nomer')); ?>:</b>
	<?php echo CHtml::encode($data->kadastroviy_nomer); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
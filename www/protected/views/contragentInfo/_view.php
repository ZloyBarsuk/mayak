<?php
/* @var $this ContragentInfoController */
/* @var $data ContragentInfo */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <div class="view">

            	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_contragent')); ?>:</b>
	<?php echo CHtml::encode($data->id_contragent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_author')); ?>:</b>
	<?php echo CHtml::encode($data->id_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nds')); ?>:</b>
	<?php echo CHtml::encode($data->nds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bank')); ?>:</b>
	<?php echo CHtml::encode($data->id_bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pasport')); ?>:</b>
	<?php echo CHtml::encode($data->pasport); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('inn')); ?>:</b>
	<?php echo CHtml::encode($data->inn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kpp')); ?>:</b>
	<?php echo CHtml::encode($data->kpp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okpo')); ?>:</b>
	<?php echo CHtml::encode($data->okpo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ogrn')); ?>:</b>
	<?php echo CHtml::encode($data->ogrn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ogrnip')); ?>:</b>
	<?php echo CHtml::encode($data->ogrnip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site')); ?>:</b>
	<?php echo CHtml::encode($data->site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yur_address')); ?>:</b>
	<?php echo CHtml::encode($data->yur_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fiz_address')); ?>:</b>
	<?php echo CHtml::encode($data->fiz_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('director')); ?>:</b>
	<?php echo CHtml::encode($data->director); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doljnost')); ?>:</b>
	<?php echo CHtml::encode($data->doljnost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zamestitel')); ?>:</b>
	<?php echo CHtml::encode($data->zamestitel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_path')); ?>:</b>
	<?php echo CHtml::encode($data->logo_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('osnovaniye_dogovora')); ?>:</b>
	<?php echo CHtml::encode($data->osnovaniye_dogovora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_date')); ?>:</b>
	<?php echo CHtml::encode($data->record_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_from_csv_dla_pravki')); ?>:</b>
	<?php echo CHtml::encode($data->data_from_csv_dla_pravki); ?>
	<br />

	*/ ?>

        </div>
    </div>
</div>
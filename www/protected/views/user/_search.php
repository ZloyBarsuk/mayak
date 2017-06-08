<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otchestvo'); ?>
		<?php echo $form->textField($model,'otchestvo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'familiya'); ?>
		<?php echo $form->textField($model,'familiya',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_group'); ?>
		<?php echo $form->textField($model,'id_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doljnost'); ?>
		<?php echo $form->textField($model,'doljnost',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_cell'); ?>
		<?php echo $form->textField($model,'phone_cell',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_firma'); ?>
		<?php echo $form->textField($model,'id_firma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pol'); ?>
		<?php echo $form->textField($model,'pol',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acronym'); ?>
		<?php echo $form->textField($model,'acronym',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actualnost'); ?>
		<?php echo $form->textField($model,'actualnost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folder_documents'); ?>
		<?php echo $form->textField($model,'folder_documents',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'otchestvo'); ?>
		<?php echo $form->textField($model,'otchestvo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'otchestvo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'familiya'); ?>
		<?php echo $form->textField($model,'familiya',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'familiya'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_group'); ?>
		<?php echo $form->textField($model,'id_group'); ?>
		<?php echo $form->error($model,'id_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doljnost'); ?>
		<?php echo $form->textField($model,'doljnost',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'doljnost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_cell'); ?>
		<?php echo $form->textField($model,'phone_cell',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_cell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_firma'); ?>
		<?php echo $form->textField($model,'id_firma'); ?>
		<?php echo $form->error($model,'id_firma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pol'); ?>
		<?php echo $form->textField($model,'pol',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'pol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
		<?php echo $form->error($model,'birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'passport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acronym'); ?>
		<?php echo $form->textField($model,'acronym',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'acronym'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actualnost'); ?>
		<?php echo $form->textField($model,'actualnost'); ?>
		<?php echo $form->error($model,'actualnost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folder_documents'); ?>
		<?php echo $form->textField($model,'folder_documents',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'folder_documents'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
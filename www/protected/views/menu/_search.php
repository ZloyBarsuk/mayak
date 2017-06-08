<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_parent'); ?>
		<?php echo $form->textField($model,'id_parent',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icon_class'); ?>
		<?php echo $form->textField($model,'icon_class',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_path'); ?>
		<?php echo $form->textField($model,'image_path',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
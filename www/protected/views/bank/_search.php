<?php
/* @var $this BankController */
/* @var $model Bank */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id'); ?>
                    <?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'name'); ?>
                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'record_date'); ?>
                    <?php echo $form->textField($model,'record_date',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="row">

    </div>
    <div class="col-md-5">
        <div class="form-group">
            <div class="row buttons">
                <?php echo CHtml::submitButton('Поиск',array('class'=>'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="row">

</div>
<?php
/* @var $this SprVidRabotController */
/* @var $model SprVidRabot */
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
                    <?php echo $form->label($model,'id_rabot'); ?>
                    <?php echo $form->textField($model,'id_rabot',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'naimenovaniye'); ?>
                    <?php echo $form->textField($model,'naimenovaniye',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'procent_ot_summi'); ?>
                    <?php echo $form->textField($model,'procent_ot_summi',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'actualnost'); ?>
                    <?php echo $form->textField($model,'actualnost',array('class'=>'form-control')); ?>
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
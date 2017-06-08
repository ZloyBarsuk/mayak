<?php
/* @var $this SprGosOrganController */
/* @var $model SprGosOrgan */
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
                    <?php echo $form->label($model,'id_rayon'); ?>
                    <?php echo $form->textField($model,'id_rayon',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'uchreghdenie'); ?>
                    <?php echo $form->textField($model,'uchreghdenie',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'fio_nachalnik_otdela'); ?>
                    <?php echo $form->textField($model,'fio_nachalnik_otdela',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'adress'); ?>
                    <?php echo $form->textField($model,'adress',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'cell_phone'); ?>
                    <?php echo $form->textField($model,'cell_phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'phone'); ?>
                    <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
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
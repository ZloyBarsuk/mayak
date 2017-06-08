<?php
/* @var $this DogovorController */
/* @var $model Dogovor */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'id'); ?>
                <?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'id_ispolnitel'); ?>
                <?php echo $form->textField($model, 'id_ispolnitel', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'id_contragent'); ?>
                <?php echo $form->textField($model, 'id_contragent', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'id_author'); ?>
                <?php echo $form->textField($model, 'id_author', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'dogovor_number'); ?>
                <?php echo $form->textField($model, 'dogovor_number', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'dogovor_number_old'); ?>
                <?php echo $form->textField($model, 'dogovor_number_old', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'primechaniye'); ?>
                <?php echo $form->textArea($model, 'primechaniye', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'avans_procent'); ?>
                <?php echo $form->textField($model, 'avans_procent', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'summa_avansa'); ?>
                <?php echo $form->textField($model, 'summa_avansa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'summa_dogovora_nachalnaya'); ?>
                <?php echo $form->textField($model, 'summa_dogovora_nachalnaya', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'created_date'); ?>
                <?php echo $form->textField($model, 'created_date', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'closed_date'); ?>
                <?php echo $form->textField($model, 'closed_date', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'srok_ispolneniya'); ?>
                <?php echo $form->textField($model, 'srok_ispolneniya', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'podpisan_date'); ?>
                <?php echo $form->textField($model, 'podpisan_date', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'status'); ?>
                <?php echo $form->textField($model, 'status', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <?php echo $form->label($model, 'otkat'); ?>
                <?php echo $form->textField($model, 'otkat', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="row">

    </div>
    <div class="col-md-5">
        <div class="form-group">
            <div class="row buttons">
                <?php echo CHtml::submitButton('Поиск', array('class' => 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="row">

</div>
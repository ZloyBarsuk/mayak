<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">
        <div class="row">
            <?php

            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'btn-group'),

                'itemTemplate' => '{menu}',
                'itemCssClass' => 'btn btn-warning btn-clean',


            ));
            ?>
        </div>
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ispolnitel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

        <p class="note">Поля помечены <span class="required">*</span> обязательны к заполнению.</p>
        <div class="alert alert-danger alert-dismissible" role="alert">
        <?php echo $form->errorSummary($model,'','',array('class'=>'')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">

                        <div >
                            <div>
                                <?php echo $form->hiddenField($model,'id'); ?>

                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'name'); ?>
                                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'name'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'comment'); ?>
                                    <?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>1000,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'comment'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'type'); ?>
                                    <?php // echo $form->textField($model,'type',array('size'=>7,'maxlength'=>7,'class'=>'form-control')); ?>
                                    <?php echo $form->dropDownList($model,'type',array('юр.'=>'юр.','физ.'=>'физ.'),array('class'=>'form-control','style'=>'width:60px;')); ?>

                                    <?php echo $form->error($model,'type'); ?>
                                </div>
                            </div>


                                        </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('type'=>'submit','class'=>'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>


    </div>
</div><!-- form -->
<div class="row">

    </div>
<?php
/* @var $this DogovorHistoryController */
/* @var $model DogovorHistory */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dogovor-history-form',
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

                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_dogovor'); ?>
                                    <?php echo $form->textField($model,'id_dogovor',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_dogovor'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'old_info'); ?>
                                    <?php echo $form->textArea($model,'old_info',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'old_info'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'new_info'); ?>
                                    <?php echo $form->textArea($model,'new_info',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'new_info'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'date_modified'); ?>
                                    <?php echo $form->textField($model,'date_modified',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'date_modified'); ?>
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
<?php
/* @var $this DogovorController */
/* @var $model Dogovor */
/* @var $form CActiveForm */


?>

     <div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'dogovor-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'method' => 'POST',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),
        )); ?>




        <p class="note">Поля помечены <span class="required">*</span> обязательны к заполнению.</p>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <?php // echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_ispolnitel'); ?>
                                <?php echo $form->textField($model, 'id_ispolnitel', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'id_ispolnitel'); ?>
                            </div>
                        </div>







                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_contragent'); ?>
                                <?php echo $form->textField($model, 'id_contragent', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'id_contragent'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_author'); ?>
                                <?php echo $form->textField($model, 'id_author', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'id_author'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'dogovor_number'); ?>
                                <?php echo $form->textField($model, 'dogovor_number', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'dogovor_number'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'dogovor_number_old'); ?>
                                <?php echo $form->textField($model, 'dogovor_number_old', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'dogovor_number_old'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'primechaniye'); ?>
                                <?php echo $form->textArea($model, 'primechaniye', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'primechaniye'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'avans_procent'); ?>
                                <?php echo $form->textField($model, 'avans_procent', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'avans_procent'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'summa_avansa'); ?>
                                <?php echo $form->textField($model, 'summa_avansa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'summa_avansa'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'summa_dogovora_nachalnaya'); ?>
                                <?php echo $form->textField($model, 'summa_dogovora_nachalnaya', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'summa_dogovora_nachalnaya'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'created_date'); ?>
                                <?php echo $form->textField($model, 'created_date', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'created_date'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'closed_date'); ?>
                                <?php echo $form->textField($model, 'closed_date', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'closed_date'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'srok_ispolneniya'); ?>
                                <?php echo $form->textField($model, 'srok_ispolneniya', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'srok_ispolneniya'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'podpisan_date'); ?>
                                <?php echo $form->textField($model, 'podpisan_date', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'podpisan_date'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'status'); ?>
                                <?php echo $form->textField($model, 'status', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'status'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'otkat'); ?>
                                <?php echo $form->textField($model, 'otkat', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'otkat'); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Создать' : 'Сохранить', $model->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id' => $model->id)), array(
                'url' => $model->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id' => $model->id)),
                'type' => 'post',
                'data' => 'js:jQuery(this).parents("form").serialize()',
                'success' => 'function(r){
                            if(r=="success"){
                                window.location.reload();
                            }
                            else{
                                $("#create").html(r).dialog("open"); return false;
                            }
                        }',
            ), array('class' => 'btn btn-primary')); ?>




            <?php // echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('type'=>'submit','class'=>'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>


    </div>
</div><!-- form -->
<div class="row">

</div>
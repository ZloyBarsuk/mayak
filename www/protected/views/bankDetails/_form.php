<?php
/* @var $this BankDetailsController */
/* @var $model BankDetails */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bank-details-form',
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
                                    <?php echo $form->labelEx($model,'id_bank'); ?>
                                    <?php echo $form->textField($model,'id_bank',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_bank'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'inn'); ?>
                                    <?php echo $form->textField($model,'inn',array('size'=>12,'maxlength'=>12,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'inn'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_author'); ?>
                                    <?php echo $form->textField($model,'id_author',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_author'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'kpp'); ?>
                                    <?php echo $form->textField($model,'kpp',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'kpp'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'yur_address'); ?>
                                    <?php echo $form->textField($model,'yur_address',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'yur_address'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'fiz_address'); ?>
                                    <?php echo $form->textField($model,'fiz_address',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'fiz_address'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'ogrm'); ?>
                                    <?php echo $form->textField($model,'ogrm',array('size'=>13,'maxlength'=>13,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'ogrm'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'r_s'); ?>
                                    <?php echo $form->textField($model,'r_s',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'r_s'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'k_s'); ?>
                                    <?php echo $form->textField($model,'k_s',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'k_s'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'bic'); ?>
                                    <?php echo $form->textField($model,'bic',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'bic'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'swift'); ?>
                                    <?php echo $form->textField($model,'swift',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'swift'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'account_type'); ?>
                                    <?php echo $form->textField($model,'account_type',array('size'=>3,'maxlength'=>3,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'account_type'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'record_date'); ?>
                                    <?php echo $form->textField($model,'record_date',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'record_date'); ?>
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
<?php
/* @var $this ObjectrabotadressController */
/* @var $model ObjectRabotAdress */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'object-rabot-adress-form',
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
                                    <?php echo $form->labelEx($model,'adress'); ?>
                                    <?php echo $form->textArea($model,'adress',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'adress'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'plochad_rabot'); ?>
                                    <?php echo $form->textField($model,'plochad_rabot',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'plochad_rabot'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'nomer_dopsvedeniya'); ?>
                                    <?php echo $form->textField($model,'nomer_dopsvedeniya',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'nomer_dopsvedeniya'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'data_dopsvedeniya'); ?>
                                    <?php echo $form->textField($model,'data_dopsvedeniya',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'data_dopsvedeniya'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_dogovor'); ?>
                                    <?php echo $form->textField($model,'id_dogovor',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_dogovor'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'archiv_number'); ?>
                                    <?php echo $form->textField($model,'archiv_number',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'archiv_number'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_rayon'); ?>
                                    <?php echo $form->textField($model,'id_rayon',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_rayon'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_avtor'); ?>
                                    <?php echo $form->textField($model,'id_avtor',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_avtor'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'record_date'); ?>
                                    <?php echo $form->textField($model,'record_date',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'record_date'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'kadastroviy_nomer'); ?>
                                    <?php echo $form->textField($model,'kadastroviy_nomer',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'kadastroviy_nomer'); ?>
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
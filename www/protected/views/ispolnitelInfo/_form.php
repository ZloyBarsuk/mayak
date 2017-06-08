<?php
/* @var $this IspolnitelInfoController */
/* @var $model IspolnitelInfo */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ispolnitel-info-form',
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
                                    <?php echo $form->labelEx($model,'id_ispolnitel'); ?>
                                    <?php echo $form->textField($model,'id_ispolnitel',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_ispolnitel'); ?>
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
                                    <?php echo $form->labelEx($model,'nds'); ?>
                                    <?php echo $form->textField($model,'nds',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'nds'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'id_bank'); ?>
                                    <?php echo $form->textField($model,'id_bank',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'id_bank'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'comments'); ?>
                                    <?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'comments'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'pasport'); ?>
                                    <?php echo $form->textField($model,'pasport',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'pasport'); ?>
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
                                    <?php echo $form->labelEx($model,'kpp'); ?>
                                    <?php echo $form->textField($model,'kpp',array('size'=>9,'maxlength'=>9,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'kpp'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'okpo'); ?>
                                    <?php echo $form->textField($model,'okpo',array('size'=>11,'maxlength'=>11,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'okpo'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'ogrn'); ?>
                                    <?php echo $form->textField($model,'ogrn',array('size'=>13,'maxlength'=>13,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'ogrn'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'ogrnip'); ?>
                                    <?php echo $form->textField($model,'ogrnip',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'ogrnip'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'phone'); ?>
                                    <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'phone'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'fax'); ?>
                                    <?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'fax'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'site'); ?>
                                    <?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'site'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'yur_address'); ?>
                                    <?php echo $form->textArea($model,'yur_address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'yur_address'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'fiz_address'); ?>
                                    <?php echo $form->textArea($model,'fiz_address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'fiz_address'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'director'); ?>
                                    <?php echo $form->textField($model,'director',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'director'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'zamestitel'); ?>
                                    <?php echo $form->textField($model,'zamestitel',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'zamestitel'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'email'); ?>
                                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'email'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'logo_path'); ?>
                                    <?php echo $form->textField($model,'logo_path',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'logo_path'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'osnovaniye_dogovora'); ?>
                                    <?php echo $form->textField($model,'osnovaniye_dogovora',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'osnovaniye_dogovora'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'data_from_csv'); ?>
                                    <?php echo $form->textArea($model,'data_from_csv',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'data_from_csv'); ?>
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
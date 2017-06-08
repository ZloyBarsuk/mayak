<?php
/* @var $this SprGosOrganController */
/* @var $model SprGosOrgan */
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
	'id'=>'spr-gos-organ-form',
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
                                    <?php echo $form->labelEx($model,'id_rayon'); ?>
                                    <?php // echo $form->textField($model,'id_rayon',array('class'=>'form-control')); ?>
                                    <?php echo $form->dropDownList($model, 'id_rayon', CHtml::listData(SprRayony::model()->findAll(), 'id', 'naimenovaniye'), array('empty' => 'Выбери район')); ?>

                                    <?php echo $form->error($model,'id_rayon'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'uchreghdenie'); ?>
                                    <?php echo $form->textField($model,'uchreghdenie',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>

                                    <?php echo $form->error($model,'uchreghdenie'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'fio_nachalnik_otdela'); ?>
                                    <?php echo $form->textField($model,'fio_nachalnik_otdela',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'fio_nachalnik_otdela'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'adress'); ?>
                                    <?php echo $form->textField($model,'adress',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'adress'); ?>
                                </div>
                            </div>


                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'cell_phone'); ?>
                                    <?php echo $form->textField($model,'cell_phone',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'cell_phone'); ?>
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
                                <?php echo $form->labelEx($model,'pol'); ?>
                                <?php echo $form->dropDownList($model, 'pol', array('м'=>"М","ж"=>"Ж"),array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'pol'); ?>
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
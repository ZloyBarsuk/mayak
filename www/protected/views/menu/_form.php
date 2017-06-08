<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'menu-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )); ?>

        <p class="note">Поля <span class="required">*</span> обязательны к заполнению.</p>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <?php echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">
                        <!--
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php /*echo $form->labelEx($model,'id_parent'); */ ?>
                                    <?php /*echo $form->textField($model,'id_parent',array('class'=>'form-control')); */ ?>
                                    <?php /*echo $form->error($model,'id_parent'); */ ?>
                                </div>
                            </div>-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_parent'); ?>
                                <?php echo $form->dropDownList($model, 'id_parent',  CHtml::listData($model::model()->findAll(array('condition' => 'id_parent=0')), 'id', 'name'), array('prompt'=>'Выбор категории','class' =>'form-control')); ?>





                                <?php echo $form->error($model, 'id_parent'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'icon_class'); ?>
                                <?php echo $form->textField($model, 'icon_class', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'icon_class'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'name'); ?>
                                <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'name'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'url'); ?>
                                <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'url'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'image_path'); ?>
                                <?php echo $form->textField($model, 'image_path', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'image_path'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-default')); ?>
        </div>

        <?php $this->endWidget(); ?>


    </div
</div><!-- form -->
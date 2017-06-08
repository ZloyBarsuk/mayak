<?php


$this->menu = array(

    array('label' => 'Управление', 'url' => array('admin')),
);
?>

<div class="wrapper wrapper-white">
    <?php

    $this->widget('zii.widgets.CMenu', array(
        'items' => $this->menu,

        'htmlOptions' => array('class' => 'btn-group'),

        'itemTemplate' => '{menu}',
        'itemCssClass' => 'btn btn-warning btn-clean',


    ));
    ?>
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'document-templates-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )); ?>

        <p class="note">Поля помечены <span class="required">*</span> обязательны к заполнению.</p>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <?php echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'title'); ?>
                                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'title'); ?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'content'); ?>
                                <?php // echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                <?php //echo $form->error($model, 'content'); ?>
                            </div>
                        </div>
                        <?php
                        /*



                                                $this->widget('ext.ckeditor.CKEditorWidget', array(
                                                    "model" => $model,
                                                    "attribute" => 'content',
                                                    "defaultValue"=>$model->content,

                                                    # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                    "config" => array(
                                                        "height"=>"400px",
                                                        "width"=>"100%",
                                                        "toolbar"=>"Basic",
                                                    ),

                                                    #Optional address settings if you did not copy ckeditor on application root
                                                    "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                    # Path to ckeditor.php
                                                    "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                ));
                                                */ ?>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'actualnost'); ?>
                                <?php // echo $form->textField($model, 'actualnost', array('size' => 1, 'maxlength' => 1, 'class' => 'form-control')); ?>

                                <?php echo $form->dropDownList($model, 'actualnost', array('Y' => 'да', 'N' => 'нет'), array('empty' => 'Выбор статуса')); ?>
                                <?php echo $form->error($model, 'actualnost'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'type'); ?>
                                <?php // echo $form->textField($model, 'type', array('size' => 1, 'maxlength' => 1, 'class' => 'form-control')); ?>

                                <?php echo $form->dropDownList($model, 'type',
                                    array(
                                        'actobsledovaniya' => 'Акт обследования',
                                        'actpriyomki' => 'АктПриемки',
                                        'vinosmejevih' => 'Вынос межевых',
                                        'doverennost' => 'Доверенность',
                                        'soglasheniye' => 'ДопСоглашение',
                                        'dopsvedeniya' => 'ЗаявНаДопСв',
                                        'propusk' => 'Пропуск',
                                        'soprovodlist' => 'СопрЛистЗаказа',
                                        'dogovor' => 'Договор',
                                        'schet' => 'Счет',
                                        'tgr' => 'ТГР',
                                        'tzk' => 'ТЗ_К',
                                        'tzkz' => 'ТЗ_К3',
                                        'tzt' => 'ТЗ_Т',


                                    ), array('empty' => 'Выберите шаблон документа',)); ?>
                                <?php echo $form->error($model, 'type'); ?>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'Выбор падежа шапки'); ?>
                                <?php // echo $form->textField($model, 'type', array('size' => 1, 'maxlength' => 1, 'class' => 'form-control')); ?>

                                <?php echo $form->dropDownList($model, 'padej',
                                    array(
                                        '0' => 'именительный',
                                        '1' => 'родительный',
                                        '2' => 'дательный',
                                        '3' => 'винительный',
                                        '4' => 'творительный',
                                        '5' => 'предложный',


                                    ), array('empty' => 'Падеж шапки документа',)); ?>
                                <?php echo $form->error($model, 'padej'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php //echo $form->labelEx($model, 'date'); ?>
                                <?php //echo $form->textField($model, 'date', array('class' => 'form-control')); ?>
                                <?php //echo $form->error($model, 'date'); ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>


</div>
</div><!-- form -->
<div class="row">

</div>
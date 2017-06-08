<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $model EtapRaborPoObjectu */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'etap-rabot-po-objectu-form',
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


                        <div>
                            <div class="form-group">
                                <?php //echo $form->labelEx($model, 'id_objecta'); ?>
                                <?php echo $form->hiddenField($model, 'id_objecta', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'id_objecta'); ?>


                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'id_spr_etap_rabot'); ?>
                                    <?php // echo $form->textField($model, 'id_spr_etap_rabot', array('class' => 'form-control')); ?>
                                    <?php echo CHtml::activeDropDownList($model, 'id_spr_etap_rabot', CHtml::listData(SprEtapRabot::model()->findAllByAttributes(array('actualnost' => 1),array('order'=>'etap_rabot ASC')), 'id', 'etap_rabot'), array('empty' => 'Выбор этапа работ')); ?>

                                    <?php echo $form->error($model, 'id_spr_etap_rabot'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'id_otvetstvennogo'); ?>
                                    <?php // echo $form->textField($model, 'id_otvetstvennogo', array('class' => 'form-control')); ?>
                                    <?php echo CHtml::activeDropDownList($model, 'id_otvetstvennogo', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор ответственного')); ?>

                                    <?php echo $form->error($model, 'id_otvetstvennogo'); ?>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'data_nachala_rabot'); ?>
                                    <?php // echo $form->textField($model, 'data_nachala_rabot', array('class' => 'form-control')); ?>
                                    <?php echo $form->dateField($model, 'data_nachala_rabot', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'data_nachala_rabot'); ?>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'data_okonchaniya_rabot'); ?>
                                    <?php // echo $form->textField($model, 'data_okonchaniya_rabot', array('class' => 'form-control')); ?>

                                    <?php echo $form->dateField($model, 'data_okonchaniya_rabot', array('class' => 'form-control')); ?>

                                    <?php echo $form->error($model, 'data_okonchaniya_rabot'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-10">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'document_number'); ?>
                                    <?php echo $form->textField($model, 'document_number', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'document_number'); ?>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'srok_dney'); ?>
                                    <?php echo $form->textField($model, 'srok_dney', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'srok_dney'); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'status'); ?>
                                    <?php // echo $form->textField($model, 'status', array('size' => 24, 'maxlength' => 24, 'class' => 'form-control')); ?>
                                    <?php echo CHtml::activeDropDownList($model, 'status', array(' в работе' => ' в работе', 'приостановка' => 'приостановка', 'выполнено' => 'выполнено', 'отказ' => 'отказ',)); ?>
                                    <?php echo $form->error($model, 'status'); ?>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'comment'); ?>
                                    <?php echo $form->textArea($model, 'comment', array('rows' => 3, 'cols' => 35, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'comment'); ?>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php // echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
            <?php echo CHtml::ajaxSubmitButton(
                $model->isNewRecord ? 'Создать' : 'Сохранить', '',
                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'success' => 'js:function(response){

                    if(response.status === "true"){

                    jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                    jQuery.fn.yiiGridView.update("etap_rabot_grid");

                    }
                    else{

                    var error_list="";
                    jQuery.each(response.message, function(i, val) {

                     error_list=error_list+val+"\r\n";

                      });

                   jQuery("body #notifier_error").html(error_list).show("slow").hide(10000);

                }

                }',

                    'error' => 'js:function(response){

                    alert(response);

                      }',

                ),
                array(
                    // Меняем тип элемента на submit, чтобы у пользователей с отключенным JavaScript всё было хорошо.
                    'type' => 'submit',
                    'id' => 'form_submit_' . rand(1, 50000),// рандомный айди для удаления дублей при аджаксе, костыль
                    // 'id' => 'form_submit_' . new Date() . getTime(),// чтобы точно было уникальное айди кнопки сабмит-+++
                    'class' => 'btn btn-primary',
                ));
            ?>


        </div>

        <?php $this->endWidget(); ?>
        <p class="note" id="notifier"></p>

        <div class="alert alert-success alert-dismissible" role="alert"
             id="notifier_success" style="display:none">
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error"
             style="display:none">
        </div>

    </div><!-- form -->
<div class="row">

</div>
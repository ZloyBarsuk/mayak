<?php
/* @var $this BankController */
/* @var $model Bank */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">


    <?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'bank-form',
        //  'action' => '/contragent/create',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'method' => 'POST',
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
        ),

    ));

    ?>


        <div class="wrapper wrapper-white">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $form->hiddenField($model_bank, 'id_contragenta'); ?>
                        <?php echo $form->hiddenField($model_bank, 'id_ispolnitel'); ?>
                        <?php echo $form->labelEx($model_bank, 'name'); ?>
                        <?php echo $form->textField($model_bank, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank, 'name'); ?>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="">
                    <div class="form-group">
                        <?php echo $form->hiddenField($model_bank_info, 'id_bank'); ?>
                        <?php // echo $form->textField($model_bank_info, 'id_bank', array('class' => 'form-control')); ?>
                        <?php // echo $form->error($model_bank_info, 'id_bank'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'inn'); ?>
                        <?php echo $form->textField($model_bank_info, 'inn', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'inn'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php // echo $form->labelEx($model_bank_info, 'id_author'); ?>
                        <?php // echo $form->textField($model_bank_info, 'id_author', array('class' => 'form-control')); ?>
                        <?php // echo $form->error($model_bank_info, 'id_author'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'kpp'); ?>
                        <?php echo $form->textField($model_bank_info, 'kpp', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'kpp'); ?>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'yur_address'); ?>
                        <?php echo $form->textField($model_bank_info, 'yur_address', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'yur_address'); ?>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'fiz_address'); ?>
                        <?php echo $form->textField($model_bank_info, 'fiz_address', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'fiz_address'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'ogrm'); ?>
                        <?php echo $form->textField($model_bank_info, 'ogrm', array('size' => 13, 'maxlength' => 13, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'ogrm'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'r_s'); ?>
                        <?php echo $form->textField($model_bank_info, 'r_s', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'r_s'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'k_s'); ?>
                        <?php echo $form->textField($model_bank_info, 'k_s', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'k_s'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'bic'); ?>
                        <?php echo $form->textField($model_bank_info, 'bic', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'bic'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'swift'); ?>
                        <?php echo $form->textField($model_bank_info, 'swift', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_bank_info, 'swift'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model_bank_info, 'account_type'); ?>
                        <?php // echo $form->textField($model_bank_info, 'account_type', array('size' => 3, 'maxlength' => 3, 'class' => 'form-control')); ?>
                        <?php echo CHtml::activeDropDownList($model_bank_info, 'account_type', array('rub' => 'рубль', 'eur' => 'евро', 'usd' => 'доллар')); ?>

                        <?php echo $form->error($model_bank_info, 'account_type'); ?>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">

                        <?php // echo $form->labelEx($model_bank_info, 'record_date'); ?>
                        <?php // echo $form->textField($model_bank_info, 'record_date', array('class' => 'form-control')); ?>
                        <?php // echo $form->error($model_bank_info, 'record_date'); ?>
                        <?php
                        echo CHtml::radioButtonList(
                            'registerMode',
                            'yes',
                            array(
                                'yes'=>'Изменение ошибки в данных',
                                'no'=>'Добавление новых реквизитов',
                            )
                           // array('template'=>'<div class="rb">{input}</div><div class="rb">{label}</div><div class="clear">&nbsp;</div>')
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">

                    <?php echo CHtml::ajaxSubmitButton(
                        $model_bank_info->isNewRecord ? 'Создать' : 'Сохранить', '',
                        /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                        array(
                            'dataType' => 'json',
                            'type' => 'post',
                            'success' => 'js:function(response){

                    if(response.status === "true"){

                    jQuery("body #notifier_success_bank").html(response.message).show("fast").hide(10000);

                    jQuery.fn.yiiGridView.update("bank-grid");


                    }
                    else{

                    var error_list="";
                    jQuery.each(response.message, function(i, val) {

                     error_list=error_list+val+"\r\n";

                      });

                   jQuery("body #notifier_error_bank").html(error_list).show("slow").hide(10000);

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
                     id="notifier_success_bank" style="display:none">
                </div>

                <div class="alert alert-danger alert-dismissible" role="alert"
                     id="notifier_error_bank" style="display:none">
                </div>
            </div>
            <!-- form -->
           </div>


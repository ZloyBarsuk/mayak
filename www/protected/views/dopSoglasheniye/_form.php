<?php
/* @var $this DopSoglasheniyeController */
/* @var $model DopSoglasheniye */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'dop-soglasheniye-form',
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
            <?php // echo $form->errorSummary($model,'','',array('class'=>'')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">
                        <div class="">
                            <div class="form-group">
                                <?php //echo $form->labelEx($model,'id_dogovor'); ?>
                                <?php echo $form->hiddenField($model, 'id_dogovor', array('class' => 'form-control')); ?>
                                <?php // echo $form->error($model,'id_dogovor'); ?>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'name'); ?>
                                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'name'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'srok_ispolneniya'); ?>
                                <?php echo $form->textField($model, 'srok_ispolneniya', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'srok_ispolneniya'); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'tip_dney'); ?>
                                <?php echo CHtml::activeDropDownList($model, 'tip_dney', array('к/дни' => 'календарные дни', 'р/дни' => 'рабочие дни',), array('empty' => 'Выбор типа дней')); ?>
                                <?php echo $form->error($model, 'tip_dney'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'number'); ?>
                                <?php echo $form->textField($model, 'number', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'number'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'status'); ?>
                                <?php // echo $form->textField($model, 'type', array('size' => 24, 'maxlength' => 24, 'class' => 'form-control')); ?>
                                <?php echo CHtml::activeDropDownList($model, 'status', array(
                                    'в работе' => 'в работе',
                                    'на подписании' => 'на подписании',
                                    'не заключили' => 'не заключили',
                                    'расторгнут' => 'расторгнут',
                                    'закрыт' => 'закрыт',
                                    'приостановлен' => 'приостановлен',
                                    'не оплачен' => 'не оплачен',
                                    'оплачен' => 'оплачен',

                                ), array('empty' => 'Статус доп. соглашения')); ?>

                                <?php echo $form->error($model, 'status'); ?>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'data_podpisaniya'); ?>
                                <?php echo $form->dateField($model, 'data_podpisaniya', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'data_podpisaniya'); ?>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'data_vneseniya'); ?>
                                <?php echo $form->dateField($model, 'data_vneseniya', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'data_vneseniya'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'type'); ?>
                                <?php // echo $form->textField($model, 'type', array('size' => 24, 'maxlength' => 24, 'class' => 'form-control')); ?>
                                <?php echo CHtml::activeDropDownList($model, 'type', array('иное' => 'информацию из поля "НАЗВАНИЕ"', 'по виду работ' => 'вид работ'), array('empty' => 'Что выводить при печати?')); ?>
                                <?php echo $form->error($model, 'type'); ?>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="alert alert-info alert-dismissible"
                                 style="padding:5px;" role="alert">
                                <strong>Суммы и насичления </strong>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'summa'); ?>
                                    <?php echo $form->textField($model, 'summa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'summa'); ?>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'nds'); ?>
                                    <?php echo $form->textField($model, 'nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'nds'); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'summa_avansa'); ?>
                                    <?php echo $form->textField($model, 'summa_avansa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'summa_avansa'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'avans_procent'); ?>
                                    <?php echo $form->textField($model, 'avans_procent', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'avans_procent'); ?>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'summa_nds'); ?>
                                    <?php echo $form->textField($model, 'summa_nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'summa_nds'); ?>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'comment'); ?>
                                <?php echo $form->textArea($model, 'comment', array('rows' => 3, 'cols' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'comment'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'id_template'); ?>

                                    <?php echo $form->dropDownList($model, 'id_template', CHtml::listData(DocumentTemplates::model()->findAllByAttributes(array('type' => 'soglasheniye')), 'id', 'title'), array('empty' => 'Выбери шаблон')); ?>
                                    <?php echo $form->error($model, 'id_template'); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('type'=>'submit','class'=>'btn btn-primary')); ?>
            <?php echo CHtml::ajaxSubmitButton(
                $model->isNewRecord ? 'Создать' : 'Сохранить', '',
                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'success' => 'js:function(response){
                 if(response.status === "true"){

                  jQuery("body #DopSoglasheniye_summa").val(response.summa);
                  jQuery("body #DopSoglasheniye_nds").val(response.nds);
                  jQuery("body #DopSoglasheniye_summa_avansa").val(response.summa_avansa);
                  jQuery("body #DopSoglasheniye_avans_procent").val(response.avans_procent);
                  jQuery("body #DopSoglasheniye_summa_nds").val(response.summa_nds);


                  jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                    jQuery.fn.yiiGridView.update("dopsoglasheniye-grid");
                }else{
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

        <div class="alert alert-success alert-dismissible" role="alert" id="notifier_success" style="display:none">
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error" style="display:none">
        </div>
    </div>
</div><!-- form -->
<div class="row">

</div>
<?php
/* @var $this CalendarController */
/* @var $model EventFullcalendar */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'event-fullcalendar-form',

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
                    <?php echo $form->hiddenField($model, 'id'); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'title'); ?>
                                <?php echo $form->textField($model, 'title', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'title'); ?>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'event'); ?>
                                <?php echo $form->textArea($model, 'event', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'event'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'date_start'); ?>
                                <?php echo $form->dateField($model, 'date_start', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'date_start'); ?>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'date_end'); ?>
                                <?php echo $form->dateField($model, 'date_end', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'date_end'); ?>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'status'); ?>
                                <?php echo CHtml::activeDropDownList($model, 'status', array('0' => 'отключить', '1' => 'включить'), array('empty' => 'Видимость задания в календаре')); ?>

                                <?php echo $form->error($model,'status'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'responsible'); ?>
                                <?php echo $form->dropDownList($model, 'responsible', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор исполнителя')); ?>

                                <?php echo $form->error($model,'responsible'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'author'); ?>
                                <?php echo $form->dropDownList($model, 'author', CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
                                <?php echo $form->error($model,'author'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <?php // echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('type'=>'submit','class'=>'btn btn-primary')); ?>

            <?php echo CHtml::ajaxSubmitButton(
                $model->isNewRecord ? 'Создать' : 'Сохранить', '',
                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'success' => 'js:function(response){
                 if(response.status === "true"){
                  jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);

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
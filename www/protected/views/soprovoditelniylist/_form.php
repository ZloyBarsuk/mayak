<?php
/* @var $this SoprovoditelniylistController */
/* @var $model SoprovoditelniyList */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'soprovoditelniy-list-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'method' => 'POST',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),
        )); ?>

        <p class="note">Поля помечены <span class="required">*</span> обязательны к заполнению.</p>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">

                        <!--
                        новый код начало-->
                        <div class="table-responsive">
                            <table border="0" class="table table-bordered table-striped">
                                <div class="col-md-12">
                                    <tr>

                                        <th scope="col">Ответственное лицо</th>
                                        <th scope="col">Дата выдачи</th>
                                        <th scope="col">Дата сдачи</th>
                                        <th scope="col">Работу проверил</th>

                                    </tr>


                                    <tr>

                                        <td colspan="4">
                                            <div class="alert alert-info alert-dismissible"
                                                 style="padding:5px;" role="alert">
                                                <strong>Полевые работ&#1099;</strong>
                                            </div>
                                        </td>

                                    </tr>
                                    <div class="col-md-12">
                                        <tr>
                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <?php echo $form->hiddenField($model, 'id_objecta', array('class' => 'form-control')); ?>
                                                        <?php //echo $form->textField($model,'id_objecta',array('class'=>'form-control')); ?>
                                                        <?php // echo $form->error($model,'id_objecta'); ?>
                                                        <?php echo CHtml::label('Полевик 1', 'id_polevik_1'); ?>
                                                        <?php // echo $form->textField($model,'id_polevik_1',array('class'=>'form-control')); ?>
                                                        <?php echo CHtml::activeDropDownList($model, 'id_polevik_1', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                        <?php echo $form->error($model, 'id_polevik_1'); ?>
                                                        <?php echo CHtml::label('Полевик 2', 'id_polevik_2'); ?>
                                                        <?php // echo $form->textField($model,'id_polevik_1',array('class'=>'form-control')); ?>
                                                        <?php echo CHtml::activeDropDownList($model, 'id_polevik_2', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                        <?php echo $form->error($model, 'id_polevik_2'); ?>
                                                    </div>
                                                </div>

                                            </td>

                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <?php // echo $form->labelEx($model, 'data_vidachi_pole'); ?>
                                                        <?php echo $form->dateField($model, 'data_vidachi_pole', array('class' => 'form-control')); ?>
                                                        <?php echo $form->error($model, 'data_vidachi_pole'); ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <?php // echo $form->labelEx($model, 'data_sdachi_pole'); ?>
                                                        <?php echo $form->dateField($model, 'data_sdachi_pole', array('class' => 'form-control')); ?>
                                                        <?php echo $form->error($model, 'data_sdachi_pole'); ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <?php // echo $form->labelEx($model, 'id_proveril_pole'); ?>
                                                        <?php echo CHtml::activeDropDownList($model, 'id_proveril_pole', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                        <?php // echo $form->textField($model,'id_proveril_pole',array('class'=>'form-control')); ?>
                                                        <?php echo $form->error($model, 'id_proveril_pole'); ?>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    </div>

                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-info alert-dismissible"
                                                 style="padding:5px;" role="alert"><strong>Камеральные работы</strong>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'id_kameralka'); ?>
                                                    <?php echo CHtml::activeDropDownList($model, 'id_kameralka', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                    <?php // echo $form->textField($model,'id_kameralka',array('class'=>'form-control')); ?>
                                                    <?php echo $form->error($model, 'id_kameralka'); ?>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'data_vidachi_kameralka'); ?>
                                                    <?php echo $form->dateField($model, 'data_vidachi_kameralka', array('class' => 'form-control')); ?>
                                                    <?php echo $form->error($model, 'data_vidachi_kameralka'); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'data_sdachii_kameralka'); ?>
                                                    <?php echo $form->dateField($model, 'data_sdachii_kameralka', array('class' => 'form-control')); ?>
                                                    <?php echo $form->error($model, 'data_sdachii_kameralka'); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'id_proveril_kameralka'); ?>
                                                    <?php echo CHtml::activeDropDownList($model, 'id_proveril_kameralka', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                    <?php // echo $form->textField($model,'id_proveril_kameralka',array('class'=>'form-control')); ?>
                                                    <?php echo $form->error($model, 'id_proveril_kameralka'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-info alert-dismissible"
                                                 style="padding:5px;" role="alert"><strong>Межевые работы</strong></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'id_mejevoy'); ?>
                                                    <?php echo CHtml::activeDropDownList($model, 'id_mejevoy', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>
                                                    <?php // echo $form->textField($model,'id_mejevoy',array('class'=>'form-control')); ?>
                                                    <?php echo $form->error($model, 'id_mejevoy'); ?>
                                                </div>
                                            </div>
                                        </td>

                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'data_sdachi_mejevoy'); ?>
                                                    <?php echo $form->dateField($model, 'data_sdachi_mejevoy', array('class' => 'form-control')); ?>
                                                    <?php echo $form->error($model, 'data_sdachi_mejevoy'); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <?php // echo $form->labelEx($model, 'id_proveril_mejevoy'); ?>
                                                    <?php echo CHtml::activeDropDownList($model, 'id_proveril_mejevoy', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('empty' => 'Выбор полевика')); ?>

                                                    <?php // echo $form->textField($model,'id_proveril_mejevoy',array('class'=>'form-control')); ?>
                                                    <?php echo $form->error($model, 'id_proveril_mejevoy'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="col-md-12">
                                        <tr>
                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <?php echo $form->labelEx($model, 'status'); ?>
                                                        <?php echo CHtml::activeDropDownList($model, 'status', array(' в работе' => ' в работе', 'приостановка' => 'приостановка', 'выполнено' => 'выполнено')); ?>
                                                        <?php echo $form->error($model, 'status'); ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>

                                            </td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                    </div>

                                </div>
                            </table>
                            <div class="col-md-12">

                                <?php
                                echo CHtml::radioButtonList('select_all', 'no',  array( 'no'=>'Внести полевые работы только по Этому адресу?','yes'=>'Внести полевые работы по ВСЕМ адресам этого договора?')  , array('labelOptions'=>array('style'=>'display:inline;align:left;size:10px;'), ));
                                ?>

                            </div>
                        </div>
                        <!--   новый код конец

                         -->


                        <!--
                        здесь старый код
                        -->


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
                    jQuery.fn.yiiGridView.update("pole-grid");
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
                //    alert(JSON.stringify(response));
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
                <a href="#" data-dismiss="modal" class="btn" data-target="#modal-dialog-third">Закрыть</a>
            </div>

            <?php $this->endWidget(); ?>

            <p class="note" id="notifier"></p>

            <div class="alert alert-success alert-dismissible" role="alert" id="notifier_success" style="display:none">
            </div>

            <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error" style="display:none">
            </div>


        </div>
    </div>
    <!-- form -->
    <div class="row">

    </div>
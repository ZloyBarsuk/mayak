<?php
/* @var $this SchetController */
/* @var $model Schet */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schet-form',
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
        <?php echo $form->errorSummary($model,'','',array('class'=>'')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div>
                                    <?php //echo $form->labelEx($model, 'id_dogovor'); ?>
                                    <?php echo $form->textField($model, 'id', array('class' => 'form-control', 'style' => 'display:none;')); ?>
                                    <?php echo $form->error($model, 'id'); ?>
                                </div>
                                <div>
                                    <?php //echo $form->labelEx($model, 'id_dogovor'); ?>
                                    <?php echo $form->textField($model, 'id_dogovor', array('class' => 'form-control', 'style' => 'display:none;')); ?>
                                    <?php echo $form->error($model, 'id_dogovor'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'schet_number'); ?>
                                            <?php // echo $form->textField($model, 'id_dogovor', array('class' => 'form-control')); ?>
                                            <?php echo $form->textField($model, 'schet_number', array('class' => 'form-control', 'value' => $model->schet_number, 'style' => 'display:display;')); ?>


                                            <?php echo $form->error($model, 'id_dogovor'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'id_dopsoglasheniya'); ?>
                                            <?php //echo $form->textField($model, 'id_dopsoglasheniya', array('class' => 'form-control')); ?>
                                            <?php echo CHtml::activeDropDownList($model, 'id_dopsoglasheniya', CHtml::listData(DopSoglasheniye::model()->findAllByAttributes(array('id_dogovor' => $model->id_dogovor)), 'id', 'number'), array('empty' => 'Доп. соглашение как основание ?')); ?>
                                            <?php echo $form->error($model, 'id_dopsoglasheniya'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'status'); ?>
                                            <?php // echo $form->textField($model, 'status', array('size' => 19, 'maxlength' => 19, 'class' => 'form-control')); ?>
                                            <?php echo $form->dropDownList($model, 'status', array('оплачен' => 'оплачен', 'не оплачен' => 'не оплачен'), array('empty' => 'Выбери статус оплаты')); ?>

                                            <?php echo $form->error($model, 'status'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'summa_bez_nds'); ?>
                                            <?php echo $form->textField($model, 'summa_bez_nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'summa_bez_nds'); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'nds'); ?>
                                            <?php echo $form->textField($model, 'nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'nds'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'summa_s_nds'); ?>
                                            <?php echo $form->textField($model, 'summa_s_nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'summa_s_nds'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'tip_oplati'); ?>
                                            <?php // echo $form->textField($model, 'tip_oplati', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                                            <?php echo $form->dropDownList($model, 'tip_oplati', array('нал' => 'нал', 'безнал' => 'безнал'), array('empty' => 'Выбери тип оплаты')); ?>
                                            <?php echo $form->error($model, 'tip_oplati'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'schet_tip'); ?>
                                            <?php // echo $form->textField($model, 'schet_tip', array('class' => 'form-control')); ?>
                                            <?php //echo CHtml::activeDropDownList($model, 'schet_tip', CHtml::listData(TipScheta::model()->findAll(), 'id', 'naimenovanie'), array('empty' => 'Выбор типа счета')); ?>
                                            <?php echo $form->dropDownList($model, 'schet_tip', CHtml::listData(TipScheta::model()->findAll(), 'id', 'naimenovanie'), array('empty' => 'Выбор типа счета')); ?>

                                            <?php echo $form->error($model, 'schet_tip'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'data_scheta'); ?>
                                            <?php /*echo $form->textField($model, 'data_scheta', array('class' => 'form-control')); */ ?>
                                            <?php echo $form->dateField($model, 'data_scheta', array('class' => 'form-control')); ?>

                                            <?php echo $form->error($model, 'data_scheta'); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'data_oplati'); ?>
                                            <?php /*echo $form->textField($model, 'data_oplati', array('class' => 'form-control'));*/ ?>
                                            <?php echo $form->dateField($model, 'data_oplati', array('class' => 'form-control')); ?>

                                            <?php echo $form->error($model, 'data_oplati'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'author_id'); ?>
                                            <?php // echo $form->textField($model, 'author_id', array('class' => 'form-control')); var_dump(User::model()->findByPk(Yii::app()->user->id));?>
                                            <?php echo CHtml::activeDropDownList($model, 'author_id', CHtml::listData(User::model()->findAllByAttributes(array('id' => Yii::app()->user->id)), 'id', 'username')); ?>

                                            <?php echo $form->error($model, 'author_id'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'comment'); ?>
                                            <?php // echo $form->textField($model, 'comment', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                            <?php echo $form->textArea($model, 'comment', array('rows' => 2, 'cols' => 6, 'class' => 'form-control')); ?>

                                            <?php echo $form->error($model, 'comment'); ?>
                                        </div>
                                    </div>


                                </div>
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
                    jQuery("body #Schet_summa_bez_nds").val(response.summa_bez_nds);
                    jQuery("body #Schet_nds").val(response.nds);
                    jQuery("body #Schet_summa_s_nds").val(response.summa_s_nds);
                    jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                  //  jQuery.fn.yiiGridView.update("schet-form");
                     jQuery.fn.yiiGridView.update("schet-grid");
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

        <div class="alert alert-success alert-dismissible" role="alert" id="notifier_success" style="display:none">
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error" style="display:none">
        </div>

    </div>
</div><!-- form -->
<div class="row">

    </div>
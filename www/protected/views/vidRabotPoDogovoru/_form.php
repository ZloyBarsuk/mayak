<?php // Yii::app()->clientScript->scriptMap = array('jquery.yiigridview.js'=> false,); ?>

<?php
/* @var $this VidRaborPoDogovoruController */
/* @var $model VidRaborPoDogovoru */
/* @var $form CActiveForm */
?>


<?php Yii::app()->getClientScript()->registerCoreScript('vidrabot'); ?>


<div class="wrapper wrapper-white">
    <div class="page-subtitle">
        <?php // Yii::app()->clientScript->scriptMap = array('jquery.js' => false,); ?>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'vid_rabot_po_dogovoru_form_',
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
            <strong>Внимание! Суммы должны быть прописаны через символ ".", а не ","</strong>
            <?php //echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">

                    </div>
                    <div class="row">
                        <table border="0">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php //echo $form->labelEx($model, 'id_dogovor'); ?>
                                        <?php echo $form->textField($model, 'id_dogovor', array('class' => 'form-control', 'style' => 'display:none;')); ?> <?php echo $form->error($model, 'id_dogovor'); ?> </div>
                                    <div class="col-md-8">
                                        <div class="form-group"> <?php echo $form->labelEx($model, 'id_vid_rabot'); ?>
                                            <?php // echo $form->textField($model,'id_vid_rabot',array('class'=>'form-control')); ?>
                                            <?php echo CHtml::activeDropDownList($model, 'id_vid_rabot', CHtml::listData(SprVidRabot::model()->findAll(array('condition'=>"actualnost=:act", 'params'=>array(":act"=>1), 'order'=>'naimenovaniye',)), 'id_rabot', 'naimenovaniye'), array('empty' => 'Выбор вида работы'), array()); ?> <?php echo $form->error($model, 'id_vid_rabot'); ?>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-md-8">
                                        <div
                                            class="form-group"> <?php echo CHtml::label('Ввести новый вид работ в справочник', ''); ?>
                                            <?php echo $form->textField($model_vid_rabot, 'naimenovaniye', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model_vid_rabot, 'naimenovaniye'); ?>
                                        </div>
                                    </div>
                                </td>
                                <td style="align-items: baseline">
                                    <input class="btn btn-primary btn-xs" id="addvidrabot" type="button"
                                           value="добавить">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">


                    <!--<div class="col-md-2">
                        <div class="form-group">
                            <?php /*echo $form->labelEx($model, 'status'); */ ?>
                            <?php /*echo CHtml::activeDropDownList($model, 'status', array('выполнено' => 'выполнено', 'в работе' => 'в работе',), array('empty' => 'Выбор статуса')); */ ?>
                            <?php /*echo $form->error($model, 'status'); */ ?>
                        </div>
                    </div>-->

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'id_otvetstvennogo'); ?>
                            <?php // echo $form->textField($model,'id_otvetstvennogo',array('class'=>'form-control')); ?>
                            <?php echo CHtml::activeDropDownList($model, 'id_otvetstvennogo', CHtml::listData(User::model()->findAllByAttributes(array('id' => Yii::app()->user->id)), 'id', 'username')); ?>

                            <?php echo $form->error($model, 'id_otvetstvennogo'); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'id_dopsoglasheniya'); ?>
                            <?php // var_dump(DopSoglasheniye::model()->findAllByAttributes(array('id_dogovor' => $model->id_dogovor)));exit();// echo $form->textField($model,'id_otvetstvennogo',array('class'=>'form-control')); ?>
                            <?php echo CHtml::activeDropDownList($model, 'id_dopsoglasheniya', CHtml::listData(DopSoglasheniye::model()->findAllByAttributes(array('id_dogovor' => $model->id_dogovor)), 'id', 'number'), array('empty' => 'Выбор доп. соглашения')); ?>

                            <?php echo $form->error($model, 'id_dopsoglasheniya'); ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'srok_ispolneniya'); ?>
                            <?php echo $form->textField($model, 'srok_ispolneniya', array('class' => 'form-control')); ?>
                            <?php // echo $form->dateField($model, 'srok_ispolneniya', array('class' => 'form-control')); ?>


                            <?php echo $form->error($model, 'srok_ispolneniya'); ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'vid_dney'); ?>
                            <?php // echo $form->textField($model,'vid_dney',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
                            <?php echo CHtml::activeDropDownList($model, 'vid_dney', array('рабочие' => 'рабочие', 'календаные' => 'календаные',), array('empty' => 'Выбор вида дней')); ?>

                            <?php echo $form->error($model, 'vid_dney'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'data_nachala'); ?>
                            <?php // echo $form->textField($model,'data_nachala',array('class'=>'form-control')); ?>
                            <?php echo $form->dateField($model, 'data_nachala', array('class' => 'form-control')); ?>

                            <?php echo $form->error($model, 'data_nachala'); ?>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'data_okonchaniya'); ?>
                            <?php // echo $form->textField($model,'data_okonchaniya',array('class'=>'form-control')); ?>
                            <?php echo $form->dateField($model, 'data_okonchaniya', array('class' => 'form-control', 'disabled' => 'disabled')); ?>

                            <?php echo $form->error($model, 'data_okonchaniya'); ?>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'summa'); ?>
                            <?php echo $form->textField($model, 'summa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'summa'); ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'nds'); ?>
                            <?php echo $form->textField($model, 'nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php // echo CHtml::activeDropDownList($model, 'nds', array('Y' => 'да', 'N' => 'нет',), array('empty' => 'Считать с НДС?')); ?>

                            <?php echo $form->error($model, 'nds'); ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'nds_summa'); ?>
                            <?php echo $form->textField($model, 'nds_summa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'nds_summa'); ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-md-12">


                    <div class="col-md-3">
                        <div class="form-group">
                            <?php //echo $form->labelEx($model, 'data'); ?>
                            <?php echo $form->textField($model, 'data', array('class' => 'form-control', 'style' => 'display:none;')); ?>
                            <?php echo $form->error($model, 'data'); ?>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'comment'); ?>
                            <?php echo $form->textArea($model, 'comment', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'comment'); ?>
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

                  //  alert(response.status);
                    jQuery("body #notifier_success").html(response.message).show("slow").hide(10000);
                    jQuery("body #VidRabotPoDogovoru_nds").val(response.nds);
                      jQuery("body #VidRabotPoDogovoru_nds_summa").val(response.nds_summa);

                    jQuery.fn.yiiGridView.update("vid-rabot-po-dogovoru-form_");

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
alert(response.status);
                    alert(JSON.stringify(response));

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
            </div>

        </div>
    </div>
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
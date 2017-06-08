<?php
/* @var $this ObjectRabotController */
/* @var $model ObjectRabot */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php //Yii::app()->clientScript->scriptMap = array('jquery.yiigridview.js'=> false,); ?>




        <?php // Yii::app()->clientScript->scriptMap = array('jquery.js' => false,'jquery.min.js'=> false,); ?>

        <?php // Yii::app()->clientScript->scriptMap["*.js"] = false;

        //   var_dump($model);

        // exit();


        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <span>Штрих Код адреса   <?php  // echo strlen($ean); // echo $ean;  ?>
                        :</span>
                    <?php
                    echo '<div id="showBarcode"><div>'; //the same id should be given to the extension item id

                    $optionsArray = array(
                        'elementId' => 'showBarcode', /*id of div or canvas*/
                         /* 'value' => '4797001018719', */  /* value for EAN 13 be careful to set right values for each barcode type */
                        'value' => $model->ean,//$ean, // '3160468420000',
                        'type' => 'ean13',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/

                    );
                    $this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
                    ?>
                </div>
            </div>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'object-rabot-form',
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
            <?php //echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php // echo $form->labelEx($model, 'kadastroviy_nomer'); ?>
                                <?php echo $form->hiddenField($model, 'id', array('rows' => 4, 'cols' => 10, 'class' => 'form-control')); ?>
                                <?php // echo $form->error($model, 'kadastroviy_nomer'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'kadastroviy_nomer'); ?>
                                <?php echo $form->textField($model, 'kadastroviy_nomer', array('rows' => 4, 'cols' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'kadastroviy_nomer'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'archiv_number'); ?>
                                <?php echo $form->textField($model, 'archiv_number', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'archiv_number'); ?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_rayon'); ?>
                                <?php // echo $form->textField($model,'id_rayon',array('class'=>'form-control')); ?>
                                <?php echo $form->dropDownList($model, 'id_rayon', CHtml::listData(SprRayony::model()->findAll(), 'id', 'naimenovaniye'), array('empty' => 'Выбор района')); ?>

                                <?php echo $form->error($model, 'id_rayon'); ?>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'adress'); ?>
                                <?php echo $form->textArea($model, 'adress', array('rows' => 3, 'cols' => 10, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'adress'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'plochad_rabot'); ?>
                                <?php echo $form->textField($model, 'plochad_rabot', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'plochad_rabot'); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_avtor'); ?>
                                <?php // echo $form->textField($model,'id_avtor',array('class'=>'form-control')); ?>
                                <?php echo CHtml::activeDropDownList($model, 'id_avtor', CHtml::listData(User::model()->findAllByAttributes(array('id' => Yii::app()->user->id)), 'id', 'username')); ?>

                                <?php echo $form->error($model, 'id_avtor'); ?>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <?php //echo $form->labelEx($model, 'id_dogovor'); ?>
                                <?php echo $form->hiddenField($model, 'id_dogovor', array('class' => 'form-control', 'value' => $model->id_dogovor)); ?>
                                <?php //echo $form->error($model, 'id_dogovor'); ?>
                            </div>
                        </div>


                    </div>


                    <div class="row">

                        <div class="alert alert-info alert-dismissible"
                             style="padding:5px;" role="alert">
                            <strong>Дополнительные сведения </strong>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'nomer_dopsvedeniya'); ?>
                                <?php echo $form->textField($model, 'nomer_dopsvedeniya', array('class' => 'form-control', 'disabled' => 'true')); ?>
                                <?php echo $form->error($model, 'nomer_dopsvedeniya'); ?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'data_dopsvedeniya'); ?>
                                <?php echo $form->dateField($model, 'data_dopsvedeniya', array('class' => 'form-control', 'disabled' => 'true')); ?>
                                <?php echo $form->error($model, 'data_dopsvedeniya'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                        <?php echo CHtml::ajaxSubmitButton(
                            $model->isNewRecord ? 'Создать' : 'Сохранить', '',
                            /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                            array(
                                'dataType' => 'json',
                                'type' => 'post',

                                'success' => 'js:function(response){
                 if(response.status === "true"){

                  alert(response.status);
                  jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                    jQuery.fn.yiiGridView.update("object-grid");
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






                        <?php $this->endWidget(); ?>
                        <p class="note" id="notifier"></p>

                        <div class="alert alert-success alert-dismissible" role="alert" id="notifier_success"
                             style="display:none">
                        </div>

                        <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error"
                             style="display:none">
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


</div>


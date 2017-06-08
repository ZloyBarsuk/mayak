<?php
/* @var $this ContragentInfoController */
/* @var $model ContragentInfo */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contragent-info-form',
            // 'action' => '/contragentinfo/create',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'method' => 'POST',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),

        ));

        ?>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->hiddenField($model_contragent_info, 'id_contragent'); ?>

                <?php //echo $form->labelEx($model_contragent_info, 'id_contragent'); ?>
                <?php //echo $form->textField($model_contragent_info, 'id_contragent', array('class' => 'form-control')); ?>
                <?php // echo $form->error($model_contragent_info, 'id_contragent'); ?>
            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-md-12">

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'pasport'); ?>
                    <?php echo $form->textField($model_contragent_info, 'pasport', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'pasport'); ?>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'yur_address'); ?>
                    <?php echo $form->textArea($model_contragent_info, 'yur_address', array('rows' => 2, 'cols' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'yur_address'); ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'fiz_address'); ?>
                    <?php echo $form->textArea($model_contragent_info, 'fiz_address', array('rows' => 2, 'cols' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'fiz_address'); ?>
                </div>
            </div>


        </div>


        <div class="col-md-12">

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'director'); ?>
                    <?php echo $form->textField($model_contragent_info, 'director', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'director'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'doljnost'); ?>
                    <?php echo $form->textField($model_contragent_info, 'doljnost', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'doljnost'); ?>
                </div>
            </div>


        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'zamestitel'); ?>
                    <?php echo $form->textField($model_contragent_info, 'zamestitel', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'zamestitel'); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'osnovaniye_dogovora'); ?>
                    <?php echo $form->textField($model_contragent_info, 'osnovaniye_dogovora', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'osnovaniye_dogovora'); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'inn'); ?>
                    <?php echo $form->textField($model_contragent_info, 'inn', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'inn'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'kpp'); ?>
                    <?php echo $form->textField($model_contragent_info, 'kpp', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'kpp'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'okpo'); ?>
                    <?php echo $form->textField($model_contragent_info, 'okpo', array('size' => 11, 'maxlength' => 11, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'okpo'); ?>
                </div>
            </div>


        </div>


        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'ogrn'); ?>
                    <?php echo $form->textField($model_contragent_info, 'ogrn', array('size' => 13, 'maxlength' => 13, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'ogrn'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'ogrnip'); ?>
                    <?php echo $form->textField($model_contragent_info, 'ogrnip', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'ogrnip'); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'nds'); ?>
                    <?php // echo $form->textField($model_contragent_info, 'nds', array('class' => 'form-control')); ?>
                    <?php echo CHtml::activeDropDownList($model_contragent_info, 'nds', SprNdsInfo::model()->findAll(), array('empty' => 'Ставка НДС')); ?>

                    <?php echo $form->error($model_contragent_info, 'nds'); ?>
                </div>
            </div>

        </div>


        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'phone'); ?>
                    <?php echo $form->textField($model_contragent_info, 'phone', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'phone'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'fax'); ?>
                    <?php echo $form->textField($model_contragent_info, 'fax', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'fax'); ?>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'site'); ?>
                    <?php echo $form->textField($model_contragent_info, 'site', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'site'); ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model_contragent_info, 'email'); ?>
                <?php echo $form->textField($model_contragent_info, 'email', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model_contragent_info, 'email'); ?>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model_contragent_info, 'logo_path'); ?>
                <?php echo $form->textField($model_contragent_info, 'logo_path', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model_contragent_info, 'logo_path'); ?>
            </div>
        </div>

    </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'comments'); ?>
                    <?php echo $form->textArea($model_contragent_info, 'comments', array('rows' => 3, 'cols' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'comments'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model_contragent_info, 'data_from_csv_dla_pravki'); ?>
                    <?php echo $form->textArea($model_contragent_info, 'data_from_csv_dla_pravki', array('rows' => 3, 'cols' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model_contragent_info, 'data_from_csv_dla_pravki'); ?>
                </div>
            </div>

        </div>


        <?php


            echo CHtml::ajaxSubmitButton(
                $model_contragent_info->isNewRecord ? 'Создать' : 'Сохранить', '',
                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'success' => 'js:function(response){
                                                      if(response.status === "true"){
                                                      jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                                                      jQuery("body #Contragent_id").val(response.id); // номер договора
                                                    alert(response.id);
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

    <div class="alert alert-danger alert-dismissible" role="alert"
         id="notifier_error" style="display:none">
    </div>
</div><!-- form -->
<div class="row">

</div>
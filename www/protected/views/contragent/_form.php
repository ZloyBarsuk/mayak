<div class="row">
    <?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contragent-form',
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



    <div class="row">

        <div class="col-md-1">
            <div class="form-group">
                <?php //echo $form->labelEx($model_contragent, 'name'); ?>
                <?php echo $form->hiddenField($model_contragent, 'id'); ?>
                <?php //echo $form->error($model_contragent, 'name'); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <?php echo $form->labelEx($model_contragent, 'name'); ?>
                <?php echo $form->textField($model_contragent, 'name', array('size' => 250, 'maxlength' => 500, 'class' => 'form-control')); ?>
                <?php echo $form->error($model_contragent, 'name'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model_contragent, 'type'); ?>
                <?php // echo $form->textField($model_contragent, 'type', array('size' => 7, 'maxlength' => 7, 'class' => 'form-control')); ?>
                <?php echo CHtml::activeDropDownList($model_contragent, 'type', array('' => 'Выбери тип контрагента', 'юр.' => 'юридическое лицо', 'физ.' => 'физическое лицо')); ?>
                <?php echo $form->error($model_contragent, 'type'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?php //echo CHtml::submitButton($dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

        <?php
        echo $role;
        if($role!=="Kameralka") {
            echo CHtml::ajaxSubmitButton(
                $model_contragent->isNewRecord ? 'Создать' : 'Сохранить', '',
                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'success' => 'js:function(response){
                                                      if(response.status === "true"){
                                                      jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                                                      if(response.id)
                                                      {
                                                          jQuery("body #Contragent_id").val(response.id);
                                                         // jQuery("body #id_contragent").val(response.id);

                                                      }

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
        }
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
</div>









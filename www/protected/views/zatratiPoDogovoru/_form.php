<div class="row">
    <?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'zatrati-po-dogovoru-form',
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

        <div class="">
            <div class="form-group">
                <?php //echo $form->labelEx($model,'id_dogovor'); ?>
                <?php echo $form->hiddenField($model, 'id_dogovor'); ?>

                <?php //echo $form->textField($model,'id_dogovor',array('class'=>'form-control')); ?>
                <?php //echo $form->error($model,'id_dogovor'); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'id_objecta_po_dogovoru'); ?>
                    <?php // echo $form->textField($model,'id_objecta_po_dogovoru',array('class'=>'form-control')); ?>
                    <?php echo CHtml::activeDropDownList($model, 'id_objecta_po_dogovoru', CHtml::listData(ObjectRabot::model()->findAllByAttributes(array('id_dogovor' => $model->id_dogovor)), 'id', 'adress'), array('empty' => 'Выбор адреса работы')); ?>

                    <?php echo $form->error($model, 'id_objecta_po_dogovoru'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'zatrata'); ?>
                    <?php echo $form->textField($model,'zatrata',array('class'=>'form-control')); ?>
                    <?php // echo CHtml::activeDropDownList($model, 'id_zatrat', CHtml::listData(SprZatrat::model()->findAll(), 'id', 'naimenovaniye'), array('empty' => 'Выбор вида затраты')); ?>
                    <?php echo $form->error($model, 'zatrata'); ?>
                </div>
            </div>
        </div>


        <div class="">
            <div class="form-group">
                <?php //echo $form->labelEx($model,'id_author'); ?>
                <?php //echo $form->textField($model,'id_author',array('class'=>'form-control')); ?>
                <?php //echo $form->error($model,'id_author'); ?>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'summa'); ?>
                <?php echo $form->textField($model, 'summa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'summa'); ?>
            </div>
        </div>


        <div class="">
            <div class="form-group">
                <?php //echo $form->labelEx($model,'data'); ?>
                <?php //echo $form->textField($model,'data',array('class'=>'form-control')); ?>
                <?php //echo $form->error($model,'data'); ?>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'comment'); ?>
                <?php // echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                <?php echo $form->textArea($model, 'comment', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>


                <?php echo $form->error($model, 'comment'); ?>
            </div>
        </div>


    </div>


    <div class="form-group">
        <?php //echo CHtml::submitButton($dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

        <?php echo CHtml::ajaxSubmitButton(
            $model->isNewRecord ? 'Создать' : 'Сохранить', '',
            /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
            array(
                'dataType' => 'json',
                'type' => 'post',
                'success' => 'js:function(response){
 if(response.status === "true"){
                                                      jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);

                    jQuery.fn.yiiGridView.update("zatrati-grid");

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
</div>









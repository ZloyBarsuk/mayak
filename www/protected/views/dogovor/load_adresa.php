<?php


// Yii::app()->clientScript->scriptMap['jquery'] = false;
// Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

/*

 Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.bootbox.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.min.css'] = false;
Yii::app()->clientScript->scriptMap['bootstrap-responsive.min.css'] = false;
Yii::app()->clientScript->scriptMap['bootstrap-yii.css'] = false;
Yii::app()->clientScript->scriptMap['jquery-ui-bootstrap.css'] = false;

*/
?>
<?php
/*
$autocompleteConfig = array(
    'model' => Ispolnitel::model(), // модель
    'attribute' => 'name', // атрибут модели
    'htmlOptions' => array(
        'class' => '',
    ),
    //   'htmlOptions'=>array('class'=>'form-control'),
// "источник" данных для выборки
// может быть url, который возвращает JSON, массив
// или функция JS('js: alert("Hello!");')
    'source' => Yii::app()->createUrl('contragent/autocomplete'),
// параметры, подробнее можно посмотреть на сайте
// http://jqueryui.com/demos/autocomplete/
    'options' => array(
// минимальное кол-во символов, после которого начнется поиск
        'minLength' => '3',
        'showAnim' => 'fold',
// обработчик события, выбор пункта из списка
        'select' => 'js: function(event, ui) {
// действие по умолчанию, значение текстового поля
// устанавливается в значение выбранного пункта
this.value = ui.item.label;
// устанавливаем значения скрытого поля
$("#dogovor_id_firma").val(ui.item.id);
return false;
}',
    ),
    'htmlOptions' => array(
        'maxlength' => 50,
        'class' => 'form-control',
    ),
);*/
?>
<?php //Yii::app()->getClientScript()->registerCoreScript('add_dogovor'); ?>


<div class="wrapper wrapper-white">
    <div class="row">
        <div id="buttons_collection">
            <div class="col-md-12">


            </div>

        </div>
    </div>
    <div class="row">

        <div class="view">
            <div class="col-md-12">
                <div class="row">

                    <div class="tabs">

                        <div class="panel-body tab-content">

                            <div class="wrapper wrapper-white">
                                <img id="loading" src="loading.gif" style="display:none;"/>
                                <p id="message"></p>
                                <div id="result"></div>
                                <?php

                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'ispolnitel-form',
                                      'action' => '/dogovor/XlsImport',
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
                                    <table width="400" border="0">
                                        <tr>
                                            <td colspan="2"> Пример шаблона файла EXCEL.
                                                Внимание! Имя файла должно быть на английском,
                                                а расширение .XLSX (Пример: test.xlsx)</td>
                                            <td> <?php echo $form->hiddenField($dogovor_model, 'id', array('id' => 'dogovor_number')) ?></td>
                                            <td><input id="file_name" name="file_name" type="hidden" value=""></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><img src="/img/import_example.jpg"alt="Пример шаблона в Excel"></td>

                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php
                                                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                                                    array(
                                                        'id' => 'uploadFile',
                                                        'config' => array(
                                                            'action' => Yii::app()->createUrl('dogovor/upload'),
                                                            'allowedExtensions' => array("xls", "xlsx", "gif",  "mov", "mp4", "txt", "doc", "pdf", "xls", "3gp", "php", "ini", "avi", "rar", "zip", "png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                                            'sizeLimit' => 1000 * 1024 * 1024,// maximum file size in bytes
                                                            'minSizeLimit' => 1 * 1024,
                                                            'auto' => true,
                                                            'ispolnitel' => "js:function(id, fileName, responseJSON){


                                              var ispolnitel= jQuery('#dogovor_number').val();
                                              return ispolnitel;



                                             }",


                                                            'multiple' => false,
                                                            'onSubmit' => "js:function(id, fileName, responseJSON){


                                           //  var ispolnitel_id= jQuery('#Ispolnitel_id').val();

                                           //  this.ispolnitel=ispolnitel_id;
                                          //    alert(this.ispolnitel);
                                             }",


                                                            'onComplete' => "js:function(id, fileName, responseJSON){


                                            // alert(fileName);
                                              jQuery('#file_name').val(fileName);

                                             }",
                                                            'messages' => array(
                                                                'typeError' => "{file} has invalid extension. Only {extensions} are allowed.",
                                                                'sizeError' => "{file} is too large, maximum file size is {sizeLimit}.",
                                                                'minSizeError' => "{file} is too small, minimum file size is {minSizeLimit}.",
                                                                'emptyError' => "{file} is empty, please select files again without it.",
                                                                'onLeave' => "The files are being uploaded, if you leave now the upload will be cancelled."
                                                            ),
                                                            'showMessage' => "js:function(message){ alert(message.ffd);


                                             }"
                                                        )

                                                    ));
                                                ?>

                                            </td>
                                            <td colspan="2">
                                                <div class="form-group">
                                                    <?php echo $form->labelEx($object_model, 'id_rayon'); ?>
                                                    <?php // echo $form->textField($model,'id_rayon',array('class'=>'form-control')); ?>
                                                    <?php echo $form->dropDownList($object_model, 'id_rayon', CHtml::listData(SprRayony::model()->findAll(), 'id', 'naimenovaniye'), array('empty' => 'Выбор района')); ?>
                                                    <?php echo $form->error($object_model, 'id_rayon'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="form-group">
                                        <?php // echo CHtml::submitButton($dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                                        <?php echo CHtml::ajaxSubmitButton(
                                            'Импортировать', '/dogovor/XlsImport',
                                            // CHtml::normalizeUrl(array('', 'render' => true)),
                                            array(
                                                'dataType' => 'json',
                                                'type' => 'post',
                                                'beforeSend' => 'js:function(data){
                                               var rayon_id= $("#ObjectRabot_id_rayon").val();

                                                if(rayon_id.length==0)
                                                {
                                                alert("Необходимо выбрать район из списка");
                                                return false;

                                                }
                                                }',
                                                'success' => 'js:function(response){

                                                        $("#notifier_success").html(response.message).show("fast").hide(10000);
                                               //  alert(JSON.stringify(response));
                }',
                                                'error' => 'js:function(response){

                   //                             // alert(JSON.stringify(response));
                                                        $("#notifier_success").html(JSON.stringify(response)).show("fast").hide(10000);

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

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>




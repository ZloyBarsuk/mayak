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
<?php //Yii::app()->getClientScript()->registerCoreScript('add_dogovor');

// эй, братишка! я так обычно никогда не пишу!!! Это желание руководства )))))

echo "Договор № ".$dogovor_model->dogovor_number." |   Виды работ: ";
foreach($VidRabot_model as $key=>$value)
{
   echo  $VidRabot_model[$key]['naimenovaniye'].' ; ';
}



?>



<div class="wrapper wrapper-white">
    <div class="row">
        <div id="buttons_collection">
            <div class="col-md-12">
                <!--<div class="alert alert-danger alert-dismissible" role="alert" id="close_timer">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <strong>
                        До автоматического закрытия окна и разблокировки документа осталось:
                        <span class="counter counter-analog3" data-direction="down"
                              data-format="<?php /*echo(Yii::app()->params['document_timer'] ? Yii::app()->params['document_timer'] : "09:59") */?>"
                              data-stop="0:00"
                              data-interval="1000"><?php /*echo(Yii::app()->params['document_timer'] ? Yii::app()->params['document_timer'] : "09:59") */?></span>

                        <?php /* */?>
                        <?php /*Yii::app()->getClientScript()->registerCoreScript('timecounter'); */?>

                    </strong>
                </div>-->

               <!-- --><?php
/*
                Yii::app()->clientScript->registerScript('timer', "
                                                         jQuery('.counter').counter();
                                                       jQuery('.counter').on('counterStop', function() {
                                                       jQuery('#modal-body-dialog').empty();

                                                      jQuery('#edit_dogovor').modal('hide');
                                                       jQuery('#modal-dialog').modal('hide');
                                                     //  window.dogovor_unblocker();
                                                                    });
                                                                     ");
                */?>


                <p class="btn-toolbar btn-toolbar-demo">

                    <?php // echo CHtml::button('+ счет', array('class' => 'btn btn-success', 'id' => 'add_schet_', 'style' => ' display:block-inline;')); ?>

                    <?php // echo CHtml::button('+ адрес', array('class' => 'btn btn-success', 'id' => 'add_address', 'style' => ' display:block-inline;')); ?>

                    <?php //echo CHtml::button('+ вид работ', array('class' => 'btn btn-success', 'id' => 'add_vid_rabot', 'style' => ' display:block-inline;')); ?>

                    <?php // echo CHtml::button('+ этап работ', array('class' => 'btn btn-success', 'id' => 'add_etap_rabot', 'style' => ' display:block-inline;')); ?>

                    <?php // echo CHtml::button('+ доп. соглашение', array('class' => 'btn btn-success', 'id' => 'add_soglasheniye', 'style' => ' display:block-inline;')); ?>

                    <?php //echo CHtml::button('+ акт', array('class' => 'btn btn-success', 'id' => 'add_act', 'style' => ' display:block-inline;')); ?>

                </p>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="view">
            <div class="col-md-12">
                <div class="row">

                    <div class="tabs">
                        <ul class="nav nav-tabs nav-tabs-arrowed" role="tablist">

                            <li class="active"><a href="#dogovor" role="tab" data-toggle="tab">Договор</a></li>
                            <li><a href="#objectrabot" role="tab" data-toggle="tab">Адреса</a></li>
                            <li><a href="#vidrabotpodogovoru" role="tab" data-toggle="tab">Вид работ</a></li>
                            <li><a href="#schet" role="tab" data-toggle="tab">Счета</a></li>
                            <li><a href="#dopsoglasheniye" role="tab" data-toggle="tab">Доп. соглашения</a></li>
                            <li><a href="#zatratipodogovoru" role="tab" data-toggle="tab">Затраты</a></li>
                            <li><a href="#universaldocument" role="tab" data-toggle="tab">Печать</a></li>
                            <li><a href="#dogovorhistory" role="tab" data-toggle="tab">История</a></li>

                        </ul>
                        <div class="panel-body tab-content">
                            <div class="tab-pane active" id="dogovor">
                                <div class="wrapper wrapper-white">

                                    <?php $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'dogovor-form',

                                        'enableAjaxValidation' => true,
                                        'enableClientValidation' => true,
                                        'method' => 'POST',
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                            'validateOnChange' => true,
                                        ),
                                    )); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <div class="alert alert-info alert-dismissible"
                                                             style="padding:5px;" role="alert">
                                                            <?php
                                                            Yii::app()->clientScript->registerScript('dog_id_global', "window.DogovorGlodalID='" . $dogovor_model->id . "';");
                                                            ?>
                                                            <strong>Номера договора и статус</strong>
                                                            <?php echo $form->hiddenField($dogovor_model, 'id', array('id' => 'dogovor_number', 'name' => '')); ?>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <?php echo $form->labelEx($dogovor_model, 'dogovor_number'); ?>
                                                                <?php echo $form->textField($dogovor_model, 'dogovor_number', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($dogovor_model, 'dogovor_number'); ?>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <?php echo $form->labelEx($dogovor_model, 'dogovor_number_old'); ?>
                                                                <?php echo $form->textField($dogovor_model, 'dogovor_number_old', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                                                <?php echo $form->error($dogovor_model, 'dogovor_number_old'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <?php echo $form->labelEx($dogovor_model, 'status'); ?>
                                                                <?php // echo $form->textField($dogovor_model, 'status', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
                                                                <?php echo CHtml::activeDropDownList($dogovor_model, 'status', array(
                                                                    'в работе' => 'в работе',
                                                                    'на подписании' => 'на подписании',
                                                                    'не заключили' => 'не заключили',
                                                                    'расторгнут' => 'расторгнут',
                                                                    'закрыт' => 'закрыт',
                                                                    'приостановлен' => 'приостановлен',
                                                                    'не оплачен' => 'не оплачен',
                                                                    'оплачен' => 'оплачен', )
                                                                    , array('empty' => 'Укажите статус')); ?>


                                                                <?php echo $form->error($dogovor_model, 'status'); ?>
                                                            </div>
                                                        </div>

                                                        <!--<div class="row">
                                                            <div class="col-md-12">-->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo $form->labelEx($dogovor_model, 'id_template'); ?>
                                                                        <?php echo $form->dropDownList($dogovor_model, 'id_template', CHtml::listData(DocumentTemplates::model()->findAllByAttributes(array('type'=>'dogovor')), 'id', 'title'), array('empty' => 'Выбери шаблон договора')); ?>
                                                                        <?php echo $form->error($dogovor_model, 'id_template'); ?>

                                                                    </div>
                                                                </div>
                                                           <!-- </div>
                                                        </div>-->

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-info alert-dismissible"
                                                                 style="padding:5px;" role="alert">
                                                                <strong>Даты и сроки исполнения</strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'created_date'); ?>
                                                                    <?php echo $form->dateField($dogovor_model, 'created_date', array('class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'created_date'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'podpisan_date'); ?>
                                                                    <?php echo $form->dateField($dogovor_model, 'podpisan_date', array('class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'podpisan_date'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'closed_date'); ?>
                                                                    <?php echo $form->dateField($dogovor_model, 'closed_date', array('class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'closed_date'); ?>
                                                                </div>
                                                            </div>


                                                           <!-- <div class="row">
                                                                <div class="col-md-12">-->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <?php echo $form->labelEx($dogovor_model, 'srok_dni'); ?>
                                                                            <?php echo $form->textField($dogovor_model, 'srok_dni', array('class' => 'form-control')); ?>
                                                                            <?php echo $form->error($dogovor_model, 'srok_dni'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <?php echo $form->labelEx($dogovor_model, 'tip_dney'); ?>
                                                                            <?php // echo $form->textField($dogovor_model, 'tip_dney', array('class' => 'form-control')); ?>
                                                                            <?php echo CHtml::activeDropDownList($dogovor_model, 'tip_dney', Dogovor::enum_days(), array('empty' => 'Выбери тип')); ?>
                                                                            <?php echo $form->error($dogovor_model, 'tip_dney'); ?>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <?php echo $form->labelEx($dogovor_model, 'srok_ispolneniya'); ?>
                                                                            <?php echo $form->dateField($dogovor_model, 'srok_ispolneniya', array('class' => 'form-control')); ?>
                                                                            <?php echo $form->error($dogovor_model, 'srok_ispolneniya'); ?>
                                                                        </div>
                                                                    </div>


                                                                <!--</div>
                                                            </div>-->

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <?php
                                                        $contragent_name=Contragent::model()->findByPk($dogovor_model->id_contragent);
                                                        $contragent_name=$contragent_name->name;
                                                        $autocompleteConfig = array(
                                                            'model' => new Contragent, // модель
                                                            'cssFile' => false,
                                                            'attribute' => 'id', // атрибут модели

                                                            // "источник" данных для выборки
                                                            // может быть url, который возвращает JSON, массив
                                                            // или функция JS('js: alert("Hello!");')
                                                            'source' => Yii::app()->createUrl('Contragent/Autocomplete'),
                                                            // параметры, подробнее можно посмотреть на сайте
                                                            // http://jqueryui.com/demos/autocomplete/
                                                            'options' => array(
                                                                // минимальное кол-во символов, после которого начнется поиск
                                                                'minLength' => '2',
                                                                'showAnim' => 'fold',
                                                                // обработчик события, выбор пункта из списка
                                                                'select' => 'js: function(event, ui) {
                                                                                          //  alert(JSON.stringify(ui));
                                                                                          // действие по умолчанию, значение текстового поля
                                                                                          // устанавливается в значение выбранного пункта
                                                                                             this.value = ui.item.value;
                                                                                          // устанавливаем значения скрытого поля
                                                                                         $("#Dogovor_id_contragent").val(ui.item.id);
                                                                                         var contragent_id=ui.item.id;
                                                                                        $.ajax({
                                                                                        url: "/bank/bankbycontragentid",
                                                                                        type: "POST",
                                                                                        cache: false,
                                                                                           data: {
                                                                                                    contragent_id: contragent_id,
                                                                                                                                  },
                                                                                            success: function (response) {
                                                                                                    //  alert(response);
                                                                                          $("#Dogovor_id_bank_contragenta").empty();
                                                                                          $("#Dogovor_id_bank_contragenta").append(response);
                                                                                                                          },
                                                                                          // update:"#Dogovor_id_bank_contragenta",
                                                                                          error: function (xhr, ajaxOptions, thrownError) {
                                                                                         //  error(xhr);
                                                                                         alert(xhr.status);
                                                                                           alert(thrownError);
                                                                           }
                                                              })
                                                                                        // $("#Dogovor_id_bank_contragenta").val(ui.item.id);
                                                                                      return false;
                                                                                     }',


                                                            ),
                                                            'htmlOptions' => array('class' => 'form-control',
                                                                'maxlength' => 50,'value'=>$contragent_name
                                                            ),

                                                        );
                                                        ?>

                                                        <div class="col-md-12">

                                                            <div class="col-md-5">
                                                                <div class="alert alert-info alert-dismissible"
                                                                     style="padding:5px;" role="alert">
                                                                    <strong>Заказчик   </strong>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?php // echo $form->labelEx($dogovor_model, 'id_contragent'); ?>
                                                                    <?php // echo $form->textField($dogovor_model,'id_contragent',array('value'=>Contragent::model()->findByPk($dogovor_model->id_contragent)->name,'disabled'=>true,'class' => 'form-control')); ?>
                                                                    <?php // echo $form->dropDownList($dogovor_model, 'id_contragent', CHtml::listData(Contragent::model()->findAll(), 'id', 'name'), array('empty' => 'Выбери контрагента')); ?>
                                                                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', $autocompleteConfig); ?>
                                                                    <?php echo $form->hiddenField($dogovor_model, 'id_contragent', array('style' => 'display: none;')); ?>


                                                                    <?php // echo $form->textField($dogovor_model, 'id_contragent', array('class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'id_contragent'); ?>
                                                                </div>
                                                            </div>
                                                           <!-- <div class="row">
                                                                <div class="col-md-12">-->

                                                                    <div class="col-md-5">
                                                                        <div class="alert alert-info alert-dismissible"
                                                                             style="padding:5px;" role="alert">
                                                                            <strong>Банк </strong>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <?php // echo $form->labelEx($dogovor_model, 'id_bank_contragenta'); ?>
                                                                            <?php // echo $form->textField($dogovor_model,'id_contragent',array('value'=>Contragent::model()->findByPk($dogovor_model->id_contragent)->name,'disabled'=>true,'class' => 'form-control')); ?>
                                                                            <?php
                                                                            echo $form->dropDownList($dogovor_model, 'id_bank_contragenta', CHtml::listData(Bank::model()->findAllByAttributes(array('id_contragenta' => $dogovor_model->id_contragent)), 'id', 'name'), array('empty' => 'Выбери банк контрагента')); ?>

                                                                            <?php // echo $form->textField($dogovor_model, 'id_contragent', array('class' => 'form-control')); ?>
                                                                            <?php echo $form->error($dogovor_model, 'id_contragent'); ?>
                                                                        </div>
                                                                    </div>
                                                               <!-- </div>
                                                            </div>-->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="alert alert-info alert-dismissible"
                                                                         style="padding:5px;" role="alert">
                                                                        <strong>Исполнитель работ </strong>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <?php // echo $form->labelEx($dogovor_model, 'id_ispolnitel'); ?>
                                                                            <?php // echo $form->textField($dogovor_model,'id_contragent',array('value'=>Contragent::model()->findByPk($dogovor_model->id_contragent)->name,'disabled'=>true,'class' => 'form-control')); ?>
                                                                            <?php echo $form->dropDownList($dogovor_model, 'id_ispolnitel', CHtml::listData(Ispolnitel::model()->findAll(array("condition"=>"active = 1","order"=>"id")), 'id', 'name'), array('empty' => 'Выбор исполнителя')); ?>


                                                                            <?php // echo $form->textField($dogovor_model, 'id_contragent', array('class' => 'form-control')); ?>
                                                                            <?php echo $form->error($dogovor_model, 'id_contragent'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">


                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <?php if(Yii::app()->getModule('user')->getRole()!=="Kameralka"): ?>

                                                        <div class="col-md-12">
                                                            <div class="alert alert-info alert-dismissible"
                                                                 style="padding:5px;" role="alert">
                                                                <strong>Суммы и начисления </strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'summa_dogovora_nachalnaya'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'summa_dogovora_nachalnaya', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'summa_dogovora_nachalnaya'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'summa_avansa'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'summa_avansa', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'summa_avansa'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'avans_procent'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'avans_procent', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'avans_procent'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'nds'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'nds'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'summa_nds'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'summa_nds', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'summa_nds'); ?>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'otkat'); ?>
                                                                    <?php echo $form->textField($dogovor_model, 'otkat', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'otkat'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--<div class="alert alert-info alert-dismissible"
                                                                 style="padding:5px;" role="alert">
                                                                <strong>Дополнительная информация </strong>

                                                            </div>-->
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?php echo $form->labelEx($dogovor_model, 'primechaniye'); ?>
                                                                    <?php echo $form->textArea($dogovor_model, 'primechaniye', array('rows' => 3, 'cols' => 10, 'class' => 'form-control')); ?>
                                                                    <?php echo $form->error($dogovor_model, 'primechaniye'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php // echo CHtml::submitButton($dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                                            <?php
                                            if(Yii::app()->getModule('user')->getRole()!=="Kameralka")
                                            {
                                                echo CHtml::ajaxSubmitButton(
                                                    $dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', '',
                                                    /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                                                    array(
                                                        'dataType' => 'json',
                                                        'type' => 'post',
                                                        'success' => 'js:function(response){

                    if(response.status === "true"){

                    jQuery("#notifier_success").html(response.message).show("fast").hide(10000);

                   // jQuery.fn.yiiGridView.update("vid-rabot-po-dogovoru-form_");

  // jQuery("body #dogovor_number_new").val(response.dogovor_number_new);
  //  jQuery("body #dogovor_number").val(response.dogovor_id); // id договора
  //  window.DogovorGlodalID=response.dogovor_id;


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

                                </div>
                            </div>

                            <div class="tab-pane" id="objectrabot">
                            </div>

                            <div class="tab-pane" id="vidrabotpodogovoru">
                            </div>


                            <div class="tab-pane" id="schet">
                            </div>

                            <div class="tab-pane" id="dopsoglasheniye">
                            </div>

                            <div class="tab-pane" id="zatratipodogovoru">
                            </div>
                            <div class="tab-pane" id="universaldocument">
                                <?php Yii::app()->getClientScript()->registerCoreScript('print_act'); ?>
                                <?php Yii::app()->getClientScript()->registerCoreScript('print_dogovor'); ?>

                                <?php echo CHtml::button('Печать акта по договору', array('class' => 'btn btn-success', 'id' => 'print_act_by_dogovor', 'style' => ' display:block-inline;')); ?>
                                <?php echo CHtml::button('Печать договора', array('class' => 'btn btn-success', 'id' => 'print_dogovor', 'style' => ' display:block-inline;')); ?>


                                <div class="wrapper wrapper-white">
                                    <div class="page-subtitle">

                                        <?php $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'etap-rabot-po-objectu-form',
                                            'enableAjaxValidation' => true,
                                            'enableClientValidation' => true,
                                            'method' => 'POST',
                                            'clientOptions' => array(
                                                'validateOnSubmit' => true,
                                                'validateOnChange' => true,
                                            ),
                                        )); ?>



                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <div class="row">


                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php // echo $form->textField($model, 'status', array('size' => 24, 'maxlength' => 24, 'class' => 'form-control')); ?>
                                                                <?php // echo $form->textField($model, 'status', array('size' => 24, 'maxlength' => 24, 'class' => 'form-control')); ?>
                                                                <?php echo CHtml::dropDownList('stamp_parameter', '',
                                                                    array(
                                                                        '0' => 'Не подписывать документ',
                                                                        '1' => 'Подписывать документ',


                                                                    ), array('class' => 'form-control')); ?>

                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">


                                    </div>

                                    <?php $this->endWidget(); ?>

                                    <p class="note" id="notifier"></p>

                                    <div class="alert alert-success alert-dismissible" role="alert"
                                         id="notifier_success" style="display:none">
                                    </div>

                                    <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error"
                                         style="display:none">
                                    </div>

                                </div>
                                <!-- form -->
                                <div class="row">

                                </div>

                            </div>
                            <div class="tab-pane" id="dogovorhistory">


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>




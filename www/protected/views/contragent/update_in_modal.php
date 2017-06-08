<?php Yii::app()->getClientScript()->registerCoreScript('update_bank'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('new_bank'); ?>


<div class="">

    <div class="view">
        <div class="col-md-10">
            <div class="row">

                <div class="tabs">
                    <ul class="nav nav-tabs nav-tabs-arrowed" role="tablist">

                        <li class="active"><a href="#contragent" role="tab"
                                              data-toggle="tab">Контрагент</a>
                        </li>
                        <li><a href="#contragentinfo" role="tab" data-toggle="tab">Данные контрагента</a></li>
                        <li><a href="#bank" role="tab" data-toggle="tab">Банки</a></li>


                    </ul>
                    <div class="panel-body tab-content">
                        <div class="tab-pane active" id="contragent">


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

                                    <?php echo CHtml::ajaxSubmitButton(
                                        $model_contragent->isNewRecord ? 'Создать' : 'Сохранить', '',
                                        /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                                        array(
                                            'dataType' => 'json',
                                            'type' => 'post',
                                            'success' => 'js:function(response){
                                                      if(response.status === "true"){
                                                      jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);

                                                      alert(response.id_contragent);
                                                          jQuery("body #Contragent_id").val(response.id_contragent);
                                                          jQuery("body #ContragentInfo_id_contragent").val(response.id_contragent);
                                                          jQuery("body #Bank_id_contragenta").val(response.id_contragent);
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


                        </div>
                        <div class="tab-pane" id="contragentinfo">

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
                                            <?php echo CHtml::activeDropDownList($model_contragent_info, 'nds', CHtml::listData(SprNdsInfo::model()->findAll(), 'id', 'stavka_nds'), array('empty' => 'Ставка НДС')); ?>


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


                                    <div class="form-group">
                                        <?php //echo CHtml::submitButton($dogovor_model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>

                                        <?php

                                            echo CHtml::ajaxSubmitButton(
                                                $model_contragent->isNewRecord ? 'Создать' : 'Сохранить', '',
                                                /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                                                array(
                                                    'dataType' => 'json',
                                                    'type' => 'post',
                                                    // 'data'=>'',
                                                    'success' => 'js:function(response){
                                                      if(response.status === "true"){
                                                      jQuery("body #notifier_success_contragent_info").html(response.message).show("fast").hide(10000);
                                                     // jQuery("body #Contragent_id").val(response.id);


                                                      }
                                                      else{
                                                       var error_list="";
                                                       jQuery.each(response.message, function(i, val) {
                                                       error_list=error_list+val+"\r\n";
                                                       });
                                                    jQuery("body #notifier_error_contragent_info").html(error_list).show("slow").hide(10000);
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
                                         id="notifier_success_contragent_info" style="display:none">
                                    </div>

                                    <div class="alert alert-danger alert-dismissible" role="alert"
                                         id="notifier_error_contragent_info" style="display:none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="bank">
                            <?php echo CHtml::button('+ банк', array('class' => 'btn btn-success', 'id' => 'new_bank', 'style' => ' display:block-inline;')); ?>
                            <p></p>
                            <?php



                            ?>
                            <div class="tab-pane" id="bank_list">

                                <div class="wrapper wrapper-white">
                                    <div class="row">
                                        <?php

                                        $this->widget('zii.widgets.grid.CGridView', array(
                                            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                                            'id' => 'bank-grid', //.rand(1500, 99999999),
                                            'ajaxType' => 'POST',
                                            'selectableRows' => 1,
                                            'ajaxUpdate' => true,
                                            'nullDisplay' => '',
                                            'enablePagination' => true,
                                            'htmlOptions' => array('class' => 'pagination'),
                                            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
                                            'dataProvider' => $model_bank,
                                            // 'filter' => $dataProvider_object,
                                            'emptyText' => 'нет данных',
                                            'enableSorting' => false,
                                            // 'rowCssClassExpression' => '"myclass_{$data->id}"',
                                            'rowHtmlOptionsExpression' => 'array("id" => $data["id"])',
                                            'pager' => array(
                                                'pageSize' => 5,
                                                'header' => '',
                                                'prevPageLabel' => '&laquo; назад',
                                                'nextPageLabel' => 'далее &raquo;',
                                                'maxButtonCount' => 10,
                                                'htmlOptions' => array('class' => 'pagination'),
                                                'selectedPageCssClass' => 'paginate_button current',
                                                'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',
                                            ),
                                            'columns' => array(

                                                'id',
                                                array(
                                                    'name' => 'Наименование банка',
                                                    'value' => '$data["name"]',
                                                ),


                                                array(
                                                    'name' => 'Начало',
                                                    'value' => '$data["record_date"]?date("d-m-Y", strtotime($data["record_date"])):"нет даты"',
                                                ),


                                                array(
                                                    'class' => 'CButtonColumn',
                                                    //'htmlOptions' => array('width' => '100px;'),
                                                    'template' => '{update_bank}{delete_bank}',

                                                    'header' => 'Управление',
                                                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                                                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                                                    'updateButtonOptions' => array("class" => 'update'),
                                                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                                                    'buttons' => array
                                                    (

                                                        'delete_bank' => array(
                                                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                                                            'options' => array('class' => 'delete_bank'),
                                                            'url' => 'CController::createUrl("/bank/delete", array("id"=>$data["id"]))',
                                                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                                                        ),


                                                        'update_bank' => array
                                                        (
                                                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                                                            'options' => array('class' => 'update_bank'),
                                                            'url' => 'CController::createUrl("/bank/update", array("id"=>$data["id"]))',
                                                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',
                                                            /* 'click' => 'js:function(evt){
                                                             jQuery.noConflict();
                                                             evt.preventDefault();
                                                            var row_ids= jQuery(this).closest("tr").attr("id");


                                                            var url = jQuery(this).attr("href");
                                                            alert(url);


                                                             jQuery.get(url, function(r){
                                                             jQuery("#modal-body-dialog").empty().html(r);
                                                             jQuery("#modal-dialog").css("z-index", "22002");
                                                             jQuery("#modal-dialog").css("height", "auto");
                                                             jQuery("#modal-body-dialog").css("overflow-y", "auto");
                                                             jQuery("#modal-dialog").css("max-height", "100%");
                                                             jQuery("#modal-dialog").css("width", "auto");
                                                             jQuery.noConflict();
                                                              jQuery("#modal-dialog").modal("show");
                                                             return false;
                                                             });




                                                             // testisng ajax

                                                             var dog_number=jQuery("#dogovor_number").val();
                                                             jQuery.ajax({
                                   type: "POST",
                                   url: "/vidrabotpodogovoru/update/",
                                   data: { item_id:row_ids},
                                   success: function (response) {
                                 jQuery("#modal-body-dialog").empty().html(response);
                                 jQuery("#modal-dialog").css("z-index", "22000");
                                 jQuery("#modal-dialog").css("height", "auto");
                                 jQuery("#modal-dialog").css("max-height", "100%");
                                 jQuery("#modal-dialog").css("width", "auto");
                                 jQuery.noConflict();
                                   jQuery("#modal-dialog").modal("show");
                                                 },
                                                 error: function (xhr, ajaxOptions, thrownError) {
                                                     alert(xhr.status);

                                                 }

                                 });

                                 }
                                  ',*/


                                                        ),

                                                        // 'remove'=>array('url'=>'Yii::app()->createUrl("/vidrabotpodogovoru/delete", array("id_application"=>$data->id,"id_resolution"=>$data->id))','label'=>'Remove application from resolution.','imageUrl'=>Yii::app()->request->baseUrl.'/img/delete_modal.png','options'=>array('class'=>'delete','id_resolution'=>$data->id)),

                                                    ),
                                                ),

                                            ),
                                        ));

                                        ?>
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

<?php

Yii::app()->clientScript->registerScript('reset_form', "
    jQuery('body').on('click', '#reset_bank', function () {
$(':input','#bank-form').not('#Bank_id_contragenta').val('').removeAttr('checked').removeAttr('selected');

       /*

       $(':input', form).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            else if (tag == 'select')
                this.selectedIndex = -1;
        });

        */

  });
     ");

?>
</div>

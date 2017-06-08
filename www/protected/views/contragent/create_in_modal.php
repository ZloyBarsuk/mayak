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

                                        <?php echo CHtml::ajaxSubmitButton(
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
                                                       error_list=error_list+val+"\n";
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
                            <?php echo CHtml::button('+ банк', array('class' => 'btn btn-success', 'id' => 'reset_bank', 'style' => ' display:block-inline;')); ?>
                            <p></p>
                            <?php

                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'bank-form',
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
                            <div class="tab-pane" id="bank_list">

                                <div class="wrapper wrapper-white">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php echo $form->hiddenField($model_bank, 'id_contragenta'); ?>

                                                <?php echo $form->labelEx($model_bank, 'name'); ?>
                                                <?php echo $form->textField($model_bank, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank, 'name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="">
                                            <div class="form-group">
                                                <?php echo $form->hiddenField($model_bank_info, 'id_bank'); ?>
                                                <?php // echo $form->textField($model_bank_info, 'id_bank', array('class' => 'form-control')); ?>
                                                <?php // echo $form->error($model_bank_info, 'id_bank'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'inn'); ?>
                                                <?php echo $form->textField($model_bank_info, 'inn', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'inn'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php // echo $form->labelEx($model_bank_info, 'id_author'); ?>
                                                <?php // echo $form->textField($model_bank_info, 'id_author', array('class' => 'form-control')); ?>
                                                <?php // echo $form->error($model_bank_info, 'id_author'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'kpp'); ?>
                                                <?php echo $form->textField($model_bank_info, 'kpp', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'kpp'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'yur_address'); ?>
                                                <?php echo $form->textField($model_bank_info, 'yur_address', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'yur_address'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'fiz_address'); ?>
                                                <?php echo $form->textField($model_bank_info, 'fiz_address', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'fiz_address'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'ogrm'); ?>
                                                <?php echo $form->textField($model_bank_info, 'ogrm', array('size' => 13, 'maxlength' => 13, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'ogrm'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'r_s'); ?>
                                                <?php echo $form->textField($model_bank_info, 'r_s', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'r_s'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'k_s'); ?>
                                                <?php echo $form->textField($model_bank_info, 'k_s', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'k_s'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'bic'); ?>
                                                <?php echo $form->textField($model_bank_info, 'bic', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'bic'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'swift'); ?>
                                                <?php echo $form->textField($model_bank_info, 'swift', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model_bank_info, 'swift'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model_bank_info, 'account_type'); ?>
                                                <?php // echo $form->textField($model_bank_info, 'account_type', array('size' => 3, 'maxlength' => 3, 'class' => 'form-control')); ?>
                                                <?php echo CHtml::activeDropDownList($model_bank_info, 'account_type', array('rub' => 'рубль', 'eur' => 'евро', 'usd' => 'доллар')); ?>

                                                <?php echo $form->error($model_bank_info, 'account_type'); ?>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php // echo $form->labelEx($model_bank_info, 'record_date'); ?>
                                                <?php // echo $form->textField($model_bank_info, 'record_date', array('class' => 'form-control')); ?>
                                                <?php // echo $form->error($model_bank_info, 'record_date'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php

                                                echo CHtml::ajaxSubmitButton(
                                                    $model_bank_info->isNewRecord ? 'Создать' : 'Сохранить', '',
                                                    /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
                                                    array(
                                                        'dataType' => 'json',
                                                        'type' => 'post',
                                                        'success' => 'js:function(response){

                    if(response.status === "true"){

                    jQuery("body #notifier_success_bank").html(response.message).show("fast").hide(10000);

                   // jQuery.fn.yiiGridView.update("vid-rabot-po-dogovoru-form_");


                    }
                    else{

                    var error_list="";
                    jQuery.each(response.message, function(i, val) {

                     error_list=error_list+val+"\r\n";

                      });

                   jQuery("body #notifier_error_bank").html(error_list).show("slow").hide(10000);

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
                                             id="notifier_success_bank" style="display:none">
                                        </div>

                                        <div class="alert alert-danger alert-dismissible" role="alert"
                                             id="notifier_error_bank" style="display:none">
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

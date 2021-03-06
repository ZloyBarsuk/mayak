<?php
/* @var $this ObjectRabotController */
/* @var $model ObjectRabot */
/* @var $form CActiveForm */
?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <?php //Yii::app()->clientScript->scriptMap = array('jquery.yiigridview.js'=> false,); ?>




        <?php // Yii::app()->clientScript->scriptMap = array('jquery.js' => false,'jquery.min.js'=> false,); ?>

        <?php // Yii::app()->clientScript->scriptMap["*.js"] = false; ?>

        <?php echo CHtml::beginForm(CHtml::normalizeUrl('universaldocument/printdopsvedeniya'), 'post', array('style' => 'padding:0 2%;')); ?>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <?php //echo $form->errorSummary($model, '', '', array('class' => '')); ?>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">

                    <div class="row">

                    </div>

                    <div class="row">
                        <div>
                            <div class="form-group">

                                <?php echo CHtml::hiddenField('object_rabot_id', $id_object, array()); ?>
                            </div>
                        </div>

                        <div class="alert alert-info alert-dismissible"
                             style="padding:5px;" role="alert">
                            <strong>Выбор списка работ</strong>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo CHtml::label('Выбор списка работ', ''); ?>
                                <?php // echo $form->textField($model,'id_avtor',array('class'=>'form-control')); ?>
                                <?php echo CHtml::dropDownList('tip_rabot', 'Выбор списка работ', array(
                                    '1' => 'Образование земельного участка путем объединения земельных участков',
                                    '2' => 'Образование земельных участков путем раздела земельного участка',
                                    '3' => 'Образование  земельных участков путем перераспределения земельных участков',
                                    '4' => 'Образование  земельных участков путем перераспределения земельных участков, находящихся в государственной собственности',
                                    '5' => 'Образование земельного участка путем выдела',
                                    '6' => 'Образование земельного участка из земель, находящихся в государственной собственности',
                                    '7' => 'Образование части земельного участка',
                                    '8' => 'Уточнение местоположения границ и (или) площади земельного участка',
                                    '9' => 'Установление на местности поворотных точек границ земельного участка',
                                )); ?>


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo CHtml::label('Кому ?', ''); ?>
                                <?php // echo $form->textField($model,'id_avtor',array('class'=>'form-control')); ?>
                                <?php echo CHtml::dropDownList('glava_rayona', 'ro', array(
                                    'ro' => 'Районный Отдел',
                                    'yz' => 'Управления Землеустройства',

                                )); ?>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>
     <div class="alert alert-info alert-dismissible" role="alert" id="notifier" hidden="hidden">
        <strong></strong>
    </div>
    <div class="form-group">
        <?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
        <?php echo CHtml::ajaxSubmitButton('Печать', '',
            /*  CHtml::normalizeUrl(array('objectrabot/create','render'=>true)) ,*/
            array(
                'dataType' => 'json',
                'type' => 'post',
                'success' => 'js:function(response){
                 if(response.status === "true"){
                  jQuery("body #notifier_success").html(response.message).show("fast").hide(10000);
                  //  jQuery.fn.yiiGridView.update("object-grid");
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
                'id' => 'print_dopsvedeniya', //. rand(1, 50000),// рандомный айди для удаления дублей при аджаксе, костыль
                // 'id' => 'form_submit_' . new Date() . getTime(),// чтобы точно было уникальное айди кнопки сабмит-+++
                'class' => 'btn btn-primary',
            ));

        ?>
    </div>

    <?php echo CHtml::endForm(); ?>
    <p class="note" id="notifier"></p>
    <div class="alert alert-success alert-dismissible" role="alert" id="notifier_success" style="display:none">
    </div>
    <div class="alert alert-danger alert-dismissible" role="alert" id="notifier_error" style="display:none">
    </div>

</div>
</div><!-- form -->
<div class="row">

</div>
<?php // Yii::app()->clientScript->scriptMap = array('jquery.ba-bbq.js'=> false); ?>

<?php Yii::app()->getClientScript()->registerCoreScript('reports'); ?>

<!-- Обновление договора начало -->
<div class="modal" id="reports">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>-->
                <h4 class="modal-title-reports" id="modal-title-reports">Отчеты и статистика

                </h4>

            </div>

            <div class="container">
            </div>
            <div class="modal-body-reports" id="modal-body-reports">
            </div>
            <!-- <a data-toggle="modal" href="#add_schet" class="btn btn-primary">Launch modal</a>-->
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn" data-target="#reports">Закрыть</a>
            </div>
            <?php
            /*
                        Yii::app()->clientScript->registerScript('unblock', "
                       var unblocker= function unblock_dogovor() {
                         var dog_numb = window.DogovorGlodalID;
                            jQuery.ajax({
                                    type : 'POST',
                                    data:{ id_dogovor_block: dog_numb},
                                    url:'/dogovor/unblock',
                                    dataType : 'json',
                                     success: function (data) {
                                                    setTimeout(function () {
                                                                }, 3000)

                       },
                           error: function (xhr, ajaxOptions, thrownError) {
                                error(xhr . status);
                                error(thrownError);
                            }
                             });
                    }
                                   window.dogovor_unblocker=unblocker;
                        ");*/
            ?>
        </div>
    </div>
</div>


<?php
$this->breadcrumbs = array(
    'Отчеты' => array('admin'),
    'Управление',
);
$this->menu = array(
    array('label' => 'Управление', 'url' => array('admin')),
);

?>
<div class="col-md-12">
    <h1>Отчет по договору</h1>
</div>


<div class="wrapper wrapper-white">
    <div class="row row-wider">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="view">
                            <div class="col-md-12">
                                <div class="tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-OborotDogovors" role="tab" data-toggle="tab"
                                                              aria-expanded="true">Отчет</a></li>
                                        <li class=""><a href="#tab-OborotContragents" role="tab" data-toggle="tab"
                                                        aria-expanded="false">Статистика (в разработке)</a></li>

                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-OborotDogovors">
                                            <div class="wrapper wrapper-white">
                                                <div class="page-subtitle">
                                                    <?php $form = $this->beginWidget('CActiveForm', array(
                                                        'id' => 'oborot-dogovor-form',
                                                        'enableAjaxValidation' => true,
                                                        'enableClientValidation' => true,
                                                        'method' => 'POST',
                                                        'clientOptions' => array(
                                                            'validateOnSubmit' => true,
                                                            'validateOnChange' => true,
                                                        ),
                                                    )); ?>


                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <?php // echo $form->errorSummary($model, '', '', array('class' => '')); ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <!--<div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php /*echo $form->labelEx($model, 'period'); */?>
                                                                            <?php /*echo CHtml::activeDropDownList($model, 'period', $model->period, array('class' => 'form-control')); */?>
                                                                            <?php /*echo $form->error($model, 'period'); */?>
                                                                        </div>
                                                                    </div>-->


                                                                  <!--  <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php /*echo $form->labelEx($model, 'years_from_base'); */?>
                                                                            <?php /*echo $form->dropDownList($model, 'years_from_base', CHtml::listData($model->GetDogovorYears(), 'years', 'years'), array('empty' => 'Выбрать год договоров', 'class' => 'form-control')); */?>
                                                                            <?php /*echo $form->error($model, 'years_from_base'); */?>
                                                                        </div>
                                                                    </div>-->


                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo $form->labelEx($model, 'dog_number'); ?>
                                                                            <?php echo $form->textField($model, 'dog_number', array('class' => 'form-control')); ?>
                                                                            <?php echo $form->error($model, 'dog_number'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php

                                                                   /* $this->Widget('ext.highcharts.HighchartsWidget', array(

                                                                        'options' => array(
                                                                            'chart' => array('type' => 'column'),
                                                                            'title' => array('text' => 'Fruit Consumption'),
                                                                            'xAxis' => array(
                                                                                'categories' => array('Apples', 'Bananas', 'Oranges')
                                                                            ),

                                                                            'yAxis' => array(
                                                                                'title' => array('text' => 'Fruit eaten')
                                                                            ),
                                                                            'series' => array(
                                                                                array('name' => 'Dogovor', 'data' => array(500, 600, 400)),
                                                                                array('name' => 'Schet', 'data' => array(5, 7, 3)),
                                                                                array('name' => 'Schet', 'data' => array(5, 7, 3))
                                                                            )
                                                                        )
                                                                    ));*/
                                                                    ?>

<!--


                                                                    <div class="col-md-4">

                                                                        <div class="form-group">
                                                                            <?php /*echo $form->labelEx($model, 'id_ispolnitel'); */?>
                                                                            <?php /*// echo $form->textField($dogovor_model,'id_contragent',array('value'=>Contragent::model()->findByPk($dogovor_model->id_contragent)->name,'disabled'=>true,'class' => 'form-control')); */?>
                                                                            <?php /*echo $form->dropDownList($model, 'id_ispolnitel', CHtml::listData(Ispolnitel::model()->findAll(), 'id', 'name'), array('empty' => 'Выбор исполнителя', 'class' => 'form-control')); */?>
                                                                            <?php /*// echo $form->textField($dogovor_model, 'id_contragent', array('class' => 'form-control')); */?>
                                                                            <?php /*echo $form->error($model, 'id_ispolnitel'); */?>
                                                                        </div>

                                                                    </div>-->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo CHtml::ajaxSubmitButton('Отчет', $this->createUrl('reports/OborotDogovor'), array(
                                                            'url' => $this->createUrl('reports/OborotDogovor'),
                                                            'type' => 'post',
                                                            'dataType' => 'json',
                                                            'data' => 'js:jQuery(this).parents("form").serialize()',
                                                            'success' => 'function(response){

                                                          //  alert(JSON.stringify(response));

var info="<b>Сумма по договору № "+response.dogovor_number+ "</b> от: "+response.dogovor_created+" составляет : "+response.total_dogovor_summa +"<b><br>  Оплачено: "+response.schet_oplachen+"</b><br><b>  Долг заказчика= </b>"+response.total;
$("#report").html(info);
// alert(JSON.stringify(info));







                        }',
                                                        ), array('class' => 'btn btn-primary')); ?>




                                                        <?php // echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('type'=>'submit','class'=>'btn btn-primary')); ?>
                                                    </div>

                                                    <?php $this->endWidget(); ?>


                                                </div>
                                            </div>
                                            <!-- form -->
                                            <div class="row">
                                                <div class="col-md-12">


                                                    <div id="report">

                                                    </div>


                                                </div>
                                            </div>


                                        </div>

                                        <div class="tab-pane" id="tab-OborotContragents">


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


</div>






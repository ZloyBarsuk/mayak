<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */

$this->breadcrumbs = array(
    'Исполнители' => array('index'),
    'Управление',
);

$this->menu = array(
//array('label'=>'List Ispolnitel', 'url'=>array('index')),
  //  array('label' => 'Создать нового', 'url' => array('create')),
);


?>

<div class="col-md-12">
    <h1>Управление Исполнителями</h1>

</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">
        <div class="row">
            <?php echo CHtml::button('+ Исполнитель', array('class' => 'btn btn-warning', 'id' => 'new_ispolnitel', 'style' => ' display:block-inline;')); ?>

            <?php

            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,

                'htmlOptions' => array('class' => 'btn-group'),

                'itemTemplate' => '{menu}',
                'itemCssClass' => 'btn btn-warning btn-clean',


            ));
            ?>
        </div>

        <!-- search-form -->

    </div>

    <div class="row row-wider">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a></li>
                    </ul>
                </div>

                <div class="panel-body">

                    <?php


                    $this->widget('zii.widgets.grid.CGridView', array(
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'id' => 'user-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
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
                        'id' => 'ispolnitel-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(
                            array(
                                'name' => 'id',
                                'htmlOptions' => array('width' => '1%'),
                            ),
                            array(
                                'name' => 'name',
                                'htmlOptions' => array('width' => '20%'),
                            ),

                            array(
                                'name' => 'type',
                                'htmlOptions' => array('width' => '5%'),
                            ),

                            array(
                                'class' => 'CLinkColumn',
                                'header' => 'Кво. дог.',
                                'labelExpression' => '$data->dogovorsCount',
                                'urlExpression' => 'Yii::app()->controller->createUrl("dogovora", array("id_isp" => $data->id))',

                            ),


                            array(
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '7%'),
                                'header' => 'Управление',
                                'template' => "{ispolnitel}{delete}",
                                'buttons' => array
                                (

                                    'delete' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                                    ),
                                    'update' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/edit.png',
                                    ),

                                    'view' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/search.png',
                                    ),
                                    'ispolnitel' => array
                                    (
                                        'label' => 'Изменить контрагента',
                                        'htmlOptions' => array('class' => 'contragent_in_modal'),

                                        'url' => 'Yii::app()->createUrl("/ispolnitel/update",array("id"=>$data->id))',
                                        'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('id' => '$data->id')
                                        , 'success' => 'js:function(data) {
                                        alert("ispolnitel_in_modal");

                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery("#modal-dialog-contragent").modal("show");

                                        }')),
                                        'imageUrl' => Yii::app()->baseUrl . '/img/clients.png',
                                    ),
                                ),
                            ),
                        ),
                    )); ?>


                </div>


            </div>
        </div>

    </div>

</div>
<!-- Модалка для вывода форм добавления и обновления 2 уровень (уровень -то видимость модального окна над первым окном)   -->

<div class="modal" id="modal-dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border: 2px solid;color:#ae2b12;z-index: 50000;">×</button>-->
                <h4 class="modal-title-dialog">Редактирование</h4>
            </div>
            <div class="container"></div>
            <div class="modal-body-dialog" id="modal-body-dialog">


            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn" data-target="#modal-dialog">Закрыть</a>
                <?php
                /*
                                Yii::app()->clientScript->registerScript('close', "
                                jQuery('#modal-dialog').on('hidden.bs.modal', function () {
                                // удаляем все данные из модалки при ее закрытии
                                  jQuery('#modal-body-dialog').empty();
                                   jQuery('.modal-body-dialog').empty();
                                  jQuery('#modal-dialog').modal('hide');
                                });

                               ");*/

                ?>
            </div>
        </div>
    </div>
</div>

<!-- Конец  -->

<div class="modal fade" id="modal-dialog-contragent" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>-->
                <h4 class="modal-title" id="largeModalHead">Запись нового исполнителя</h4>


            </div>

            <div class="modal-body-dialog-contragent" id="modal-body-dialog-contragent">

            </div>

            <div class="modal-footer">
                <button data-dismiss="modal" class="btn" style="width:200px;" data-target="#modal-dialog-contragent">
                    Закрыть
                </button>
                <?php

                Yii::app()->clientScript->registerScript('close_contragent_dialog', "
                jQuery('#modal-dialog-contragent').on('hidden.bs.modal', function () {
                // удаляем все данные из модалки при ее закрытии
                  jQuery('#modal-body-dialog-contragent').empty();
                   jQuery('.modal-body-dialog-contragent').empty();
                  jQuery('#modal-dialog-contragent').modal('hide');
                });
               ");

                ?>
            </div>
        </div>
    </div>
</div>
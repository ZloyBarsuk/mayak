<?php
/* @var $this ObjectrabotadressController */
/* @var $model ObjectRabotAdress */

$this->breadcrumbs = array(
    'Договор по адресу' => array('index'),
    'Администрирование',
);

$this->menu = array(
    array('label' => 'List ObjectRabotAdress', 'url' => array('index')),
    array('label' => 'Create ObjectRabotAdress', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#object-rabot-adress-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<!-- Обновление договора начало -->
<div class="modal" id="edit_dogovor">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>-->
                <h4 class="modal-title-edit_dogovor" id="modal-title-edit_dogovor">Редактирование договора

                </h4>

            </div>


            <div class="container">


            </div>
            <div class="modal-body-edit_dogovor" id="modal-body-edit_dogovor">


            </div>

            <!-- <a data-toggle="modal" href="#add_schet" class="btn btn-primary">Launch modal</a>-->

            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn" data-target="#edit_dogovor">Закрыть</a>


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
<div class="col-md-12">
    <h1>Поиск договора по адресу работ</h1>

</div>
<?php Yii::app()->getClientScript()->registerCoreScript('add_etap_modal'); ?>


<div class="wrapper wrapper-white">
    <div class="col-md-12">


        <p class="btn-toolbar btn-toolbar-demo">

            <?php echo CHtml::button('+ Договор', array('class' => 'btn btn-success', 'id' => 'new_dogovor', 'style' => ' display:block-inline;')); ?>
            <?php echo CHtml::button('+ Контрагент', array('class' => 'btn btn-warning', 'id' => 'new_contragent', 'style' => ' display:block-inline;')); ?>
            <?php // echo CHtml::button('+ Документ', array('class' => 'btn btn-danger', 'style' => ' display:block-inline;')); ?>
            <?php //  echo CHtml::button('Че-то еще', array('class' => 'btn btn-inverse', 'style' => ' display:block-inline;')); ?>

        </p>
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

                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'ajaxUpdate' => true,
                        'rowHtmlOptionsExpression' => 'array("id"=>$data->id)',
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'filter' => $model,
                        'emptyText' => 'нет данных',
                        'nullDisplay' => 'нет данных',
                        'pager' => array(
                            'pageSize' => 8,
                            'header' => '',
                            'prevPageLabel' => '&laquo; назад',
                            'nextPageLabel' => 'далее &raquo;',
                            'maxButtonCount' => 30,
                            'htmlOptions' => array('class' => 'pagination'),
                            'selectedPageCssClass' => 'paginate_button current',
                            'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',
                        ),
                        'id' => 'object-rabot-adress-grid',
                        'dataProvider' => $model->search(),

                        'columns' => array(
                         //   'id',
                            'adress',
                            'ean',
                            array(
                                'name' => 'dogovor_number_search',
                                'value' => '$data->dogovor->dogovor_number',
                                'htmlOptions' => array('width' => '2%'),
                            ),
                            array(
                                'name' => 'dogovor_old_number_search',
                                'value' => '$data->dogovor->dogovor_number_old',
                                'htmlOptions' => array('width' => '2%'),
                            ),
                            /*
                            'archiv_number',
                            'id_rayon',
                            'id_avtor',
                            'record_date',
                            'kadastroviy_nomer',
                            */
                          
                            array(
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '3%'),
                                'template' => '{add_etap_rabot_modal}{updater}{documents_folder}', // {email}
                                'header' => 'Управление',
                                'buttons' => array
                                (


                                    'updater' => array(
                                        'htmlOptions' => array('class' => 'dogovor_in_modal'),
                                        'label' => 'Редактировать ',
                                        'url' => 'Yii::app()->createUrl("/dogovor/update",array("id"=>$data->id_dogovor))',
                                        'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('id' => '$data->id_dogovor')
                                        , 'success' => 'js:function(data) {
                                         jQuery(".modal-body-edit_dogovor").html(data);jQuery("#edit_dogovor").modal("show");
                                        }')),

                                        'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',

                                    ),

                                    /* 'view' => array
                                     (
                                         'imageUrl' => Yii::app()->baseUrl . '/img/search.png',
                                         // 'url' => 'Yii::app()->createUrl("dogovor/infodialog/",array("id_dogovor"=>$data->id))',
                                         // 'click' => $viewDogovorDialog,
                                     ),*/


                                    'documents_folder' => array
                                    (
                                        'label' => 'Папка с документами',
                                        'htmlOptions' => array('class' => 'document_folder_in_modal'),
                                        'url' => 'Yii::app()->createUrl("/dogovor/openfolder",array("id"=>$data->id_dogovor))',
                                        'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('id' => '$data->id_dogovor')
                                        , 'success' => 'js:function(data) {


                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery("#modal-dialog-contragent").modal("show");




                                        }')),
                                        'imageUrl' => Yii::app()->baseUrl . '/img/folder.png',

                                    ),


                                   /* 'email' => array
                                    (
                                        'label' => 'Отправить договор контрагенту',
                                        'htmlOptions' => array('class' => 'email'),
                                        'url' => 'Yii::app()->createUrl("/dogovor/EmailDogovor",array("id"=>$data->id_dogovor))',
                                        'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('id' => '$data->id')
                                        , 'success' => 'js:function(data) {
                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery("#modal-dialog-contragent").modal("show");

                                        }')),
                                        'imageUrl' => Yii::app()->baseUrl . '/img/email.png',
                                    ),*/



                                    // добавление этапов работ по этому адресу
                                    'add_etap_rabot_modal' => array
                                    (
                                        'label' => 'Добавить этап работы по этому адресу',

                                        'url' => 'Yii::app()->createUrl("/etaprabotpoobjectu/create",array("id"=>$data->id))',
                                       /* 'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('object_id' => '$data->id')
                                        , 'success' => 'js:function(data) {

                                         jQuery(".modal-body-edit_dogovor").html(data);
                                         jQuery("#edit_dogovor").modal("show");

                                        }')),*/
                                        'imageUrl' => Yii::app()->baseUrl . '/img/checklist.png',
                                        'options' => array('class' => 'add_etap_rabot_modal'),
                                    ),
                                ),
                            ),
                        ),
                    )); ?>


                </div>


            </div>
        </div>

    </div>


    <!--  Здесь прописаны все модальные окна, чтобы правильно срабатывало закрытие окна и запись в него -->

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

                    Yii::app()->clientScript->registerScript('close', "
                jQuery('#modal-dialog').on('hidden.bs.modal', function () {
                // удаляем все данные из модалки при ее закрытии
                  jQuery('#modal-body-dialog').empty();
                   jQuery('.modal-body-dialog').empty();
                  jQuery('#modal-dialog').modal('hide');
                });
               ");

                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Конец  -->


    <!-- Модалка для вывода форм добавления и обновления 3 уровень для этапов работ и тд. (уровень -то видимость модального окна над первым окном)   -->

    <div class="modal" id="modal-dialog-third" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border: 2px solid;color:#ae2b12;z-index: 50000;">×</button>-->
                    <h4 class="modal-title-dialog">Редактирование</h4>
                </div>
                <div class="container"></div>
                <div class="modal-body-dialog-third" id="modal-body-dialog-third">


                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn" data-target="#modal-dialog-third">Закрыть</a>
                    <?php

                    Yii::app()->clientScript->registerScript('close_edit', "
                jQuery('#modal-dialog-third').on('hidden.bs.modal', function () {
                // удаляем все данные из модалки при ее закрытии
                  jQuery('#modal-body-dialog-third').empty();
                });
               ");

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
                    <!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>-->
                    <h4 class="modal-title" id="largeModalHead">Запись нового контрагента</h4>
                </div>
                <div class="modal-body-dialog-contragent" id="modal-body-dialog-contragent">
                </div>

                <div class="modal-footer">

                    <button data-dismiss="modal" class="btn" style="width:200px;"
                            data-target="#modal-dialog-contragent">
                        Закрыть
                    </button>
                    <!--<a href="#" data-dismiss="modal" class="btn" data-target="#modal-dialog-contragent">Закрыть</a>-->
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
</div>

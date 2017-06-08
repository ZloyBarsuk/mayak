<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs = array(
    'Доп. согдашение ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление доп. соглашениями по договору', 'url' => array('admin')),
    array('label' => 'Создать доп. соглашение по договору', 'url' => array('create')),
);
?>



<?php Yii::app()->getClientScript()->registerCoreScript('add_soglasheniye'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('soglasheniye'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_soglasheniye'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_act'); ?>




<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('+ Доп. соглашение', array('class' => 'btn btn-success', 'id' => 'add_soglasheniye', 'style' => ' display:block-inline;')); ?>

    </p>

    <div class="col-md-10">
        <div class="search-form" style="display:none">

        </div>
        <!-- search-form -->

    </div>

    <div class="row row-wider">


        <?php
        //  var_dump($dataProvider_raboti);
        //  exit();
        $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
            'id' => 'dopsoglasheniye-grid', //.rand(1500, 99999999),
            'ajaxType' => 'POST',
            'selectableRows' => 1,
            'ajaxUpdate' => true,
            'nullDisplay' => '',
            'enablePagination' => true,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider_soglasheniye,
            // 'filter' => $dataProvider_raboti,
            'emptyText' => 'нет данных',
            'enableSorting' => false,
            // 'rowCssClassExpression' => '"myclass_{$data->id}"',
            'rowHtmlOptionsExpression' => 'array("id" => $data->id)',
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

                array(
                    'name' => 'ID',
                    'value' => '$data->id',
                    'headerHtmlOptions' => array('style' => 'display:none'),
                    'htmlOptions' => array('style' => 'display:none'),
                    /* 'value' => function ($data) {
                         return '<div id="' . $data->id . '" class="row_id">' . $data->id . '</div>';
                     },*/
                    //  'type' => 'raw',
                ),
                array(
                    'name' => 'Номер',
                    'value' => '$data->number',
                ),
                array(
                    'name' => 'Название соглашения',
                    'value' => '$data->name',
                ),

                'tip_dney',
                'summa',
                'nds',

                array(
                    'name' => 'Создано',
                    'value' => '$data->data_vneseniya?date("d-m-Y", strtotime($data->data_vneseniya)):"нет даты"',
                ),
                array(
                    'name' => 'Подписано',
                    'value' => '$data->data_podpisaniya?date("d-m-Y", strtotime($data->data_podpisaniya)):"нет даты"',
                ),
              //  'status',


                array(
                    'class' => 'CButtonColumn',
                    //'htmlOptions' => array('width' => '100px;'),
                    'template' => '{update_my_soglasheniye}{print_my_soglasheniye}{print_act}{email}{delete_my_soglasheniye}',

                    'header' => 'Управление',
                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                  //  'updateButtonOptions' => array("class" => 'update'),
                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (

                        'delete_my_soglasheniye' => array(
                            'label'=>'Удаление дополнительного соглашения',
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                            'options' => array('class' => 'delete_soglasheniye'),
                            'url' => 'CController::createUrl("/dopsoglasheniye/delete", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),


                        'update_my_soglasheniye' => array
                        (
                            'label'=>'Редактирование дополнительного соглашения',
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            'options' => array('class' => 'update_soglasheniye'),
                            'url' => 'CController::createUrl("/dopsoglasheniye/update", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',
                        ),
                        'print_my_soglasheniye' => array
                        (
                            'label'=>'Печать дополнительного соглашения',
                            'imageUrl' => Yii::app()->baseUrl . '/img/print.png',
                            'options' => array('class' => 'print_item_soglasheniye'),
                            'url' => 'CController::createUrl("/universaldocument/PrintDopSoglasheniye", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),

                        'print_act' => array
                        (
                            'label' => 'Печать акта',
                            'imageUrl' => Yii::app()->baseUrl . '/img/act.png',
                            'options' => array('class' => 'print_act_dopsoglasheniye', 'style' => 'margin-left:5px;'),
                            // 'url' => 'CController::createUrl("/universaldocument/PrintDopSoglasheniye", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',
                        ),

                        'email' => array
                        (
                            'label' => 'Печать акта',
                            'imageUrl' => Yii::app()->baseUrl . '/img/email.png',
                            'options' => array('class' => 'email_dopsoglasheniye', 'style' => 'margin-left:5px;'),
                            // 'url' => 'CController::createUrl("/universaldocument/PrintDopSoglasheniye", array("id"=>$data->id))',
                            'url' => 'CController::createUrl("/dopsoglasheniye/EmailDopSoglasheniye", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',
                        ),





                        /*
                         'email' => array
                        (
                            'label' => 'Отправить соглашение контрагенту',
                            'htmlOptions' => array('class' => 'email'),
                            'url' => 'Yii::app()->createUrl("/dopsoglasheniye/EmailDopSoglasheniye",array("id"=>$data->id))',
                            'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                'data' => array('id' => '$data->id')
                            , 'success' => 'js:function(data) {
                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery("#modal-dialog-contragent").modal("show");

                                        }')),
                            'imageUrl' => Yii::app()->baseUrl . '/img/email.png',
                        ),

                        */




                    ),
                ),

            ),
        ));

        ?>


    </div>
</div>

</div>

</div>


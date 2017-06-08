<?php
// var_dump(Yii::app()->clientScript->scriptMap);


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


<?php Yii::app()->getClientScript()->registerCoreScript('add_zatrati'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('zatrati'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_zatrati'); ?>







<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('+ затраты по договору', array('class' => 'btn btn-success', 'id' => 'add_zatrati', 'style' => ' display:block-inline;')); ?>

    </p>

    <div class="col-md-10">
        <div class="search-form" style="display:none">

        </div>
        <!-- search-form -->

    </div>

    <div class="row row-wider">


        <?php
        //   var_dump($dataProvider_object);
        //  exit();
        $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
            'id' => 'zatrati-grid', //.rand(1500, 99999999),
            'ajaxType' => 'POST',
            'selectableRows' => 1,
            'ajaxUpdate' => true,
            'enablePagination' => false,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider_zatrati,
            // 'filter' => $dataProvider_object,
            'emptyText' => 'нет данных',
            'enableSorting' => false,
            // 'rowCssClassExpression' => '"myclass_{$data->id}"',
            'rowHtmlOptionsExpression' => 'array("id" => $data->id)',
            /*'pager' => array(
                'pageSize' => 1000,
                'header' => '',
                'prevPageLabel' => '&laquo; назад',
                'nextPageLabel' => 'далее &raquo;',
                'maxButtonCount' => 10,
                'htmlOptions' => array('class' => 'pagination'),
                'selectedPageCssClass' => 'paginate_button current',
                'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',
            ),*/
            'columns' => array(

                array(
                    'name' => 'ID',
                    'value' => '$data->id',
                    'headerHtmlOptions' => array('style' => 'display:none'),
                    'htmlOptions' => array('style' => 'display:none'),
                    /* 'value' => function ($data) {
                         return '<div id="' . $data->id . '" class="row_id">' . $data->id . '</div>';
                     },*/
                    'type' => 'raw',
                ),
                'zatrata',
                /*array(
                    'name' => 'Наименование',
                    'value' => '$data->spr_zatrati->naimenovaniye',
                ),*/
                array(
                    'name' => 'Адрес работ',
                    'value' => '$data->adress_rabot->adress',
                ),
                'summa',






                array(
                    'class' => 'CButtonColumn',
                    //'htmlOptions' => array('width' => '100px;'),
                    'template' => '{update_my_zatrati}{delete_my_zatrati}',

                    'header' => 'Управление',
                   // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                    'updateButtonOptions' => array("class" => 'update'),
                  //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (

                        'delete_my_zatrati' => array(
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                            'options' => array('class' => 'delete_item_zatrati','style'=>'margin-left:5px;'),
                            'url' => 'CController::createUrl("/zatratipodogovoru/delete", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),


                        'update_my_zatrati' => array
                        (
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            'options' => array('class' => 'update_item_zatrati','style'=>'margin-left:5px;'),
                            'url' => 'CController::createUrl("/zatratipodogovoru/update", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),

                        // 'remove'=>array('url'=>'Yii::app()->createUrl("/vidrabotpodogovoru/delete", array("id_application"=>$data->id,"id_resolution"=>$data->id))','label'=>'Remove application from resolution.','imageUrl'=>Yii::app()->request->baseUrl.'/img/delete_modal.png','options'=>array('class'=>'delete','id_resolution'=>$data->id)),

                    ),
                ),

            ),
        ));

        ?>
        <!-- </div>-->


    </div>
</div>

</div>

</div>


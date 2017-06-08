<?php
//Yii::app()->clientScript->scriptMap['jquery'] = false;
//Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

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


$upd= <<<'EOT'
function() {

alert("fuck");

var url = $(this).attr('href');
$.get(url, function(r){
$(".modal-body-edit_dogovor").html(r);
 $('#edit_dogovor').modal();
});
return false;
}
EOT;*/


Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#etap-rabor-po-objectu-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");

?>

<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs = array(
    'Этапы работ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление этапами работ', 'url' => array('admin')),
    array('label' => 'Создать этап работ', 'url' => array('create')),
);
?>


<?php // Yii::app()->getClientScript()->registerCoreScript('add_etap'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('etap'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_etap'); ?>


<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


    <div class="wrapper wrapper-white">
        <div class="col-md-10">


            </div>


            <div class="wrapper wrapper-white">
                <p class="btn-toolbar btn-toolbar-demo">

                    <!--        --><?php /* echo CHtml::button('+ этап работ', array('class' => 'btn btn-success', 'id' => 'add_etap_inner', 'style' => ' display:block-inline;')); */ ?>

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
                        'id' => 'etap_rabot_grid',
                        'ajaxType' => 'POST',
                        'ajaxUpdate' => true,
                        'enablePagination' => true,
                        'htmlOptions' => array('class' => 'pagination'),
                        'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
                        'dataProvider' => $dataProvider_etap,
                        // 'filter' => $dataProvider_object,
                        'emptyText' => 'нет данных',
                        'nullDisplay' => 'нет данных',
                        'enableSorting' => false,

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
                                // 'type' => 'raw',
                            ),
                            array(
                                'name' => 'Название',
                                'value' => '$data->spr_etap_rabot->etap_rabot',
                                'htmlOptions' => array('width' => '20%'),
                            ),
                            'document_number',

                            array(
                                'name' => 'data_nachala_rabot',
                               // 'value' => 'date(\'d.m.y\',strtotime($data->data_nachala_rabot))',

                                'value' => function($data)
                                {

                                    if($data->data_nachala_rabot=='0000-00-00')
                                    {

                                        return null;

                                    }
                                    else{

                                        return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_nachala_rabot);
                                    }




                                },
                                'htmlOptions' => array('width' => '2%'),
                            ),
                            array(
                                'name' => 'data_okonchaniya_rabot',
                                // 'value' => 'date(\'d.m.y\',strtotime($data->data_okonchaniya_rabot))',
                                'value' => function($data)
                                {

                                    if($data->data_okonchaniya_rabot=='0000-00-00')
                                    {

                                        return null;

                                    }
                                    else{

                                        return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_okonchaniya_rabot);
                                    }




                                },
                                'htmlOptions' => array('width' => '2%'),
                            ),


                            array(
                                'name' => 'comment',
                                'value' => '$data->comment',
                                'htmlOptions' => array('width' => '25%'),
                            ),
                             array(
                                 'name' => 'Отв.лицо',
                                 'value' => '$data->otvetstvenniy->username',
                                 'htmlOptions' => array('width' => '1%'),
                             ),

                            /*  array(
                                  'name' => 'Начато',
                                  'value' => '$data->data_nachala_rabot?date("d-m-Y", strtotime($data->data_nachala_rabot)):"нет даты"',
                              ),

                              array(
                                  'name' => 'Окончено',
                                  'value' => '$data->data_okonchaniya_rabot?date("d-m-Y", strtotime($data->data_okonchaniya_rabot)):"нет даты"',
                              ),*/
                           // 'srok_dney',
                            'status',


                            /* array(
                                 'class'=>'CLinkColumn',
                                 'label'=>'Этапы работ',
                                 'urlExpression'=>'"/etaprabotpoobjectu/infobydogovor/".$data->id',
                                 'header'=>'Этапы работ',
                                 'linkHtmlOptions'=>array('class'=>'etap_rabot_po_adresy'),
                                 'imageUrl' => Yii::app()->baseUrl . '/img/work.png',
                             ),*/
                            array(
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '1%'),
                                'template' => '{update_my_etap_rabot}{delete_my_etap_rabot}',

                                'header' => 'Управление',
                                // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                                //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                                'updateButtonOptions' => array("class" => 'update'),
                                //  'deleteButtonOptions' => array("class" => 'delete_item'),

                                'buttons' => array
                                (

                                    'delete_my_etap_rabot' => array(
                                        'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                                        'options' => array('class' => 'delete_item_etap_rabot'),
                                        'url' => 'CController::createUrl("/etaprabotpoobjectu/delete", array("id"=>$data->id))',
                                        'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                                    ),


                                    'update_my_etap_rabot' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                                        'options' => array('class' => 'update_item_etap_rabot'),
                                        'url' => 'CController::createUrl("/etaprabotpoobjectu/update", array("id"=>$data->id))',
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
                    <!-- </div>-->


                </div>
            </div>

        </div>

    </div>



<?php
// var_dump(Yii::app()->clientScript->scriptMap);
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
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs = array(
    'Вид работ ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление видами работ по договору', 'url' => array('admin')),
    array('label' => 'Создать вид работ по договору', 'url' => array('create')),
);
?>

<?php

// создание нового адреса из модалки

/*Yii::app()->clientScript->registerScript('new_raboti', "
jQuery.noConflict();
jQuery('document').on('click','#add_raboti',function(){
jQuery.noConflict();
  var dog_number=jQuery('#dogovor_number').val();
  alert(dog_number);

$.get('/objectrabot/create/',{ dog_id:dog_number}, function(request){

$('#modal-body-new_object').empty().html(request);
$('#new_object').css('z-index', '22000');
$('#new_object').css('height', 'auto');
$('#new_object').css('max-height', '100%');
$('#new_object').css('width', 'auto');
jQuery.noConflict();
  $('#new_object').modal('show');
});
//alert(dog_number);

return false;
}


 $.ajax({
  type: 'POST',
  url: '/vidrabotpodogovoru/create/',
  data: { dog_id:dog_number},
  success: function (response) {
$('#modal-body-dialog').empty().html(response);
$('#modal-dialog').css('z-index', '22000');
$('#modal-dialog').css('height', 'auto');
$('#modal-dialog').css('max-height', '100%');
$('#modal-dialog').css('width', 'auto');
jQuery.noConflict();
  $('#modal-dialog').modal('show');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);

                }

});
}
);
");*/
?>

<?php Yii::app()->getClientScript()->registerCoreScript('add_objectrabot'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('objectrabot'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_objectrabot'); ?>

<?php
// обновление выюранного адреса
/*Yii::app()->clientScript->registerScript('load_raboti', "

jQuery('#vid-rabot-po-dogovoru-form_').on('click', 'a.update_buttons', function(){

var url = $(this).attr('href');
alert(url);
jQuery.get(url, function(r){

jQuery('#modal-body-dialog').empty().html(r);
jQuery('#modal-dialog').css('z-index', '22002');
jQuery('#modal-dialog').css('height', 'auto');
jQuery('#modal-body-dialog').css('overflow-y', 'auto');
jQuery('#modal-dialog').css('max-height', '100%');
jQuery('#modal-dialog').css('width', 'auto');
  jQuery('#modal-dialog').modal('show');

});

return false;

});

");
*/


?>


<?php
// удаление  выбранного адреса
/*Yii::app()->clientScript->registerScript('delete_raboti', "

jQuery('document').on('click', '#vid-rabot-po-dogovoru-form_ a.delete_item', function(){

 jQuery.noConflict();
                             // evt.preventDefault();

                             // узнаем айди строки
                             var row_ids= $(this).closest('tr').attr('id');
                             alert(row_ids);
                             jQuery(this).closest('tr').hide();

                             // отправляем запрос на удаление записи
                              jQuery.ajax({
                                      type: 'POST',
                                      url: '/vidrabotpodogovoru/delete',
                                      dataType:'json',
                                      data: {item_id:row_ids},
                                      success: function (response) {
                                       //jQuery.noConflict();
                                      alert(response.status);

                                                                   },
                                       error: function (xhr, ajaxOptions, thrownError) {
                                       alert(xhr.status);

                                                                                       }

                                      });






return false;
}
);




");*/
?>


<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('+ вид работы', array('class' => 'btn btn-success', 'id' => 'add_raboti', 'style' => ' display:block-inline;')); ?>

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
            'id' => 'vid-rabot-po-dogovoru-form_', //.rand(1500, 99999999),
            'ajaxType' => 'POST',
            'selectableRows' => 1,
            'ajaxUpdate' => true,

            'emptyText' => 'нет данных',
            'nullDisplay' => 'нет данных',
            'enablePagination' => true,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider_raboti,
            // 'filter' => $dataProvider_raboti,

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
                    'name' => 'Вид работ',
                    'value' => '$data->vidrabot->naimenovaniye',
                    'htmlOptions' => array('width' => '30%;'),

                ),
                array(
                    'name' => 'Соглашение',
                    'value' => '$data->id_dopsoglasheniya==null ? "-" : $data->dopsoglasheniye->number',
                ),

                'vid_dney',
                'summa',
                'nds_summa',
                'nds',

                array(
                    'name' => 'Начало',
                //    'value' => '$data->data_nachala?date("d.m.y", strtotime($data->data_nachala)):"нет даты"',
                    'value' => function($data)
                    {

                        if($data->data_nachala=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return $data->data_nachala;
                        }




                    },
                ),
                array(
                    'name' => 'Конец',
                    'value' => '$data->data_okonchaniya?date("d.m.y", strtotime($data->data_okonchaniya)):"нет даты"',
                ),
                'status',


                array(
                    'class' => 'CButtonColumn',
                    /*'htmlOptions' => array('width' => '50px;'),*/
                    'template' => '{update_my}{delete_my}',

                    'header' => 'Правка',
                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                    'updateButtonOptions' => array("class" => 'update'),
                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (

                        'delete_my' => array(
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                            'options' => array('class' => 'delete_item'),
                            'url' => 'CController::createUrl("/vidrabotpodogovoru/delete", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',
                        ),


                        'update_my' => array
                        (
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            'options' => array('class' => 'update_buttons'),
                            'url' => 'CController::createUrl("/vidrabotpodogovoru/update", array("id"=>$data->id))',
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


<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs = array(
    'Счета ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление счетами', 'url' => array('admin')),
    array('label' => 'Создать счет', 'url' => array('create')),
);
?>

<?php

// создание нового счета из модалки

/*Yii::app()->clientScript->registerScript('new_schet', "
$('#add_schet').click(function(){
jQuery.noConflict();
  // alert('Вы нажали на элемент ');
  var dog_number=$('#dogovor_number').val();
$.get('/schet/create/',{ dog_id:dog_number}, function(request){

$('#modal-body-dialog').empty().html(request);
$('#modal-dialog').css('z-index', '22002');
$('#modal-dialog').css('height', 'auto');
$('#modal-body-dialog').css('overflow-y', 'auto');
$('#modal-dialog').css('max-height', '100%');
$('#modal-dialog').css('width', 'auto');
jQuery.noConflict();
  $('#modal').modal('show');

});





// alert(dog_number);
$('#Schet_id_dogovor').val(dog_number);

return false;
}

);
");*/
?>


<?php
// обновление выюранного счета
/*Yii::app()->clientScript->registerScript('load_schet', "
$('#schet-grid').on('click', 'a.update', function(){
// alert('sdf');
var url = $(this).attr('href');
$.get(url, function(r){

$('#modal-body-dialog').empty().html(r);
$('#modal-dialog').css('z-index', '22002');
$('#modal-dialog').css('height', 'auto');
$('#modal-body-dialog').css('overflow-y', 'auto');
$('#modal-dialog').css('max-height', '100%');
$('#modal-dialog').css('width', 'auto');
jQuery.noConflict();
  $('#modal').modal('show');
});
return false;
}
);
");*/
?>






<?php
/*$update_schet = <<<'EOT'
function() {

$('#schet-grid a.update').off('click');
var href_controller = $(this).attr('href') ;
  alert('до аджакс');
$.get(href_controller, function(r){

  alert(' после аджакс');
  // alert(' Содержимое счета'+r);


 jQuery.noConflict();
$('#modal-body-update_schet').html(r);
$('#update_schet').css('z-index', '22000');
  $('#update_schet').modal();

});


return false;
}
EOT;
*/ ?>




<?php Yii::app()->getClientScript()->registerCoreScript('add_schet'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('schet'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_schet'); ?>


<div class="col-md-12">


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('+ счет', array('class' => 'btn btn-success', 'id' => 'add_schet_', 'style' => ' display:block-inline;')); ?>

    </p>
    <div class="col-md-10">
        <div class="search-form" style="display:none">

        </div>
        <!-- search-form -->

    </div>

    <div class="row row-wider">

        <!-- <div class="col-md-12">-->

        <!-- <div class="panel panel-default">
             <div class="panel-heading">

                 <ul class="panel-btn">
                     <li><a href="#" class="btn btn-danger"
                            onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                 class="fa fa-compress"></i></a></li>
                 </ul>
             </div>

             <div class="panel-body">-->

        <?php
        //  var_dump($model);
        $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
            'id' => 'schet-grid',
            'ajaxType' => 'POST',
            'selectableRows' => 1,
            'ajaxUpdate' => true,
            'nullDisplay' => '',
            'enablePagination' => true,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider_schet,
            'emptyText' => 'нет данных',
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
                    //  'type' => 'raw',
                ),
                //   'id_dogovor',
                'tip_oplati',
                array(
                    'name' => 'Соглашение',
                    'value' => '$data->id_dopsoglasheniya==null ? "-" : $data->dopsoglasheniye->number',
                ),
                'summa_bez_nds',

                'nds',
                'status',
                // 'data_scheta',
                array(
                    'name' => 'data_scheta',
                    // 'value' => ' Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_scheta)',
                    'value' => function($data)
                    {

                        if($data->data_scheta=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_scheta);
                        }




                    },

                ),
                array(
                    'name' => 'data_oplati',
                   // 'value' => '$data->data_oplati!= "0000-00-00" ? date("d.m.y",strtotime($data->data_oplati)): ""',
                    'value' => function($data)
                    {

                        if($data->data_oplati=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_oplati);
                        }




                    },
                ),
                array(
                    'name' => 'Тип счета',
                    'value' => '$data->tip_scheta->naimenovanie',

                ),


                array(
                    'class' => 'CButtonColumn',
                    //'htmlOptions' => array('width' => '100px;'),
                    'template' => '
                    {update_my_schet}
                     {email}
                     {delete_my_schet}', // {print_my_schet}

                    'header' => 'Управление',
                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                    'updateButtonOptions' => array("class" => 'update'),
                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (

                        'delete_my_schet' => array(
                            'label'=>'Удаление счета',
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                            'options' => array('class' => 'delete_item_schet'),
                            'url' => 'CController::createUrl("/schet/delete", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),


                        'update_my_schet' => array
                        (
                            'label'=>'Изменение счета',
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            'options' => array('class' => 'update_item_schet'),
                            'url' => 'CController::createUrl("/schet/update", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),

                        'email' => array
                        (
                            'label' => 'Отправить счет контрагенту',

                            'options' => array('class' => 'email_item_schet'),
                            'url' => 'CController::createUrl("/schet/EmailSchet",array("id"=>$data->id))',
                            /*'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                'data' => array('id' => '$data->id')
                            , 'success' => 'js:function(data) {
                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery("#modal-dialog-contragent").modal("show");

                                        }')),*/
                           // 'url' => 'CController::createUrl("/dopsoglasheniye/EmailDopSoglasheniye", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',

                            'imageUrl' => Yii::app()->baseUrl . '/img/email.png',
                        ),


                    ),
                ),
                array(
                    'class' => 'CButtonColumn',
                    //'htmlOptions' => array('width' => '100px;'),
                    'template' => '{print_my_schet_with_stamp}{print_my_schet_no_stamp}',

                    'header' => 'Печать счета',
                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                    'updateButtonOptions' => array("class" => 'update'),
                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (





                        'print_my_schet_with_stamp' => array
                        (
                            'label'=>'Печать счета c подписью',
                            'imageUrl' => Yii::app()->baseUrl . '/img/stamp_it.png',
                            'options' => array('class' => 'print_item_schet'),
                            'url' => 'CController::createUrl("/universaldocument/printschet", array("id"=>$data->id,"print"=>"yes"))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),

                        'print_my_schet_no_stamp' => array
                        (
                            'label'=>'Печать счета без подписи',
                            'imageUrl' => Yii::app()->baseUrl . '/img/print.png',
                            'options' => array('class' => 'print_item_schet'),
                            'url' => 'CController::createUrl("/universaldocument/printschet", array("id"=>$data->id,"print"=>"no"))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),

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



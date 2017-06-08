

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

Yii::app()->clientScript->registerScript('new_schet', "
$('#add_schet').click(function(){
jQuery.noConflict();
  // alert('Вы нажали на элемент ');
  var dog_number=$('#dogovor_number').val();
$.get('/schet/create/',{ dog_number:dog_number}, function(request){

$('#modal-body-new_schet').html(request);
$('#new_schet').css('z-index', '22000');
$('#new_schet').css('height', 'auto');
$('#new_schet').css('max-height', '100%');
$('#new_schet').css('width', 'auto');
jQuery.noConflict();
  $('#new_schet').modal();

});





alert(dog_number);
$('#Schet_id_dogovor').val(dog_number);

return false;
}

);
");
?>


<?php
// обновление выюранного счета
Yii::app()->clientScript->registerScript('load_schet', "
$('#-grid').on('click', 'a.update', function(){
// alert('sdf');
var url = $(this).attr('href');
$.get(url, function(r){

$('#modal-body-update_schet').html(r);
$('#update_schet').css('z-index', '22000');
$('#update_schet').css('height', 'auto');
$('#modal-body-update_schet').css('overflow-y', 'auto');
$('#update_schet').css('max-height', '100%');
$('#update_schet').css('width', 'auto');
jQuery.noConflict();
  $('#update_schet').modal();
});
return false;
}
);
");
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
*/?>

<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('+ счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>

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
            'enablePagination' => true,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider,
            'emptyText' => 'нет данных',
            'enableSorting'=>false,
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
                'id',
                //   'id_dogovor',
                'tip_oplati',
                'id_dopsoglasheniya',
                'summa',
                'status',
                // 'data_scheta',
                array(
                    'name' => 'data_scheta',
                    'value' => ' Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_scheta)',

                ),
                array(
                    'name' => 'data_oplati',
                    'value' => ' Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_oplati)',

                ),

                'schet_tip',
                array(
                    'class' => 'CButtonColumn',
                    'htmlOptions' => array('width' => '2%'),
                    'template' => '{update}{delete}',
                    'header' => 'Управление',
                  //  'updateButtonOptions'=>'schet_current',
                    'buttons' => array
                    (
                        'delete' => array
                        (
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                        ),
                        'update' => array
                        (
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            //  'click' =>$update_schet,
                        ),
                    ),
                ),


                /* array(
                     'name'=>'create_time',
                     'value'=>'date("M j, Y", $data->create_time)',
                 ),
                 array(
                     'name'=>'authorName',
                     'value'=>'$data->author->username',
                 ),
                 array(
                     'class'=>'CButtonColumn',
                 ),*/
            ),
        ));

        ?>
        <!-- </div>-->


    </div>
</div>

</div>

</div>



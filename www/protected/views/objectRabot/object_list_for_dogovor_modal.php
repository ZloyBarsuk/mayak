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

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#object-grid').yiiGridView('update', {
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
    'Адреса ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление адресами', 'url' => array('admin')),
    array('label' => 'Создать адрес', 'url' => array('create')),
);
?>

<?php

// создание нового адреса из модалки
/*
Yii::app()->clientScript->registerScript('new_address', "

$('#add_address').click(function(){
jQuery.noConflict();

  var dog_number=$('#dogovor_number').val();
$.get('/objectrabot/create/',{ dog_id:dog_number}, function(request){

$('#modal-body-new_object').empty().html(request);
$('#new_object').css('z-index', '22000');
$('#new_object').css('height', 'auto');
$('#new_object').css('max-height', '100%');
$('#new_object').css('width', 'auto');
jQuery.noConflict();
  $('#new_object').modal('show');
});


return false;
}
// alert(new Date().getTime());
 $.ajax({
  type: 'POST',
  url: '/objectrabot/create/',
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
");

*/

?>

<!-- подключаем все сраные скрипты обработки  кнопок и прочего говна-->

<?php Yii::app()->getClientScript()->registerCoreScript('add_address'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('address'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_address'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('open_etaprabot'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('open_pole'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('add_etap'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_soprovod_list'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_doverennost'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('add_pole'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_propusk'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_act_obsledovaniya'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_tehzadaniye'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_dopsvedeniya'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_zayava_dopsvedeniya'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('print_barcode'); ?>





<?php Yii::app()->getClientScript()->registerCoreScript('print_obracheniye'); ?>

<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <div class="alert alert-info alert-dismissible"
         style="padding:5px;" role="alert"><strong>Управление множеством адресов:</strong></div>
    <p class="btn-toolbar btn-toolbar-demo">

        <?php echo CHtml::button('добавить адрес', array('class' => 'btn btn-default', 'id' => 'add_address', 'style' => ' display:block-inline;')); ?>
        <?php echo CHtml::button('печать сопр. лист', array('class' => 'btn btn-primary', 'id' => 'print_soprovod_list', 'style' => ' display:block-inline;')); ?>
        <?php echo CHtml::button('печать доверки', array('class' => 'btn btn-success', 'id' => 'print_doverennost', 'style' => ' display:block-inline;')); ?>
        <?php //  echo CHtml::button('печать доверки', array('class' => 'btn btn-warning', 'id' => 'print_schet', 'style' => ' display:block-inline;')); ?>
        <?php echo CHtml::button('печать пропуска', array('class' => 'btn btn-warning', 'id' => 'show_propusk_form', 'style' => ' display:block-inline;')); ?>
        <?php  echo CHtml::button('штрих коды', array('class' => 'btn btn-primary btn-xs', 'id' => 'print_barcode', 'style' => ' display:block-inline;')); ?>

    </p>

    <div class="row">
        <div class="alert alert-info alert-dismissible"
             style="padding:5px;" role="alert"><strong>Поиск по адресу:</strong></div>
        <div class="col-md-12">
        <div class="col-md-8">
            <?php // echo CHtml::textField('inpSearch', '', array('placeholder'=>Yii::t('Object', 'Поиск по адресу'))); ?>

            <?php // echo CHtml::link('Поиск','#',array('class'=>'btn btn-primary','id'=>'search_info')); ?>
            <div class="search-form">
                <?php $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <!-- search-form -->
        </div>
            <div class="col-md-4">
                <div class="alert alert-info alert-dismissible"
                     style="padding:5px;" role="alert"><strong>Управление одним адресом:</strong></div>
                <?php echo CHtml::dropDownList('address_actions', '',
                    array(
                        ' ' => 'Выбор действий по адресу',
                        'update_my_adress' => 'Редактировать адрес',
                        'add_etap_rabot' => 'Добавить этап работ',
                        'add_pole' => 'Добавить полевые работы',
                        'print_act_obsledovaniya' => 'Печать акт обследования',
                        'print_tehzadaniye' => 'Печать техзадания',
                        'print_dopsvedeniya' => 'Печать доп. сведений',
                        'print_zayava_dopsvedeniya' => 'Печать заявки доп. сведений',
                        'print_obracheniye' => 'Печать обращения',
                        'delete' => 'Удалить этот адрес !!!',
                         )

                        );
                ?>
            </div>

        </div>
    </div>
    <div class="row row-wider">

        <?php
        //  var_dump($dataProvider_object);
        //  exit();
        $this->widget('ext.selgridview.SelGridView', array(
            // $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
            'id' => 'object-grid',
            'rowHtmlOptionsExpression' => 'array("id"=>$data->id)',
            'ajaxType' => 'POST',
            'ajaxUpdate' => true,
            'enablePagination' => true,
            'selectableRows' => 2,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            // 'dataProvider' => $dataProvider_object->model->ObjectByDogovor(),
            'dataProvider' => $model->search(),
            'filter' => $model,
            //  'ajaxUrl'=>'/objectrabot/InfoByDogovor',
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
                    'class' => 'CCheckBoxColumn',

                    'checkBoxHtmlOptions' => array('class' => 'checkbox'),
                ),

                array(
                    'name' => 'archiv_number',
                    'value' => '$data->archiv_number',
                    'htmlOptions' => array('width' => '1%'),
                ),

         array(
            'name' => 'rayon',
             'value' => 'SprRayony::model()->findByPK($data->id_rayon)->naimenovaniye',
             'htmlOptions' => array('width' => '5%'),
         ),
                'adress',
                'kadastroviy_nomer',

                array(
                    'name' => 'plochad_rabot',
                    'value' => '$data->plochad_rabot',
                    'htmlOptions' => array('width' => '2%'),
                ),
                /* array(
                     'name' => 'Автор',
                     'value' => '$data->avtor->username',
                     'htmlOptions' => array('width' => '25%'),
                 ),*/

                /* array(
                     'name' => 'rayon',
                     'value' => '$data->rayon->naimenovaniye',
                 ),*/


                array(
                    'class' => 'CLinkColumn',
                    'label' => 'Этапы работ',
                    'urlExpression' => '"/etaprabotpoobjectu/infobydogovor/".$data->id',
                    'header' => 'Этапы работ',
                    'linkHtmlOptions' => array('class' => 'etap_rabot_po_adresy'),
                    'imageUrl' => Yii::app()->baseUrl . '/img/work.png',
                ),
                array(
                    'class' => 'CLinkColumn',
                    'label' => 'Полевые работы',
                    'urlExpression' => '"/soprovoditelniylist/infobydogovor/".$data->id',
                    'header' => 'Поле',
                    'linkHtmlOptions' => array('class' => 'pole_po_adresy'),
                    'imageUrl' => Yii::app()->baseUrl . '/img/pole.png',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'htmlOptions' => array('width' => '3%'),
                    'template' => '{delete}', //{updater}{contragent}{documents_folder}{email}
                    'header' => 'Удалить',
                    'buttons' => array
                    (
                        'delete' => array
                        (
                            'htmlOptions' => array('class' => 'delete_item_adress'),
                           'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                        ),



                    ),

            ),
            )
        ));

        ?>
        <!-- </div>-->


    </div>
</div>

</div>

</div>



<?php // Yii::app()->clientScript->scriptMap = array('jquery.ba-bbq.js'=> false); ?>


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

            /* Yii::app()->clientScript->registerScript('unblock', "
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

// Загружаем данные по текущему договору в зависимости от нажатия на вкладку. Тоесть, при нажатии на вкладку выбираем из
// сводных таблиц данные и выводим пользователю.
/*
Yii::app()->clientScript->registerScript('tabs_loaders', "

jQuery('body').on('click', '#edit_dogovor .tabs li a ', function(){
var href_controller = jQuery(this).attr('href').replace('#','') ;
var dogovor_ids=jQuery('#dogovor_number').val();
//alert('href_controller='+href_controller);
//alert(jQuery('#dogovor_number').val());
alert(href_controller);
if(href_controller!=='dogovor')
{

var url = '/'+href_controller+'/' +'infobydogovor'+'/'+dogovor_ids;
// alert(url);
jQuery.get(url, function(r){

jQuery('#'+href_controller).html(r);
});
}
});
");*/
?>


<!--  Здесь прописываем все модалки для просмотра данных контрагента -->


<?php

// Обработчик вывода данных контрагента по ID
/*
Yii::app()->clientScript->registerScript('contragent_info', "

jQuery('#dogovor-grid .contragent').dblclick( function(){
// alert('dslkdsjgldskgjkljs');

var controller_path = jQuery(this).attr('id');
jQuery.get('/contragent/view/'+controller_path, function(data){

jQuery('#modal-body-show_contragent').html(data);
jQuery.noConflict();
 jQuery('#show_contragent').modal();
});
return false;
}
);

");*/
?>

<?php

Yii::app()->clientScript->registerScript('selectors', "



                      $('body').on('change','input.selected_dogovor',function () {
                        if (! $('input:checkbox').is('checked')) {
     // $('input:checkbox').attr('checked','checked');
  this.checked = true;
      $('input:checkbox').closest('td').next('td').find('div.context_menu').hide();
      $(this).closest('td').next('td').find('div.context_menu').show();
  } else {
    //  $('input:checkbox').removeAttr('checked');
  }

        })









                        ");

?>







<?php

Yii::app()->clientScript->registerScript('links', "



                      $('body').on('click','div.context_menu a',function (eventObject) {

    eventObject.preventDefault();

  var href_controller = jQuery(this).attr('href');
  var modal_name=jQuery(this).attr('name');
 // alert(modal_name);
  var id_dogovor = $(this).parent('div').parent().attr('id');


          if (modal_name == '.modal-body-edit_dogovor') {
               var url = href_controller;
               jQuery.get(url, function (data) {

                jQuery('.modal-body-edit_dogovor').html(data);
               jQuery('#edit_dogovor').modal('show');
            });
        }
        else if(modal_name == '#modal-dialog-contragent')
        {
            var url = href_controller;
               jQuery.get(url, function (data) {
               jQuery('#modal-body-dialog-contragent').html(data);
               jQuery('#modal-dialog-contragent').modal('show');
            });


        }

        else if(modal_name == 'delete')
        {

            var url = href_controller;
                  var deleteCategory = confirm('Вы действительно хотите удалить выбранный договор?');
if (deleteCategory) {
 jQuery.get(url, function (data) {

alert('Договор и все связанные с ним документы были успешно удалены!');
  jQuery.fn.yiiGridView.update('prosrocheniy-dogovor');
            });


}


        }



        })









                        ");

?>




<?php

$this->breadcrumbs = array(
    'Договора' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление', 'url' => array('admin')),
    array('label' => 'Создать договор', 'url' => array('create')),
);


?>
<div class="col-md-12">
    <h3>Здесь указаны срочные договора. Для просмотра Всего списка договоров - перейдите в пункт "ДОГОВОРА"</h3>

</div>


<div class="wrapper wrapper-white">


    <div class="col-md-12">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible" role="alert">
                <? if ($calendar): ?>
                    <strong></strong> У вас на текущий день заданий: <?php ;
                    echo CHtml::button($calendar . ' просмотреть', array('class' => 'btn btn-success', 'id' => 'load_calendar', 'style' => ' display:block-inline;')); ?>
                <? endif ?>
            </div>

        </div>
        <div class="row row-wider">

            <div class="row">

                <div class="col-md-12">
                    <p class="btn-toolbar btn-toolbar-demo">
                        <?php echo CHtml::button('Создать Договор', array('class' => 'btn btn-success', 'id' => 'new_dogovor', 'style' => ' display:block-inline;')); ?>
                        <?php echo CHtml::button('Создать Контрагента', array('class' => 'btn btn-warning', 'id' => 'new_contragent', 'style' => ' display:block-inline;')); ?>
                    </p>
                </div>

                <div class="col-md-12">


                    <?php
                    $this->widget('zii.widgets.grid.CGridView'
                        , array(
                            'ajaxUpdate' => true,
                            'id' => 'prosrocheniy-dogovor',
                            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                            'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                            'template' => "{summary}{items}{pager}",
                            'summaryText' => false,
                            'enablePagination' => true,
                            'enableSorting' => false,
                            'selectableRows' => 1,
                            // 'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
                            'dataProvider' => $prosrochka->ProsrocheniyDogovor(),
                            'filter' => $prosrochka,
                            'emptyText' => 'нет данных',
                            'nullDisplay' => 'нет данных',
                            // yy-mm-dd'
                            'afterAjaxUpdate' => "function() {
                                             jQuery('#Dogovor_created_date').datepicker(jQuery.extend(jQuery.datepicker.regional['ru'],{
                                            'showAnim':'fold',
                                            'dateFormat':'yy-mm-dd',
                                            'changeMonth':'true',
                                            'changeYear':'true'}));
                                             jQuery('#Dogovor_podpisan_date').datepicker(jQuery.extend(jQuery.datepicker.regional['ru'],{
                                            'showAnim':'fold',
                                            'dateFormat':'yy-mm-dd',
                                            'changeMonth':'true',
                                            'changeYear':'true'}));

                             }",
                            'pager' => array(
                                'pageSize' => 8,
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
                                    'id' => 'idx',
                                    'class' => 'CCheckBoxColumn',
                                    'selectableRows' => 1,
                                    // 'checkBoxHtmlOptions' => array('class' => 'selected_dogovor'),
                                    'checkBoxHtmlOptions' => array('class' => 'selected_dogovor', 'style' => 'height: 20px;'),

                                    'value' => '$data->id',
                                ),
                                array(
                                    'type' => 'raw',
                                    'name' => 'dogovor_number',
                                    // 'value' => '$data->Ispolnitels->name."-(".$data->dogovor_number_old.")"',
                                    'value' => function ($data) {
                                        return '<div class="dogovor_number" id="' . $data->id . '">' . $data->Ispolnitels->name . "-(" . $data->dogovor_number_old . "/" . $data->dogovor_number . ")" . '<div class="context_menu" style="color:blue;display:none;"><a name=".modal-body-edit_dogovor" href="/dogovor/update/' . $data->id . '"' . ' style="color:green" title="открыть договор для редактирования">Открыть</a> | <a  name="#modal-dialog-contragent" href="/contragent/update/' . $data->Contragents->id . '"' . ' style="color:green" title="просмотреть информацию по клиенту">Клиент</a> | <a name="delete" href="/dogovor/delete/' . $data->id . '"' . ' style="color:red" title="удалить договор и все подчиненные документы">Удалить</a></div> </div>';
                                    },
                                    'htmlOptions' => array('width' => '20%'),
                                ),

                                /*  array(
                                      'name' => 'dogovor_number',
                                      'value' => '$data->dogovor_number',
                                      'htmlOptions' => array('width' => '2%'),
                                  ),
                                */

                                'primechaniye',
                                array(
                                    'name' => 'status',
                                    'value' => '$data->status',
                                    'htmlOptions' => array('width' => '2%'),
                                ),
                                array(
                                    'name' => 'ostalos_dney',
                                    'type' => 'raw',
                                    'value' => function ($data) {
                                        if ($data->ostalos_dney > 0) {
                                            return 'осталось <span class="label label-success">' . $data->ostalos_dney . '</span>';
                                        } else {
                                            return 'просрочен<span class="label label-danger">' . $data->ostalos_dney . '</span>';
                                        }
                                    },
                                    'htmlOptions' => array('width' => '2%'),
                                ),
                                //  'podpisan_date',
                                array(
                                    'name' => 'created_date',
                                    'type' => 'raw',
                                    'value' => '$data->created_date?date("d-m-Y", strtotime($data->created_date)):"нет даты"',
                                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'model' => $prosrochka,
                                        'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                        'htmlOptions' => array('style' => 'z-index: 9999;position: relative;width:100px;'),
                                        'attribute' => 'created_date',
                                        'language' => 'ru',
                                        'options' => array(
                                            'showOn' => 'focus',
                                            'dateFormat' => 'yy-mm-dd',
                                            'showOtherMonths' => true,
                                            'selectOtherMonths' => true,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'showButtonPanel' => true,
                                        ),
                                    ), true),
                                ),
                                array(
                                    'name' => 'podpisan_date',
                                    'type' => 'raw',
                                    'value' => function($data)
                                    {

                                        if($data->podpisan_date=='0000-00-00')
                                        {

                                            return null;

                                        }
                                        else{

                                            return $data->podpisan_date;
                                        }




                                    },// '$data->podpisan_date?date("d-m-Y", strtotime($data->podpisan_date)):"нет даты"',
                                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'model' => $prosrochka,
                                        'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                        'htmlOptions' => array('style' => 'z-index: 9999;position: relative;width:100px;'),
                                        'attribute' => 'podpisan_date',
                                        'language' => 'ru',
                                        'options' => array(
                                            'showOn' => 'focus',
                                            'dateFormat' => 'yy-mm-dd',
                                            'showOtherMonths' => true,
                                            'selectOtherMonths' => true,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'showButtonPanel' => true,
                                        ),
                                    ), true),
                                ),
                                array(
                                    'name' => 'srok_ispolneniya',
                                    'type' => 'raw',
                                    'value' => '$data->srok_ispolneniya?date("d-m-Y", strtotime($data->srok_ispolneniya)):"нет даты"',
                                ),

                                /* array(
                                     'name' => 'ispolnitel_search',
                                     'value' => '$data->Ispolnitels->name',


                                 ),*/

                                array('name' => 'contragent_search',
                                    'value' => function ($data) {
                                        return '<div id="' . $data->Contragents->id . '" class="contragent">' . $data->Contragents->name . '</div>';
                                    },
                                    'type' => 'raw',
                                ),
                                /* array('name' => 'ispolnitel_search', 'value' => '$data->Ispolnitels ? $data->Ispolnitels->name: "-"',
                                  'htmlOptions' => array('class' => ''),

                                 ),*/

                                /* array('name' => 'contragent_search',
                                     'htmlOptions' => array('class' => ''),
                                 'value' => function ($data) {
                                     return '<div id="' . $data->Contragents->id ? $data->Contragents->id : "-" . '" class="label label-info contragents">' . $data->Contragents->name ? $data->Contragents->name : "-" . '</div>';
                                 },
                                 'type' => 'raw',
                                 ),*/

                                // array('name' => 'contragent_search', 'value' => '$data->Contragents ? $data->Contragents->name: "-"'),

                                /*  array(
                                      'class' => 'CButtonColumn',
                                      'htmlOptions' => array('width' => '3%'),
                                      'template' => '{updater}{contragent}{documents_folder}{delete}',
                                      'header' => 'Управление',
                                      'buttons' => array
                                      (
                                          'delete' => array
                                          (
                                              'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                                          ),

                                          'updater' => array(
                                              'htmlOptions' => array('class' => 'dogovor_in_modal'),
                                              'label' => 'Редактировать ',
                                              'url' => 'Yii::app()->createUrl("/dogovor/update",array("id"=>$data->id))',
                                              'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                                  'data' => array('id' => '$data->id')
                                              , 'success' => 'js:function(data) {
                                               jQuery(".modal-body-edit_dogovor").html(data);jQuery("#edit_dogovor").modal("show");
                                              }')),
                                              'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                                          ),


                                          'new' => array
                                          (
                                              'label' => 'Создать новый договор',
                                              'imageUrl' => Yii::app()->baseUrl . '/img/new_dogovor.png',
                                          ),
                                          'contragent' => array
                                          (
                                              'label' => 'Изменить контрагента',
                                              'htmlOptions' => array('class' => 'contragent_in_modal'),

                                              'url' => 'Yii::app()->createUrl("/contragent/update",array("id"=>$data->Contragents->id))',
                                              'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                                  'data' => array('id' => '$data->Contragents->id')
                                              , 'success' => 'js:function(data) {
                                              alert("contragent_in_modal");

                                               jQuery("#modal-body-dialog-contragent").html(data);
                                               jQuery("#modal-dialog-contragent").modal("show");

                                              }')),
                                              'imageUrl' => Yii::app()->baseUrl . '/img/clients.png',
                                          ),

                                          'documents_folder' => array
                                          (
                                              'label' => 'Папка с документами',
                                              'htmlOptions' => array('class' => 'document_folder_in_modal'),

                                              'url' => 'Yii::app()->createUrl("/dogovor/openfolder",array("id"=>$data->id))',
                                              'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                                  'data' => array('id' => '$data->id')
                                              , 'success' => 'js:function(data) {

                                               jQuery("#modal-body-dialog-contragent").html(data);
                                               jQuery("#modal-dialog-contragent").modal("show");

                                              }')),
                                              'imageUrl' => Yii::app()->baseUrl . '/img/folder.png',
                                          ),

                                          'email' => array
                                          (
                                              'label' => 'Отправить договор контрагенту',
                                              'htmlOptions' => array('class' => 'email'),
                                              'url' => 'Yii::app()->createUrl("/dogovor/EmailDogovor",array("id"=>$data->id))',
                                              'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                                  'data' => array('id' => '$data->id')
                                              , 'success' => 'js:function(data) {
                                               jQuery("#modal-body-dialog-contragent").html(data);
                                               jQuery("#modal-dialog-contragent").modal("show");

                                              }')),
                                              'imageUrl' => Yii::app()->baseUrl . '/img/email.png',
                                          ),


                                      ),
                                  ),*/
                            ),
                        )); ?>


                </div>
            </div>


        </div>


    </div>

</div>


<?php
/*
Yii::app()->clientScript->registerScript('close_edit_dogovor', "

			jQuery('#edit_dogovor').on('hidden.bs.modal', function () {

                  // удаление блокиовки договра при закрытии окна редактирования

                unblocker();

                // удаляем все данные из модальных окон при закрытии главного модального окна договора

				jQuery('#modal-body-edit_dogovor').empty();
				jQuery('#modal-body-edit_schet').empty();
				jQuery('#modal-body-edit_objectrabot').empty();
				jQuery('#modal-body-edit_vidrabot').empty();
				jQuery('#modal-body-edit_etaprabot').empty();
				jQuery('#modal-body-soglasheniye').empty();
				jQuery('#modal-body-act').empty();

				//закрываем все остальные открытые модалки
	            jQuery('#modal-body-dialog').empty();
				jQuery('#modal-dialog').modal('hide');
				//обновление основной таблицы

				   jQuery.fn.yiiGridView.update('dogovor-grid');

			}) ;  ");*/

?>

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
                                      jQuery.fn.yiiGridView.update('prosrocheniy-dogovor');

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

                Yii::app()->clientScript->registerScript('close', "
                jQuery('#modal-dialog').on('hidden.bs.modal', function () {
                // удаляем все данные из модалки при ее закрытии
                  jQuery('#modal-body-dialog').empty();
                   jQuery('.modal-body-dialog').empty();
                  jQuery('#modal-dialog').modal('hide');
                                      jQuery.fn.yiiGridView.update('prosrocheniy-dogovor');

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
                <button data-dismiss="modal" class="btn" style="width:200px;" data-target="#modal-dialog-contragent">
                    Закрыть
                </button> <?php

                Yii::app()->clientScript->registerScript('close_contragent_dialog', "
                jQuery('#modal-dialog-contragent').on('hidden.bs.modal', function () {
                // удаляем все данные из модалки при ее закрытии
                  jQuery('#modal-body-dialog-contragent').empty();
                   jQuery('.modal-body-dialog-contragent').empty();
                  jQuery('#modal-dialog-contragent').modal('hide');
                    jQuery.fn.yiiGridView.update('prosrocheniy-dogovor');
                });
               ");

                ?>
            </div>
        </div>
    </div>
</div>
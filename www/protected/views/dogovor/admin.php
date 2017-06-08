<?php // Yii::app()->clientScript->scriptMap = array('jquery.ba-bbq.js'=> false); ?>

<?php Yii::app()->getClientScript()->registerCoreScript('checkboxes'); ?>

<!-- Обновление договора начало -->
<div class="modal" id="edit_dogovor">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>-->
                <h4 class="modal-title-edit_dogovor" id="modal-title-edit_dogovor">Редактирование договора
                    <a href="#" data-dismiss="modal" class="btn" style="float:right;" data-target="#edit_dogovor">Закрыть</a>
                </h4>

            </div>

            <div class="container">


            </div>

            <div class="modal-body-edit_dogovor" id="modal-body-edit_dogovor">


            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn" data-target="#edit_dogovor">Закрыть</a>


            </div>
            <!-- <a data-toggle="modal" href="#add_schet" class="btn btn-primary">Launch modal</a>-->






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
  jQuery.fn.yiiGridView.update('dogovor-grid');
            });


}


        }



        })









                        ");

            ?>
        </div>
    </div>

</div>

<!-- Обновление договора конец  -->





<?php

// Выводим данные по выбранному договору в модалку
/*
Yii::app()->clientScript->registerScript('show_dogovor', "
$('#dogovor-grid').on('click', '.dogovor_in_modal', function(){
var url = $(this).attr('href');
$.get(url, function(response){
alert(typeof(response.status));
if(response.status ===1 )
{
//alert(response.status);

}
else
{
// $('.modal-body-edit_dogovor').html(response);
 // $('#edit_dogovor').modal('show');

}

});
return false;
}
);
");*/
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
    <h1>Управление договором</h1>

</div>


<div class="wrapper wrapper-white">
    <!-- <div class="col-md-10">
        <?php /*echo CHtml::link('Поиск', '#', array('class' => 'btn btn-primary', 'id' => 'search_info')); */ ?>
        <div class="search-form" style="display:none">
            <?php /*$this->renderPartial('_search', array(
                'model' => $model,
            )); */ ?>
        </div>

    </div>-->
    <div class="row">

        <div class="col-md-6">


            <p class="btn-toolbar btn-toolbar-demo">

                <?php echo CHtml::button('Создать Договор', array('class' => 'btn btn-success', 'id' => 'new_dogovor', 'style' => ' display:block-inline;')); ?>
                <?php echo CHtml::button('Создать Контрагента', array('class' => 'btn btn-warning', 'id' => 'new_contragent', 'style' => ' display:block-inline;')); ?>
                <?php // echo CHtml::button('+ Документ', array('class' => 'btn btn-danger', 'style' => ' display:block-inline;')); ?>
                <?php //  echo CHtml::button('Че-то еще', array('class' => 'btn btn-inverse', 'style' => ' display:block-inline;')); ?>
            </p>
        </div>

    </div>
    <div class="alert alert-info alert-dismissible" style="padding:5px;" role="alert">

    </div>
    <div class="row">


        <!-- <div class="col-md-2">
             <button type="button" class="btn btn-primary btn-xs">Редактировать договор</button>
         </div>
         <div class="col-md-2">
             <button type="button" class="btn btn-primary btn-xs">Данные контрагента</button>
         </div>
         <div class="col-md-2">
             <button type="button" class="btn btn-primary btn-xs">Папака с документами</button>
         </div>

         <div class="col-md-2">
             <button type="button" class="btn btn-danger btn-xs">Удалить договор</button>
         </div>
 -->
    </div>
    <div class="row">
        </p>

    </div>
    <div class="row row-wider">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <ul class="panel-btn">
                        <li><!--<a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen(jQuery(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a>--></li>
                    </ul>
                </div>

                <div class="panel-body">

                    <?php




                    // zii.widgets.grid.CGridView
                    //  var_dump($model);
                    $this->widget('zii.widgets.grid.CGridView', array(
                        //  'rowHtmlOptionsExpression' => 'array("id"=>$data->id)',
                        'ajaxUpdate' => true,
                        'id' => 'dogovor-grid',
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'enableSorting' => false,
                        'selectableRows' => 1,
                        // 'selectionChanged'=>'function(id){ alert($.fn.yiiGridView.getSelection(id));}',
                        // 'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'emptyText' => 'нет данных',
                        'nullDisplay' => 'нет данных',                                                                                                                                  // yy-mm-dd'
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
                            'pageSize' => 10,
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
                                    return '<div class="dogovor_number" id="' . $data->id . '">' .(string)$data->dogovor_number_old==(string)$data->dogovor_number?$data->dogovor_number:  $data->Ispolnitels->name . "-(" .$data->dogovor_number_old . "/" . $data->dogovor_number . ")" . '<div class="context_menu" style="color:blue;display:none;"><a name=".modal-body-edit_dogovor" href="/dogovor/update/' . $data->id . '"' . ' style="color:green" title="открыть договор для редактирования">Открыть</a> | <a  name="#modal-dialog-contragent" href="/contragent/update/' . $data->Contragents->id . '"' . ' style="color:green" title="просмотреть информацию по клиенту">Клиент</a> | <a name="delete" href="/dogovor/delete/' . $data->id . '"' . ' style="color:red" title="удалить договор и все подчиненные документы">Удалить</a></div> </div>';
                                },
                                'htmlOptions' => array('width' => '20%'),
                            ),
                            // 'dogovor_number_old',
                            array(
                                'name' => 'status',
                                'value' => '$data->status',
                                'htmlOptions' => array('width' => '2%'),
                            ),
                            //  'podpisan_date',


                            array(
                                'name' => 'created_date',
                                'type' => 'raw',
                                'htmlOptions' => array('width' => '2%'),
                                'value' => function($data)
                                {

                                    if($data->created_date=='0000-00-00')
                                    {

                                        return null;

                                    }
                                    else{

                                        return $data->created_date;
                                    }




                                },
                                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                    'htmlOptions' => array('style' => 'z-index: 9999;position: relative;width:70px;'),
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
                                'htmlOptions' => array('width' => '2%'),
                                'value' => function($data)
                                {

                                    if($data->podpisan_date=='0000-00-00')
                                    {

                                        return null;

                                    }
                                    else{

                                        return $data->podpisan_date;
                                    }




                                },
                                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                    'htmlOptions' => array('style' => 'z-index: 9999;position: relative;width:70px;'),
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


                          /*
                             array(
                                'name' => 'object_search',
                                'value' => 'CHtml::dropDownList("object_search","",CHtml::listData(VidRabotPoDogovoru::FindAllByDogovor($data->id),"id","adress"))',
                                'type' => 'raw'
                            ),


                            /*

                             array(
                                  'name' => 'ispolnitel_search',
                                  'value' => '$data->Ispolnitels->name',

                                /*'value' => function ($data) {
                                      return '<div id="' . $data->Ispolnitels->id . '" class="ispolnitel">' . $data->Ispolnitels->name . '</div>';
                                  },
                                  'type' => 'raw',
                            ),

                            */

                            array('name' => 'contragent_search',
                                'value' => function ($data) {
                                    return '<div id="' . $data->Contragents->id . '" class="contragent">' . $data->Contragents->name . '</div>';
                                },
                                'type' => 'raw',
                            ),
                            'primechaniye',
                            array('name' => 'document_number_search',
                                'value' => function ($data) {

                                    return '<div id="'  . '" class="">' .  '</div>';
                                },
                                'type' => 'raw',
                            ),
                             array(
                                 'class' => 'CButtonColumn',
                                 'htmlOptions' => array('width' => '3%'),
                                 'template' => '{otchet}{upload}{delete}', //{updater}{contragent}{documents_folder}{email}
                                 'header' => 'Отчёт EXCEL',
                                 'buttons' => array
                                 (
                                     'delete' => array
                                     (
                                         'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                                     ),
/*
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


                                     'contragent' => array
                                     (
                                         'label' => 'Изменить контрагента',
                                         'htmlOptions' => array('class' => 'contragent_in_modal'),
                                         'url' => 'Yii::app()->createUrl("/contragent/update",array("id"=>$data->Contragents->id))',
                                         'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                             'data' => array('id' => '$data->Contragents->id')
                                         , 'success' => 'js:function(data) {
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
                                     ),*/

                                     'otchet' => array(
                                         'htmlOptions' => array('class' => 'dogovor_in_modal'),
                                         'label' => 'Сформировать отчет в Excel ',
                                         'url' => 'Yii::app()->createUrl("/dogovor/otchet",array("id"=>$data->id))',
                                        /* 'options' => array('target'=>'_blank','ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                             'data' => array('id' => '$data->id')
                                         , 'success' => 'js:function(data) {

                                         }')),*/


                                         'options' => array('target'=>'_blank'),


                                         'imageUrl' => Yii::app()->baseUrl . '/img/excel.png',

                                     ),


                                     'upload' => array(
                                         'htmlOptions' => array('class' => 'dogovor_in_modal'),
                                         'label' => 'Импор адресов из Excel ',
                                         'url' => 'Yii::app()->createUrl("/dogovor/modal",array("id"=>$data->id))',
                                          'options' => array('target'=>'_blank','ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                              'data' => array('id' => '$data->id')
                                          , 'success' => 'js:function(data) {
                                         jQuery("#modal-body-dialog-contragent").html(data);
                                         jQuery(".modal-title").text("Импорт адресов из файла EXCEL");
                                          jQuery("#modal-dialog-contragent").modal("show");
                                          }')),





                                         'imageUrl' => Yii::app()->baseUrl . '/img/load.png',

                                     ),


                                 ),
                             ),
                        ),
                    )); ?>


                </div>


            </div>
        </div>
        <div class="row">


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

<div class="modal fade" id="modal-dialog-contragent" tabindex="-1" role="dialog"
     aria-labelledby="largeModalHead"
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

                  jQuery.fn.yiiGridView.update('dogovor-grid');

                });
               ");

                ?>
            </div>
        </div>
    </div>
</div>
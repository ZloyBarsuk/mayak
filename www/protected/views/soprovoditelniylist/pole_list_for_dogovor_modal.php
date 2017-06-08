<?php // Yii::app()->getClientScript()->registerCoreScript('add_etap'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('pole'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('delete_pole'); ?>


<div class="col-md-12">
    <?php // echo CHtml::button('Новый счет', array('class' => 'btn btn-success', 'id' => 'add_schet', 'style' => ' display:block-inline;')); ?>


</div>


<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">


    </p>

    <div class="col-md-10">
        <div class="search-form" style="display:none">

        </div>
        <!-- search-form -->

    </div>

    <div class="row row-wider">


        <?php
       //    var_dump($dataProvider_pole);
       //   exit();
        $this->widget('zii.widgets.grid.CGridView', array(
            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
            'id' => 'pole-grid',
            'ajaxType' => 'POST',
            'ajaxUpdate' => true,
            'enablePagination' => true,
            'htmlOptions' => array('class' => 'pagination'),
            'cssFile' => Yii::app()->baseUrl . '/css/table_for_modals.css',
            'dataProvider' => $dataProvider_pole,
            // 'filter' => $dataProvider_object,
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
                    // 'type' => 'raw',
                ),
               array(
                    'name' => 'Полевик1',
                    'value' => '$data->polevik_1->username',
                    'htmlOptions' => array('width' => '30%'),
                ),

               /* array('name' => 'Полевик1',
                    'value' => function ($data) {
                        $user=User::model()->findAll(array("select"=>"username", "order"=>"fieldMake DESC",'condition'=>"t.id=:role", 'params'=>array(":role"=>$data->id_polevik_1)));
                        return '<div id="' .$user->username. '" class="contragent">' . $user->username. '</div>';
                    },
                    'type' => 'raw',
                ),*/
                array(
                    'name' => 'Полевик2',
                    'value' => '$data->polevik_2->username',
                    'htmlOptions' => array('width' => '30%'),
                ),
               /* array(
                    'name' => 'data_sdachii_kameralka',
                    'value' => 'date("d/m/y", strtotime($data->data_sdachii_kameralka))',
                    'htmlOptions' => array('width' => '30%'),
                ),*/
                array(
                    'name' => 'data_vidachi_pole',
                   // 'value' => 'date("d/m/y", strtotime($data->data_vidachi_pole))',
                    'value' => function($data)
                    {

                        if($data->data_vidachi_pole=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_vidachi_pole);
                        }




                    },

                    'htmlOptions' => array('width' => '30%'),
                ),
                array(
                    'name' => 'data_sdachi_pole',
                  //  'value' => 'date("d/m/y", strtotime($data->data_sdachi_pole))',
                    'value' => function($data)
                    {

                        if($data->data_sdachi_pole=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_sdachi_pole);
                        }




                    },
                    'htmlOptions' => array('width' => '30%'),
                ),

                array(
                    'name' => 'Камералка',
                    'value' => '$data->kameralka->username',
                    'htmlOptions' => array('width' => '30%'),
                ),
                array(
                    'name' => 'data_vidachi_kameralka',
                   // 'value' => 'date("d/m/y", strtotime($data->data_vidachi_kameralka))',
                    'value' => function($data)
                    {

                        if($data->data_vidachi_kameralka=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_vidachi_kameralka);
                        }




                    },
                    'htmlOptions' => array('width' => '30%'),
                ),
                array(
                    'name' => 'data_sdachii_kameralka',
                    'type'=>'raw',
                   // 'value' => 'date("d/m/y", strtotime($data->data_sdachii_kameralka))',
                    'value' => function($data)
                    {

                        if($data->data_sdachii_kameralka=='0000-00-00')
                        {

                            return null;

                        }
                        else{

                            return Yii::app()->dateFormatter->format('dd.MMMM.yyyy', $data->data_sdachii_kameralka);
                        }




                    },
                    'htmlOptions' => array('width' => '30%'),
                ),


                array(
                    'name' => 'Межевой',
                    'value' => '$data->mejevoy->username',
                    'htmlOptions' => array('width' => '30%'),
                ),


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
                    'template' => '{update_my_pole}{delete_my_pole}',

                    'header' => 'Управление',
                    // 'deleteButtonOptions' => array("id" => rand(0, 999999)),
                    //'updateButtonOptions' => array(/*"id" => rand(999999, 99999999)*/, "class" => 'update'),
                    'updateButtonOptions' => array("class" => 'update'),
                    //  'deleteButtonOptions' => array("class" => 'delete_item'),

                    'buttons' => array
                    (

                        'delete_my_pole' => array(
                            'imageUrl' => Yii::app()->baseUrl . '/img/delete_modal.png',
                            'options' => array('class' => 'delete_item_pole'),
                            'url' => 'CController::createUrl("/soprovoditelniylist/delete", array("id"=>$data->id))',
                            'click' => 'js:function(evt){ /*evt.preventDefault();*/}',


                        ),


                        'update_my_pole' => array
                        (
                            'imageUrl' => Yii::app()->baseUrl . '/img/edit_modal.png',
                            'options' => array('class' => 'update_item_pole'),
                            'url' => 'CController::createUrl("/soprovoditelniylist/update", array("id"=>$data->id))',
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



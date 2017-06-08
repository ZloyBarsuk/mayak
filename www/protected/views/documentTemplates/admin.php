<?php
/* @var $this DocumentTemplatesController */
/* @var $model DocumentTemplates */

$this->breadcrumbs = array(
    'Шаблоны' => array('admin'),
    'Управление',
);


$this->menu=array(

    array('label'=>'Добавить', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#document-templates-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление шаблонами документов</h1>
</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">

        <?php

        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,

            'htmlOptions' => array('class' => 'btn-group'),

            'itemTemplate' => '{menu}',
            'itemCssClass' => 'btn btn-warning btn-clean',


        ));
        ?>
        <!-- search-form -->

    </div>

    <div class="row row-wider">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a></li>
                    </ul>
                </div>

                <div class="panel-body">

                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'ajaxUpdate'=>true,
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
                        'id' => 'document-templates-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(
                         //   'id',
                            'title',
                            // 'content',
                         //   'actualnost',
                            'type',
                            'parent_title',
                            'date',
                            array(
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '5%'),
                                'header' => 'Управление',
                                'template' => '{update}{delete}{copy}',

                                'buttons' => array
                                (

                                    'update' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/edit.png',
                                    ),


                                    'delete' => array
                                    (

                                        'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',

                                    ),
                                    'copy' => array
                                    (
                                        'label' => 'Копировать шаблон',
                                        'htmlOptions' => array('class' => 'contragent_in_modal'),

                                        'url' => 'Yii::app()->createUrl("/documenttemplates/copy",array("id"=>$data->id))',
                                        'options' => array('ajax' => array('dataType' => 'html', 'type' => 'POST', 'url' => 'js:jQuery(this).attr("href")',
                                            'data' => array('id' => '$data->id')
                                        , 'success' => 'js:function(data) {
                                        alert(data.message);

                                      jQuery.fn.yiiGridView.update("document-templates-grid");


                                        // jQuery("#modal-body-dialog-contragent").html(data);
                                        // jQuery("#modal-dialog-contragent").modal("show");

                                        }')),
                                        'imageUrl' => Yii::app()->baseUrl . '/img/copy.png',
                                    ),

                                ),
                            ),
                        ),
                    )); ?>


                </div>


            </div>
        </div>

    </div>

</div>

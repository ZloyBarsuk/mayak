<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */

$this->breadcrumbs=array(
	'Исполнители'=>array('index'),
	'Управление',
);

$this->menu=array(
//array('label'=>'List Ispolnitel', 'url'=>array('index')),
array('label'=>'Создать нового', 'url'=>array('create')),
    array('label'=>'Управление', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#ispolnitel-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Все договора по исполнителю</h1>

</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">
       <!-- <div class="row">
            <?php
/*
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,

                'htmlOptions' => array('class' => 'btn-group'),

                'itemTemplate' => '{menu}',
                'itemCssClass' => 'btn btn-warning btn-clean',


            ));
            */?>
        </div>-->
        <?php //echo CHtml::link('Поиск','#',array('class'=>'btn btn-primary','id'=>'search_info')); ?>
        <div class="search-form" style="display:none">

        </div><!-- search-form -->

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

                    <?php
                 //  var_dump($dogovor_info);
                     // exit;
                    $columns = array(
                        array(
                            'header'=>CHtml::encode('Исполнитель'),
                            'name'=>'name',
                        ),
                        array(
                            'header'=>CHtml::encode('Номер'),
                            'name'=>'dogovor_number',
                        ),
                        array(
                            'header'=>CHtml::encode('Заказчик'),
                            'name'=>'contragent_name',
                        ),
                        array(
                            'header'=>CHtml::encode('Сумма'),
                            'name'=>'summa_dogovora_nachalnaya',
                        ),

                        array(
                            'header'=>CHtml::encode('Дата'),
                            'name'=>'created_date',
                        ),
                        array(
                            'class'=>'zii.widgets.grid.CButtonColumn',
                            'deleteButtonImageUrl'=>Yii::app()->baseUrl . '/img/delete.png',
                            'viewButtonImageUrl'=>Yii::app()->baseUrl . '/img/search.png',
                            'updateButtonImageUrl'=>Yii::app()->baseUrl . '/img/edit.png',
                            'htmlOptions' => array('width' => '10%'),
                            'viewButtonUrl'=>'Yii::app()->createUrl("/mycontroller/view", array("id"=>$data["summa_dogovora_nachalnaya"]))',
                            'updateButtonUrl'=>'Yii::app()->createUrl("/mycontroller/update", array("id"=>$data["dogovor_number"]))',
                            'deleteButtonUrl'=>'Yii::app()->createUrl("/mycontroller/delete", array("id"=>$data["contragent_name"]))',
                        ),


                    );

                    $this->widget('zii.widgets.grid.CGridView', array(
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'id' => 'dogovor-grid',
                        'dataProvider'=>$dogovor_info,
                        'filter'=>$filtersForm,
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


                        'columns'=>$columns,
                      /*  'columns'=>array(
                            array(
                                'header'=>'Исполнитель',
                                'name'=>'Исполнитель',
                                'value'=>'$data["name"]==""?"":$data["name"]',
                                'htmlOptions' => array('width' => '5%'),

                            ),
                            array(
                                'header'=>'Заказчик',
                                'name'=>'Заказчик',
                                'value'=>'$data["contragent_name"]==""?"":$data["contragent_name"]',
                                'htmlOptions' => array('width' => '40%'),
                            ),

                            array(
                                'header'=>'Номер',
                                'name'=>'$data["dogovor_number"]',
                                'value'=>'$data["dogovor_number"]',
                                'htmlOptions' => array('width' => '6%'),
                            ),
                            array(
                                'header'=>'Сумма',
                                //'name'=>'paid',
                                'value'=>'$data["summa_dogovora_nachalnaya"]==""?0:$data["summa_dogovora_nachalnaya"]',
                                'htmlOptions' => array('width' => '5%'),
                            ),
                            array(
                                'header'=>'Дата',
                                'name'=>'created_date',
                                'value'=>'$data["created_date"]',
                                 'htmlOptions' => array('width' => '10%'),
                                 ),
                            array(
                                'class'=>'zii.widgets.grid.CButtonColumn',
                                'deleteButtonImageUrl'=>Yii::app()->baseUrl . '/img/delete.png',
                                'viewButtonImageUrl'=>Yii::app()->baseUrl . '/img/search.png',
                                'updateButtonImageUrl'=>Yii::app()->baseUrl . '/img/edit.png',
                                'htmlOptions' => array('width' => '10%'),
                                'viewButtonUrl'=>'Yii::app()->createUrl("/mycontroller/view", array("id"=>$data["summa_dogovora_nachalnaya"]))',
                                'updateButtonUrl'=>'Yii::app()->createUrl("/mycontroller/update", array("id"=>$data["dogovor_number"]))',
                                'deleteButtonUrl'=>'Yii::app()->createUrl("/mycontroller/delete", array("id"=>$data["contragent_name"]))',
                            ),


                        ),*/
                    ));



                    ?>


                </div>


            </div>
        </div>

    </div>

</div>

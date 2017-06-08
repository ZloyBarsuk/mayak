<?php
/* @var $this SprGosOrganController */
/* @var $model SprGosOrgan */

$this->breadcrumbs=array(
	'Гос органы'=>array('admin'),
	'Управление',
);

$this->menu=array(
//array('label'=>'List SprGosOrgan', 'url'=>array('index')),
array('label'=>'Создать новый', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#spr-gos-organ-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление Гос. органами</h1>

</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">
        <div class="row">
            <?php

            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,

                'htmlOptions' => array('class' => 'btn-group'),

                'itemTemplate' => '{menu}',
                'itemCssClass' => 'btn btn-warning btn-clean',


            ));
            ?>
        </div>
        <?php echo CHtml::link('Поиск','#',array('class'=>'btn btn-primary','id'=>'search_info')); ?>
        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
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

                    <?php                    $this->widget('zii.widgets.grid.CGridView', array(
                    'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                    'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                    'template' => "\n{summary}\n{items}\n{pager}",
                    'summaryText' => false,
                    'enablePagination' => true,
                    'id' => 'user-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
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
                    'id'=>'spr-gos-organ-grid',
                    'dataProvider'=>$model->search(),
                    'filter'=>$model,
                    'columns'=>array(

                        array(
                            'name'=>'id',
                            'htmlOptions'=>array('width'=>'5%'),
                        ),

                       /* array(
                            'name'=>'id_rayon',
                            'htmlOptions'=>array('width'=>'2%'),
                        ),*/

                        array('name' => 'rayon_search',
                            'value' => function ($data) {
                                return '<div id="' . $data->Rayon->id . '" class="contragent">' . $data->Rayon->naimenovaniye . '</div>';
                            },
                            'type' => 'raw',
                        ),
                        array(
                            'name'=>'uchreghdenie',
                            'htmlOptions'=>array('width'=>'20%'),
                        ),
                        array(
                            'name'=>'fio_nachalnik_otdela',
                            'htmlOptions'=>array('width'=>'20%'),
                        ),
                        array(
                            'name'=>'adress',
                            'htmlOptions'=>array('width'=>'20%'),
                        ),
                        array(
                            'name'=>'cell_phone',
                            'htmlOptions'=>array('width'=>'15%'),
                        ),


		/*
		'phone',
		*/
                    array(
                    'class' => 'CButtonColumn',
                    'htmlOptions'=>array('width'=>'5%'),
                    'header'=>'Управление',
                        'template' => "{update}{delete}",
                    'buttons' => array
                    (

                    'delete' => array
                    (
                    'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                    ),
                    'update' => array
                    (
                    'imageUrl' => Yii::app()->baseUrl . '/img/edit.png',
                    ),

                    'view' => array
                    (
                    'imageUrl' => Yii::app()->baseUrl . '/img/search.png',
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

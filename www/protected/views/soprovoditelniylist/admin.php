<?php
/* @var $this SoprovoditelniylistController */
/* @var $model SoprovoditelniyList */

$this->breadcrumbs=array(
	'Soprovoditelniy Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List SoprovoditelniyList', 'url'=>array('index')),
array('label'=>'Create SoprovoditelniyList', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#soprovoditelniy-list-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление Soprovoditelniy Lists</h1>

</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">
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
                    'id'=>'soprovoditelniy-list-grid',
                    'dataProvider'=>$model->search(),
                    'filter'=>$model,
                    'columns'=>array(
                    		'id',
		'id_objecta',
		'id_polevik_1',
		'id_polevik_2',
		'id_kameralka',
		'id_mejevoy',
		/*
		'id_proveril_pole',
		'id_proveril_mejevoy',
		'id_proveril_kameralka',
		'data_vidachi_pole',
		'data_sdachi_pole',
		'data_sdachi_mejevoy',
		'data_vidachi_kameralka',
		'data_sdachii_kameralka',
		*/
                    array(
                    'class' => 'CButtonColumn',
                    'htmlOptions'=>array('width'=>'100%'),
                    'header'=>'Управление',
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

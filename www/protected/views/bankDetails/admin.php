<?php
/* @var $this BankDetailsController */
/* @var $model BankDetails */

$this->breadcrumbs=array(
	'Bank Details'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List BankDetails', 'url'=>array('index')),
array('label'=>'Create BankDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#bank-details-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление Bank Details</h1>

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
                    'id'=>'bank-details-grid',
                    'dataProvider'=>$model->search(),
                    'filter'=>$model,
                    'columns'=>array(
                    		'id',
		'id_bank',
		'inn',
		'id_author',
		'kpp',
		'yur_address',
		/*
		'fiz_address',
		'ogrm',
		'r_s',
		'k_s',
		'bic',
		'swift',
		'account_type',
		'record_date',
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

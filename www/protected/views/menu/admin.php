<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs = array(
    'Меню' => array('menu'),
    'Администрирование',
);

$this->menu = array(
    array('label' => 'List Menu', 'url' => array('index')),
    array('label' => 'Create Menu', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#menu-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление меню</h1>
</div>


<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */ ?><!--
<div class="search-form" style="display:none">
    <?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */ ?>
</div>--><!-- search-form -->
<div class="wrapper wrapper-white">
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
                        'id' => 'menu-grid',
                        'filter' => $model,
                        'dataProvider' => $model->search(),
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

                            array('name' => 'name',
                                'value' => '$data->name',
                                'visible' => '1',
                                'htmlOptions' => array('font-color' => 'red', 'width' => '50%'),

                            ),
                            array('name' => 'name',
                                'value' => '$data->id_parent?$data->findByPk($data->id_parent)->name:\'\'',
                                'visible' => '1',
                                'filter' => false,

                                'header' => 'родительская категория',
                                'htmlOptions' => array('font-color' => 'red', 'width' => '50%'),
                            ),
                            //	'name',
                            'url',
                            //	'image_path',
                            array(
                                'template' => '{update}{delete}',
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '100%'),
                                'header' => 'Управление',
                                'deleteConfirmation' => 'Уверены, что нужно удалить объект?',
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

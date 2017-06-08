<?php
    /* @var $this SoprovoditelniylistController */
    /* @var $model SoprovoditelniyList */

$this->breadcrumbs=array(
	'Soprovoditelniy Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список SoprovoditelniyList', 'url'=>array('index')),
    array('label'=>'Создать SoprovoditelniyList', 'url'=>array('create')),
    array('label'=>'Просмотр SoprovoditelniyList', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление SoprovoditelniyList', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  SoprovoditelniyList <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
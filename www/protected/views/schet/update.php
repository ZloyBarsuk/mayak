<?php
    /* @var $this SchetController */
    /* @var $model Schet */

$this->breadcrumbs=array(
	'Schets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список Schet', 'url'=>array('index')),
    array('label'=>'Создать Schet', 'url'=>array('create')),
    array('label'=>'Просмотр Schet', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление Schet', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  Schet <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model),false,true); ?>
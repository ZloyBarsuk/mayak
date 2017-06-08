<?php
    /* @var $this ObjectRabotController */
    /* @var $model ObjectRabot */

$this->breadcrumbs=array(
	'Object Rabots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список ObjectRabot', 'url'=>array('index')),
    array('label'=>'Создать ObjectRabot', 'url'=>array('create')),
    array('label'=>'Просмотр ObjectRabot', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление ObjectRabot', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  ObjectRabot <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model),false,true); ?>
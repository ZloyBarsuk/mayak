<?php
    /* @var $this DopSoglasheniyeController */
    /* @var $model DopSoglasheniye */

$this->breadcrumbs=array(
	'Dop Soglasheniyes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список DopSoglasheniye', 'url'=>array('index')),
    array('label'=>'Создать DopSoglasheniye', 'url'=>array('create')),
    array('label'=>'Просмотр DopSoglasheniye', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление DopSoglasheniye', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  DopSoglasheniye <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
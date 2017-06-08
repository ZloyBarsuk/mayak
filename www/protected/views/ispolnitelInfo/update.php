<?php
    /* @var $this IspolnitelInfoController */
    /* @var $model IspolnitelInfo */

$this->breadcrumbs=array(
	'Ispolnitel Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список IspolnitelInfo', 'url'=>array('index')),
    array('label'=>'Создать IspolnitelInfo', 'url'=>array('create')),
    array('label'=>'Просмотр IspolnitelInfo', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление IspolnitelInfo', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  IspolnitelInfo <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
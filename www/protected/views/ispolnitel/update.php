<?php
    /* @var $this IspolnitelController */
    /* @var $model Ispolnitel */

$this->breadcrumbs=array(
	'Исполнители'=>array('admin'),
	$model->name=>array('admin','id'=>$model->id),
	'Обновить',
);

    $this->menu=array(
   // array('label'=>'Список Ispolnitel', 'url'=>array('index')),
    array('label'=>'Создать', 'url'=>array('create')),
 //   array('label'=>'Просмотр Ispolnitel', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  " <?php echo $model->name; ?>"</h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
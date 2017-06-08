<?php
    /* @var $this SprVidRabotController */
    /* @var $model SprVidRabot */

$this->breadcrumbs=array(
	'Spr Vid Rabots'=>array('admin'),
	$model->id_rabot=>array('view','id'=>$model->id_rabot),
	'Обновить',
);

    $this->menu=array(
   // array('label'=>'Список SprVidRabot', 'url'=>array('index')),
    array('label'=>'Создать ', 'url'=>array('create')),
 //   array('label'=>'Просмотр SprVidRabot', 'url'=>array('view', 'id'=>$model->id_rabot)),
    array('label'=>'Управление ', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить   <?php echo $model->id_rabot; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
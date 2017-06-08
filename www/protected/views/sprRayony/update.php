<?php
    /* @var $this SprRayonyController */
    /* @var $model SprRayony */

$this->breadcrumbs=array(
	'Управление'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Обновить',
);

    $this->menu=array(
        array('label'=>'Создать', 'url'=>array('create')),

        array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить   <?php echo $model->naimenovaniye; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
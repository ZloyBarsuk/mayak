<?php
    /* @var $this TipSchetaController */
    /* @var $model TipScheta */

$this->breadcrumbs=array(
	'Тип счета'=>array('admin'),
	$model->id=>array('update','id'=>$model->id),
	'Обновить',
);

$this->menu=array(

    array('label'=>'Создать', 'url'=>array('create')),

    array('label'=>'Управление', 'url'=>array('admin')),
);
    ?>

   <div class="col-md-12">
        <h1>
        Обновить   <?php echo $model->naimenovanie; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
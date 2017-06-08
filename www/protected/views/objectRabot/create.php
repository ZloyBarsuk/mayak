<?php
/* @var $this ObjectRabotController */
/* @var $model ObjectRabot */

$this->breadcrumbs=array(
	'Объекты работ по договору'=>array('admin'),
	'Создать',
);

$this->menu=array(
	// array('label'=>'Список объектов работ', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">

		</div>
<?php $this->render('_form', array('model'=>$model)); ?>

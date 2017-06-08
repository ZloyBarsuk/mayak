<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */

$this->breadcrumbs=array(
	'Исполнители'=>array('index'),
	'Создать',
);

$this->menu=array(
	//array('label'=>'List Ispolnitel', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

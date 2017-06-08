<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs=array(
	'Schets'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List Schet', 'url'=>array('index')),
	array('label'=>'Manage Schet', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать Счет</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model),false,true); ?>


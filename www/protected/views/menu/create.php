<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Меню'=>array('menu'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список меню', 'url'=>array('menu')),
	array('label'=>'Управление меню', 'url'=>array('admin')),
);
?>
	<div class="col-md-12">
		<h1>Создание нового пункта меню</h1>
	</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
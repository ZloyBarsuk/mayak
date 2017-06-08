<?php
/* @var $this SprPrilojeniyaController */
/* @var $model SprPrilojeniya */

$this->breadcrumbs=array(
	'Приложения'=>array('admin'),
	'Создать',
);

$this->menu=array(
	// array('label'=>'List SprZatrat', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать новый элемент</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
/* @var $this SprVidRabotController */
/* @var $model SprVidRabot */

$this->breadcrumbs=array(
	'Управление'=>array('admin'),
	'Создать',
);

$this->menu=array(
	//array('label'=>'List SprVidRabot', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать новый элемент</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

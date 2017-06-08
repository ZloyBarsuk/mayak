<?php
/* @var $this SprRayonyController */
/* @var $model SprRayony */

$this->breadcrumbs=array(
	'Управление'=>array('admin'),
	'Создать',
);

$this->menu=array(
	//array('label'=>'List SprRayony', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать новый элемент</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

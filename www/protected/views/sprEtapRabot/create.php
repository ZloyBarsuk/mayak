<?php
/* @var $this SprEtapRabotController */
/* @var $model SprEtapRabot */

$this->breadcrumbs=array(
	'Этап работ'=>array('admin'),
	'Создать',
);

$this->menu=array(
	// array('label'=>'List SprZatrat', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать новый</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

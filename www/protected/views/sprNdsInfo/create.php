<?php
/* @var $this SprNdsInfoController */
/* @var $model SprNdsInfo */

$this->breadcrumbs=array(
	'Справочник НДС'=>array('index'),
	'Создать',
);

$this->menu=array(
	//array('label'=>'List SprNdsInfo', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать элемент</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

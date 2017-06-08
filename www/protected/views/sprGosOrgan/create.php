<?php
/* @var $this SprGosOrganController */
/* @var $model SprGosOrgan */

$this->breadcrumbs=array(
	'Гос.Органы'=>array('admin'),
	'Создать',
);

$this->menu=array(
	//array('label'=>'List SprGosOrgan', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать новый</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

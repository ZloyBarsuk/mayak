<?php
/* @var $this DogovorController */
/* @var $model Dogovor */

$this->breadcrumbs=array(
	'Dogovors'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List Dogovor', 'url'=>array('index')),
	array('label'=>'Manage Dogovor', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать Dogovor</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

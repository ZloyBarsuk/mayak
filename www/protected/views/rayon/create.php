<?php
/* @var $this RayonController */
/* @var $model Rayon */

$this->breadcrumbs=array(
	'Rayons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rayon', 'url'=>array('index')),
	array('label'=>'Manage Rayon', 'url'=>array('admin')),
);
?>

<h1>Create Rayon</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
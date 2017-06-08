<?php
/* @var $this ContragentController */
/* @var $model Contragent */

$this->breadcrumbs=array(
	'Contragents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contragent', 'url'=>array('index')),
	array('label'=>'Manage Contragent', 'url'=>array('admin')),
);
?>

<h1>Create Contragent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
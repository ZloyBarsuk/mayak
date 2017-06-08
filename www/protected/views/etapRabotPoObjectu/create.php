<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $model EtapRaborPoObjectu */

$this->breadcrumbs=array(
	'Etap Rabor Po Objectus'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List EtapRaborPoObjectu', 'url'=>array('index')),
	array('label'=>'Manage EtapRaborPoObjectu', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать EtapRaborPoObjectu</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

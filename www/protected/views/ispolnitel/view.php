<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */

$this->breadcrumbs=array(
	'Ispolnitels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ispolnitel', 'url'=>array('index')),
	array('label'=>'Create Ispolnitel', 'url'=>array('create')),
	array('label'=>'Update Ispolnitel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ispolnitel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ispolnitel', 'url'=>array('admin')),
);
?>

<h1>View Ispolnitel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'comment',
		'type',
	),
)); ?>

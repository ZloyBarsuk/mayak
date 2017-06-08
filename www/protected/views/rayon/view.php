<?php
/* @var $this RayonController */
/* @var $model Rayon */

$this->breadcrumbs=array(
	'Rayons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Rayon', 'url'=>array('index')),
	array('label'=>'Create Rayon', 'url'=>array('create')),
	array('label'=>'Update Rayon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Rayon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rayon', 'url'=>array('admin')),
);
?>

<h1>View Rayon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naimenovaniye',
	),
)); ?>

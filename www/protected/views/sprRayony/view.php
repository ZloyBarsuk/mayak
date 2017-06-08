<?php
/* @var $this SprRayonyController */
/* @var $model SprRayony */

$this->breadcrumbs=array(
	'Spr Rayonies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprRayony', 'url'=>array('index')),
	array('label'=>'Create SprRayony', 'url'=>array('create')),
	array('label'=>'Update SprRayony', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprRayony', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprRayony', 'url'=>array('admin')),
);
?>

<h1>View SprRayony #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naimenovaniye',
	),
)); ?>

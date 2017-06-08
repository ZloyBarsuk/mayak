<?php
/* @var $this SprZatratController */
/* @var $model SprZatrat */

$this->breadcrumbs=array(
	'Spr Zatrats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprZatrat', 'url'=>array('index')),
	array('label'=>'Create SprZatrat', 'url'=>array('create')),
	array('label'=>'Update SprZatrat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprZatrat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprZatrat', 'url'=>array('admin')),
);
?>

<h1>View SprZatrat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naimenovaniye',
	),
)); ?>

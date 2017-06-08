<?php
/* @var $this SprNdsInfoController */
/* @var $model SprNdsInfo */

$this->breadcrumbs=array(
	'Spr Nds Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprNdsInfo', 'url'=>array('index')),
	array('label'=>'Create SprNdsInfo', 'url'=>array('create')),
	array('label'=>'Update SprNdsInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprNdsInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprNdsInfo', 'url'=>array('admin')),
);
?>

<h1>View SprNdsInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'stavka_nds',
		'record_date',
	),
)); ?>

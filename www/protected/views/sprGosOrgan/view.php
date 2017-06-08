<?php
/* @var $this SprGosOrganController */
/* @var $model SprGosOrgan */

$this->breadcrumbs=array(
	'Spr Gos Organs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprGosOrgan', 'url'=>array('index')),
	array('label'=>'Create SprGosOrgan', 'url'=>array('create')),
	array('label'=>'Update SprGosOrgan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprGosOrgan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprGosOrgan', 'url'=>array('admin')),
);
?>

<h1>View SprGosOrgan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_rayon',
		'uchreghdenie',
		'fio_nachalnik_otdela',
		'adress',
		'cell_phone',
		'phone',
	),
)); ?>

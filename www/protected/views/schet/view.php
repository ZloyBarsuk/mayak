<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs=array(
	'Schets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Schet', 'url'=>array('index')),
	array('label'=>'Create Schet', 'url'=>array('create')),
	array('label'=>'Update Schet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Schet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Schet', 'url'=>array('admin')),
);
?>

<h1>View Schet #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dogovor',
		'author_id',
		'id_dopsoglasheniya',
		'tip_oplati',
		'summa',
		'nds',
		'status',
		'data_scheta',
		'data_oplati',
		'schet_tip',
		'comment',
	),
)); ?>

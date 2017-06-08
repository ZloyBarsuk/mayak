<?php
/* @var $this ContragentController */
/* @var $model Contragent */

$this->breadcrumbs=array(
	'Contragents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Contragent', 'url'=>array('index')),
	array('label'=>'Create Contragent', 'url'=>array('create')),
	array('label'=>'Update Contragent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Contragent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contragent', 'url'=>array('admin')),
);
?>

<h1>View Contragent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
	),
)); ?>

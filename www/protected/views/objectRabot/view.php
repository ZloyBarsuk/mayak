<?php
/* @var $this ObjectRabotController */
/* @var $model ObjectRabot */

$this->breadcrumbs=array(
	'Object Rabots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ObjectRabot', 'url'=>array('index')),
	array('label'=>'Create ObjectRabot', 'url'=>array('create')),
	array('label'=>'Update ObjectRabot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ObjectRabot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ObjectRabot', 'url'=>array('admin')),
);
?>

<h1>View ObjectRabot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'adress',
		'plochad_rabot',
		'id_dogovor',
		'archiv_number',
		'id_rayon',
		'id_avtor',
	),
)); ?>

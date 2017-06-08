<?php
/* @var $this SprEtapRabotController */
/* @var $model SprEtapRabot */

$this->breadcrumbs=array(
	'Spr Etap Rabots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprEtapRabot', 'url'=>array('index')),
	array('label'=>'Create SprEtapRabot', 'url'=>array('create')),
	array('label'=>'Update SprEtapRabot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprEtapRabot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprEtapRabot', 'url'=>array('admin')),
);
?>

<h1>View SprEtapRabot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'etap_rabot',
		'comment',
		'actualnost',
	),
)); ?>

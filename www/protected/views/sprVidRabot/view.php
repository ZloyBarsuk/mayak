<?php
/* @var $this SprVidRabotController */
/* @var $model SprVidRabot */

$this->breadcrumbs=array(
	'Spr Vid Rabots'=>array('index'),
	$model->id_rabot,
);

$this->menu=array(
	array('label'=>'List SprVidRabot', 'url'=>array('index')),
	array('label'=>'Create SprVidRabot', 'url'=>array('create')),
	array('label'=>'Update SprVidRabot', 'url'=>array('update', 'id'=>$model->id_rabot)),
	array('label'=>'Delete SprVidRabot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rabot),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprVidRabot', 'url'=>array('admin')),
);
?>

<h1>View SprVidRabot #<?php echo $model->id_rabot; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rabot',
		'naimenovaniye',
		'procent_ot_summi',
		'actualnost',
	),
)); ?>

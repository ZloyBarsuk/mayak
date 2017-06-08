<?php
/* @var $this TipSchetaController */
/* @var $model TipScheta */

$this->breadcrumbs=array(
	'Tip Schetas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipScheta', 'url'=>array('index')),
	array('label'=>'Create TipScheta', 'url'=>array('create')),
	array('label'=>'Update TipScheta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipScheta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipScheta', 'url'=>array('admin')),
);
?>

<h1>View TipScheta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naimenovanie',
	),
)); ?>

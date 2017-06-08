<?php
/* @var $this SprPrilojeniyaController */
/* @var $model SprPrilojeniya */

$this->breadcrumbs=array(
	'Spr Prilojeniyas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SprPrilojeniya', 'url'=>array('index')),
	array('label'=>'Create SprPrilojeniya', 'url'=>array('create')),
	array('label'=>'Update SprPrilojeniya', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SprPrilojeniya', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SprPrilojeniya', 'url'=>array('admin')),
);
?>

<h1>View SprPrilojeniya #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'vid_prilojeniya',
	),
)); ?>

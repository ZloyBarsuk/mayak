<?php
/* @var $this DogovorHistoryController */
/* @var $model DogovorHistory */

$this->breadcrumbs=array(
	'Dogovor Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DogovorHistory', 'url'=>array('index')),
	array('label'=>'Create DogovorHistory', 'url'=>array('create')),
	array('label'=>'Update DogovorHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DogovorHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DogovorHistory', 'url'=>array('admin')),
);
?>

<h1>View DogovorHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dogovor',
		'old_info',
		'new_info',
		'date_modified',
	),
)); ?>

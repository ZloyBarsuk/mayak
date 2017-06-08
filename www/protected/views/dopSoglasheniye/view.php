<?php
/* @var $this DopSoglasheniyeController */
/* @var $model DopSoglasheniye */

$this->breadcrumbs=array(
	'Dop Soglasheniyes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DopSoglasheniye', 'url'=>array('index')),
	array('label'=>'Create DopSoglasheniye', 'url'=>array('create')),
	array('label'=>'Update DopSoglasheniye', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DopSoglasheniye', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DopSoglasheniye', 'url'=>array('admin')),
);
?>

<h1>View DopSoglasheniye #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dogovor',
		'number',
		'comment',
		'name',
		'author_id',
		'data_podpisaniya',
		'data_vneseniya',
		'summa',
		'nds',
		'type',
	),
)); ?>

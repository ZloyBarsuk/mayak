<?php
/* @var $this SoprovoditelniylistController */
/* @var $model SoprovoditelniyList */

$this->breadcrumbs=array(
	'Soprovoditelniy Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SoprovoditelniyList', 'url'=>array('index')),
	array('label'=>'Create SoprovoditelniyList', 'url'=>array('create')),
	array('label'=>'Update SoprovoditelniyList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SoprovoditelniyList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SoprovoditelniyList', 'url'=>array('admin')),
);
?>

<h1>View SoprovoditelniyList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_objecta',
		'id_polevik_1',
		'id_polevik_2',
		'id_kameralka',
		'id_mejevoy',
		'id_proveril_pole',
		'id_proveril_mejevoy',
		'id_proveril_kameralka',
		'data_vidachi_pole',
		'data_sdachi_pole',
		'data_sdachi_mejevoy',
		'data_vidachi_kameralka',
		'data_sdachii_kameralka',
	),
)); ?>

<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $model EtapRaborPoObjectu */

$this->breadcrumbs=array(
	'Etap Rabor Po Objectus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EtapRaborPoObjectu', 'url'=>array('index')),
	array('label'=>'Create EtapRaborPoObjectu', 'url'=>array('create')),
	array('label'=>'Update EtapRaborPoObjectu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EtapRaborPoObjectu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EtapRaborPoObjectu', 'url'=>array('admin')),
);
?>

<h1>View EtapRaborPoObjectu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_objecta',
		'id_spr_etap_rabot',
		'id_otvetstvennogo',
		'data_nachala_rabot',
		'data_okonchaniya_rabot',
		'document_number',
		'srok_dney',
		'comment',
		'status',
	),
)); ?>

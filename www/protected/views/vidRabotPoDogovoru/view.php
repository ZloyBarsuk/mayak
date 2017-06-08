<?php
/* @var $this VidRaborPoDogovoruController */
/* @var $model VidRaborPoDogovoru */

$this->breadcrumbs=array(
	'Vid Rabor Po Dogovorus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VidRaborPoDogovoru', 'url'=>array('index')),
	array('label'=>'Create VidRaborPoDogovoru', 'url'=>array('create')),
	array('label'=>'Update VidRaborPoDogovoru', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VidRaborPoDogovoru', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VidRaborPoDogovoru', 'url'=>array('admin')),
);
?>

<h1>View VidRaborPoDogovoru #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dogovor',
		'id_vid_rabot',
		'id_otvetstvennogo',
		'comment',
		'vid_dney',
		'data',
		'summa',
		'nds_summa',
		'status',
		'srok_ispolneniya',
		'data_nachala',
		'data_okonchaniya',
		'nds',
	),
)); ?>

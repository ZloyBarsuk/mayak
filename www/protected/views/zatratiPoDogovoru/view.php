<?php
/* @var $this ZatratiPoDogovoruController */
/* @var $model ZatratiPoDogovoru */

$this->breadcrumbs=array(
	'Zatrati Po Dogovorus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ZatratiPoDogovoru', 'url'=>array('index')),
	array('label'=>'Create ZatratiPoDogovoru', 'url'=>array('create')),
	array('label'=>'Update ZatratiPoDogovoru', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ZatratiPoDogovoru', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ZatratiPoDogovoru', 'url'=>array('admin')),
);
?>

<h1>View ZatratiPoDogovoru #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dogovor',
		'id_objecta_po_dogovoru',
		'id_zatrat',
		'id_author',
		'summa',
		'data',
		'comment',
	),
)); ?>

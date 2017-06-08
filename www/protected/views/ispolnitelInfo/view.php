<?php
/* @var $this IspolnitelInfoController */
/* @var $model IspolnitelInfo */

$this->breadcrumbs=array(
	'Ispolnitel Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IspolnitelInfo', 'url'=>array('index')),
	array('label'=>'Create IspolnitelInfo', 'url'=>array('create')),
	array('label'=>'Update IspolnitelInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IspolnitelInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IspolnitelInfo', 'url'=>array('admin')),
);
?>

<h1>View IspolnitelInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_ispolnitel',
		'id_author',
		'nds',
		'id_bank',
		'comments',
		'pasport',
		'inn',
		'kpp',
		'okpo',
		'ogrn',
		'ogrnip',
		'phone',
		'fax',
		'site',
		'yur_address',
		'fiz_address',
		'director',
		'zamestitel',
		'email',
		'logo_path',
		'osnovaniye_dogovora',
		'data_from_csv',
		'record_date',
	),
)); ?>

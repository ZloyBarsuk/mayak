<?php
/* @var $this ContragentInfoController */
/* @var $model ContragentInfo */

$this->breadcrumbs=array(
	'Contragent Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ContragentInfo', 'url'=>array('index')),
	array('label'=>'Create ContragentInfo', 'url'=>array('create')),
	array('label'=>'Update ContragentInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContragentInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContragentInfo', 'url'=>array('admin')),
);
?>

<h1>View ContragentInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_contragent',
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
		'doljnost',
		'zamestitel',
		'email',
		'logo_path',
		'osnovaniye_dogovora',
		'record_date',
		'data_from_csv_dla_pravki',
	),
)); ?>

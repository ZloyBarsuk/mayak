<?php
/* @var $this ObjectrabotadressController */
/* @var $model ObjectRabotAdress */

$this->breadcrumbs=array(
	'Object Rabot Adresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ObjectRabotAdress', 'url'=>array('index')),
	array('label'=>'Create ObjectRabotAdress', 'url'=>array('create')),
	array('label'=>'Update ObjectRabotAdress', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ObjectRabotAdress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ObjectRabotAdress', 'url'=>array('admin')),
);
?>

<h1>View ObjectRabotAdress #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'adress',
		'plochad_rabot',
		'nomer_dopsvedeniya',
		'data_dopsvedeniya',
		'id_dogovor',
		'archiv_number',
		'id_rayon',
		'id_avtor',
		'record_date',
		'kadastroviy_nomer',
	),
)); ?>

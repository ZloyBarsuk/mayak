<?php
/* @var $this BankDetailsController */
/* @var $model BankDetails */

$this->breadcrumbs=array(
	'Bank Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BankDetails', 'url'=>array('index')),
	array('label'=>'Create BankDetails', 'url'=>array('create')),
	array('label'=>'Update BankDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BankDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BankDetails', 'url'=>array('admin')),
);
?>

<h1>View BankDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_bank',
		'inn',
		'id_author',
		'kpp',
		'yur_address',
		'fiz_address',
		'ogrm',
		'r_s',
		'k_s',
		'bic',
		'swift',
		'account_type',
		'record_date',
	),
)); ?>

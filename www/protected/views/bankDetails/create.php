<?php
/* @var $this BankDetailsController */
/* @var $model BankDetails */

$this->breadcrumbs=array(
	'Bank Details'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List BankDetails', 'url'=>array('index')),
	array('label'=>'Manage BankDetails', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать BankDetails</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

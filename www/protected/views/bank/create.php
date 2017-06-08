<?php
/* @var $this BankController */
/* @var $model Bank */

$this->breadcrumbs=array(
	'Банки'=>array('index'),
	'Создать',
);

$this->menu=array(
//	array('label'=>'List Bank', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<div class="col-md-10">
	<h1>Создать новый элемет</h1>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

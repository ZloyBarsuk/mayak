<?php
/* @var $this DogovorHistoryController */
/* @var $model DogovorHistory */

$this->breadcrumbs=array(
	'Dogovor Histories'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List DogovorHistory', 'url'=>array('index')),
	array('label'=>'Manage DogovorHistory', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать DogovorHistory</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

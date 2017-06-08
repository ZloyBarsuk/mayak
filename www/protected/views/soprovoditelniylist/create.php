<?php
/* @var $this SoprovoditelniylistController */
/* @var $model SoprovoditelniyList */

$this->breadcrumbs=array(
	'Soprovoditelniy Lists'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List SoprovoditelniyList', 'url'=>array('index')),
	array('label'=>'Manage SoprovoditelniyList', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать SoprovoditelniyList</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

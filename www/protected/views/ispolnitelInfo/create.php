<?php
/* @var $this IspolnitelInfoController */
/* @var $model IspolnitelInfo */

$this->breadcrumbs=array(
	'Ispolnitel Infos'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List IspolnitelInfo', 'url'=>array('index')),
	array('label'=>'Manage IspolnitelInfo', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать IspolnitelInfo</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

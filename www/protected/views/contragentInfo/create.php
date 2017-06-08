<?php
/* @var $this ContragentInfoController */
/* @var $model ContragentInfo */

$this->breadcrumbs=array(
	'Contragent Infos'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List ContragentInfo', 'url'=>array('index')),
	array('label'=>'Manage ContragentInfo', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать ContragentInfo</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

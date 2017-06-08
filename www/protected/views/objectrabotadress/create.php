<?php
/* @var $this ObjectrabotadressController */
/* @var $model ObjectRabotAdress */

$this->breadcrumbs=array(
	'Object Rabot Adresses'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List ObjectRabotAdress', 'url'=>array('index')),
	array('label'=>'Manage ObjectRabotAdress', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать ObjectRabotAdress</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

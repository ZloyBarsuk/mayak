<?php
/* @var $this DopSoglasheniyeController */
/* @var $model DopSoglasheniye */

$this->breadcrumbs=array(
	'Dop Soglasheniyes'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List DopSoglasheniye', 'url'=>array('index')),
	array('label'=>'Manage DopSoglasheniye', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать DopSoglasheniye</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

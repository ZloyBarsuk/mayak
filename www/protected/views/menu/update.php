<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Меню'=>array('index'),
	$model->name=>array('menu'),
	'Обновить',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'View Menu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>
	<div class="col-md-12">
		<h1>Обновление пункта "<?php echo $model->name; ?>"</h1>
	</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
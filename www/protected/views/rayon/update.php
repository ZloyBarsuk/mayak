<?php
/* @var $this RayonController */
/* @var $model Rayon */

$this->breadcrumbs=array(
	'Rayons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rayon', 'url'=>array('index')),
	array('label'=>'Create Rayon', 'url'=>array('create')),
	array('label'=>'View Rayon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Rayon', 'url'=>array('admin')),
);
?>

<h1>Update Rayon <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
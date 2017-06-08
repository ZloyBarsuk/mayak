<?php
/* @var $this RayonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rayons',
);

$this->menu=array(
	array('label'=>'Create Rayon', 'url'=>array('create')),
	array('label'=>'Manage Rayon', 'url'=>array('admin')),
);
?>

<h1>Rayons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

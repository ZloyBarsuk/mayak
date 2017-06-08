<?php
/* @var $this ContragentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contragents',
);

$this->menu=array(
	array('label'=>'Create Contragent', 'url'=>array('create')),
	array('label'=>'Manage Contragent', 'url'=>array('admin')),
);
?>

<h1>Contragents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

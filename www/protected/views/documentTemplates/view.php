<?php
/* @var $this DocumentTemplatesController */
/* @var $model DocumentTemplates */

$this->breadcrumbs=array(
	'Document Templates'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List DocumentTemplates', 'url'=>array('index')),
	array('label'=>'Create DocumentTemplates', 'url'=>array('create')),
	array('label'=>'Update DocumentTemplates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DocumentTemplates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DocumentTemplates', 'url'=>array('admin')),
);
?>

<h1>View DocumentTemplates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'actualnost',
		'date',
	),
)); ?>

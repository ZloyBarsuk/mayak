<?php
/* @var $this CalendarController */
/* @var $model EventFullcalendar */

$this->breadcrumbs=array(
	'Event Fullcalendars'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List EventFullcalendar', 'url'=>array('index')),
	array('label'=>'Create EventFullcalendar', 'url'=>array('create')),
	array('label'=>'Update EventFullcalendar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EventFullcalendar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventFullcalendar', 'url'=>array('admin')),
);
?>

<h1>View EventFullcalendar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'event',
		'date_start',
		'date_end',
		'author',
		'status',
		'record_date',
	),
)); ?>

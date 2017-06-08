<?php
/* @var $this CalendarController */
/* @var $model EventFullcalendar */

$this->breadcrumbs=array(
	'Event Fullcalendars'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List EventFullcalendar', 'url'=>array('index')),
	array('label'=>'Manage EventFullcalendar', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать EventFullcalendar</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

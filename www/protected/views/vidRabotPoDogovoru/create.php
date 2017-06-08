<?php
/* @var $this VidRaborPoDogovoruController */
/* @var $model VidRaborPoDogovoru */

$this->breadcrumbs=array(
	'Vid Rabor Po Dogovorus'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List VidRaborPoDogovoru', 'url'=>array('index')),
	array('label'=>'Manage VidRaborPoDogovoru', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать VidRaborPoDogovoru</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

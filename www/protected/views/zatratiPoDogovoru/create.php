<?php
/* @var $this ZatratiPoDogovoruController */
/* @var $model ZatratiPoDogovoru */

$this->breadcrumbs=array(
	'Zatrati Po Dogovorus'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List ZatratiPoDogovoru', 'url'=>array('index')),
	array('label'=>'Manage ZatratiPoDogovoru', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать ZatratiPoDogovoru</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

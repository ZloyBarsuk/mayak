<?php
/* @var $this DocumentTemplatesController */
/* @var $model DocumentTemplates */

$this->breadcrumbs=array(
	'Document Templates'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List DocumentTemplates', 'url'=>array('index')),
	array('label'=>'Manage DocumentTemplates', 'url'=>array('admin')),
);
?>

	<div class="col-md-10">
<h1>Создать DocumentTemplates</h1>
		</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

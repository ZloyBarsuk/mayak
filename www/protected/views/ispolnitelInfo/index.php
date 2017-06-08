<?php
/* @var $this IspolnitelInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ispolnitel Infos',
);

$this->menu=array(
array('label'=>'Create IspolnitelInfo', 'url'=>array('create')),
array('label'=>'Manage IspolnitelInfo', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Ispolnitel Infos</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

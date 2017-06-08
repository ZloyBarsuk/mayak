<?php
/* @var $this IspolnitelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ispolnitels',
);

$this->menu=array(
array('label'=>'Create Ispolnitel', 'url'=>array('create')),
array('label'=>'Manage Ispolnitel', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Ispolnitels</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

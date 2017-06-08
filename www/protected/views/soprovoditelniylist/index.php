<?php
/* @var $this SoprovoditelniylistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Soprovoditelniy Lists',
);

$this->menu=array(
array('label'=>'Create SoprovoditelniyList', 'url'=>array('create')),
array('label'=>'Manage SoprovoditelniyList', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Soprovoditelniy Lists</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

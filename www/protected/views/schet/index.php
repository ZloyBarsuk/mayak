<?php
/* @var $this SchetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Schets',
);

$this->menu=array(
array('label'=>'Create Schet', 'url'=>array('create')),
array('label'=>'Manage Schet', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Schets</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

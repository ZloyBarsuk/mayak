<?php
/* @var $this DopSoglasheniyeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dop Soglasheniyes',
);

$this->menu=array(
array('label'=>'Create DopSoglasheniye', 'url'=>array('create')),
array('label'=>'Manage DopSoglasheniye', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Dop Soglasheniyes</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

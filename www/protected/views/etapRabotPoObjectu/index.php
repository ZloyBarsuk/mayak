<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etap Rabor Po Objectus',
);

$this->menu=array(
array('label'=>'Create EtapRaborPoObjectu', 'url'=>array('create')),
array('label'=>'Manage EtapRaborPoObjectu', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Etap Rabor Po Objectus</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

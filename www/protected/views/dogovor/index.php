<?php
/* @var $this DogovorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dogovors',
);

$this->menu=array(
array('label'=>'Create Dogovor', 'url'=>array('create')),
array('label'=>'Manage Dogovor', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Dogovors</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

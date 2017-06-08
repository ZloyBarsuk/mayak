<?php
/* @var $this ContragentInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contragent Infos',
);

$this->menu=array(
array('label'=>'Create ContragentInfo', 'url'=>array('create')),
array('label'=>'Manage ContragentInfo', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Contragent Infos</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

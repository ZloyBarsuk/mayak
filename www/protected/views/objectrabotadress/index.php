<?php
/* @var $this ObjectrabotadressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Object Rabot Adresses',
);

$this->menu=array(
array('label'=>'Create ObjectRabotAdress', 'url'=>array('create')),
array('label'=>'Manage ObjectRabotAdress', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Object Rabot Adresses</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

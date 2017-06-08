<?php
/* @var $this BankDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bank Details',
);

$this->menu=array(
array('label'=>'Create BankDetails', 'url'=>array('create')),
array('label'=>'Manage BankDetails', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Bank Details</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

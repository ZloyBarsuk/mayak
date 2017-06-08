<?php
    /* @var $this BankDetailsController */
    /* @var $model BankDetails */

$this->breadcrumbs=array(
	'Bank Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список BankDetails', 'url'=>array('index')),
    array('label'=>'Создать BankDetails', 'url'=>array('create')),
    array('label'=>'Просмотр BankDetails', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление BankDetails', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  BankDetails <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
    /* @var $this BankController */
    /* @var $model Bank */

$this->breadcrumbs=array(
	'Банки'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

    $this->menu=array(
   // array('label'=>'Список ', 'url'=>array('index')),
    array('label'=>'Создать новый', 'url'=>array('create')),
  //  array('label'=>'Просмотр Bank', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  "<?php echo $model->name; ?>"</h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
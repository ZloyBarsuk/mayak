<?php
    /* @var $this DogovorHistoryController */
    /* @var $model DogovorHistory */

$this->breadcrumbs=array(
	'Dogovor Histories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список DogovorHistory', 'url'=>array('index')),
    array('label'=>'Создать DogovorHistory', 'url'=>array('create')),
    array('label'=>'Просмотр DogovorHistory', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление DogovorHistory', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  DogovorHistory <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
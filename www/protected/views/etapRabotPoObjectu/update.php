<?php
    /* @var $this EtapRaborPoObjectuController */
    /* @var $model EtapRaborPoObjectu */

$this->breadcrumbs=array(
	'Etap Rabor Po Objectus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список EtapRaborPoObjectu', 'url'=>array('index')),
    array('label'=>'Создать EtapRaborPoObjectu', 'url'=>array('create')),
    array('label'=>'Просмотр EtapRaborPoObjectu', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление EtapRaborPoObjectu', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  EtapRaborPoObjectu <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
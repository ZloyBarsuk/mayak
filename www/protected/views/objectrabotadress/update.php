<?php
    /* @var $this ObjectrabotadressController */
    /* @var $model ObjectRabotAdress */

$this->breadcrumbs=array(
	'Object Rabot Adresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список ObjectRabotAdress', 'url'=>array('index')),
    array('label'=>'Создать ObjectRabotAdress', 'url'=>array('create')),
    array('label'=>'Просмотр ObjectRabotAdress', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление ObjectRabotAdress', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  ObjectRabotAdress <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
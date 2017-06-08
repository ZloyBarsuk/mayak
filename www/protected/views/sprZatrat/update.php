<?php
    /* @var $this SprZatratController */
    /* @var $model SprZatrat */

$this->breadcrumbs=array(
	'Затраты'=>array('admin'),

);

    $this->menu=array(
   // array('label'=>'Список ', 'url'=>array('index')),
    array('label'=>'Создать', 'url'=>array('create')),
   // array('label'=>'Просмотр SprZatrat', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить   <?php echo $model->naimenovaniye; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
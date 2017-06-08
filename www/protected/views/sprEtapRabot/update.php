<?php
    /* @var $this SprEtapRabotController */
    /* @var $model SprEtapRabot */

$this->breadcrumbs=array(
    'Этап работ'=>array('admin'),

);

    $this->menu=array(
  //  array('label'=>'Список SprEtapRabot', 'url'=>array('index')),
    array('label'=>'Создать', 'url'=>array('create')),
  //  array('label'=>'Просмотр SprEtapRabot', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить элемент " <?php echo $model->etap_rabot; ?>"</h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
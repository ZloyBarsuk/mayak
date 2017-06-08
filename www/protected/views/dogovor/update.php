<?php
    /* @var $this DogovorController */
    /* @var $model Dogovor */

$this->breadcrumbs=array(
	'Dogovors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список Dogovor', 'url'=>array('index')),
    array('label'=>'Создать Dogovor', 'url'=>array('create')),
    array('label'=>'Просмотр Dogovor', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление Dogovor', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-10">
        <h1>
            Договор №  <?php echo $model->id; ?></h1>
    </div>



<?php //$this->renderPartial('_form', array('model'=>$model),false,true); ?>
<?php $this->renderPartial('dialog_view', array('dogovor_model'=>$model,'contragents'=>$contragents,),false,true); ?>
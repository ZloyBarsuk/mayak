<?php
/* @var $this DogovorController */
/* @var $model Dogovor */

$this->breadcrumbs=array(
	'Dogovors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dogovor', 'url'=>array('index')),
	array('label'=>'Create Dogovor', 'url'=>array('create')),
	array('label'=>'Update Dogovor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dogovor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dogovor', 'url'=>array('admin')),
);
?>

<h1>View Dogovor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_ispolnitel',
		'id_contragent',
		'id_author',
		'dogovor_number',
		'dogovor_number_old',
		'primechaniye',
		'avans_procent',
		'summa_avansa',
		'summa_dogovora_nachalnaya',
		'created_date',
		'closed_date',
		'srok_ispolneniya',
		'podpisan_date',
		'status',
		'otkat',
	),
));




?>


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'dogovor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
)); ?>
<b><?php  echo   $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model' => $model,
		'i18nScriptFile' => 'jquery-ui-i18n.min.js',

		'htmlOptions' => array('style' => 'z-index: 9999;position: relative;width:100px;'),
		'attribute' => 'podpisan_date',
		'language' => 'ru',
		'options' => array(
			'showOn' => 'focus',
			'dateFormat' => 'yy-mm-dd',
			'showOtherMonths' => true,
			'selectOtherMonths' => true,
			'changeMonth' => true,
			'changeYear' => true,
			'showButtonPanel' => true,
		),
	), true);?></b>
<?php $this->endWidget(); ?>

<br />
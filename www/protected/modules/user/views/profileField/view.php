<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t($model->title),
);
$this->menu=array(
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserModule::t('Update Profile Field'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserModule::t('Delete Profile Field'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<h1><?php echo UserModule::t('View Profile Field #').$model->varname; ?></h1>
<div class="page-subtitle">

	<p>  <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title' => '',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items' => $this->menu,
			//  'htmlOptions' => array('class' => 'btn-group'),

			// 'itemTemplate' => '<button type="button">{menu}</button>',
			'itemCssClass' => 'btn btn-default btn-clean btn-rounded',


		));
		$this->endWidget();
		?></p>

</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
	),
)); ?>

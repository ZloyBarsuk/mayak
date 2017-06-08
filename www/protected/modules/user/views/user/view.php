<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('index'),
    $model->username,
);
$this->layout = '//layouts/column1';
$this->menu = array(
    array('label' => UserModule::t('List User'), 'url' => array('user')),
);
?>
<h1><?php echo UserModule::t('View User') . ' "' . $model->username . '"'; ?></h1>
<?php
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
?>
<?php

// For all users
$attributes = array(
    'username',
);

$profileFields = ProfileField::model()->forAll()->sort()->findAll();
if ($profileFields) {
    foreach ($profileFields as $field) {
        array_push($attributes, array(
            'label' => UserModule::t($field->title),
            'name' => $field->varname,
            'value' => (($field->widgetView($model->profile)) ? $field->widgetView($model->profile) : (($field->range) ? Profile::range($field->range, $model->profile->getAttribute($field->varname)) : $model->profile->getAttribute($field->varname))),

        ));
    }
}
array_push($attributes,
    'create_at',
    array(
        'name' => 'lastvisit_at',
        'value' => (($model->lastvisit_at != '0000-00-00 00:00:00') ? $model->lastvisit_at : UserModule::t('Not visited')),
    )
);

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => $attributes,
));

?>

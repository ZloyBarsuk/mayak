<?php
$autocompleteConfig = array(
    'model' => Contragent::model(), // модель
    'attribute' => 'name', // атрибут модели
    'htmlOptions' => array(
        'class' => 'form-control',
    ),
//   'htmlOptions'=>array('class'=>'form-control'),
// "источник" данных для выборки
// может быть url, который возвращает JSON, массив
// или функция JS('js: alert("Hello!");')
    'source' => Yii::app()->createUrl('contragent/autocomplete'),
// параметры, подробнее можно посмотреть на сайте
// http://jqueryui.com/demos/autocomplete/
    'options' => array(
// минимальное кол-во символов, после которого начнется поиск
        'minLength' => '3',
        'showAnim' => 'fold',
// обработчик события, выбор пункта из списка
        'select' => 'js: function(event, ui) {
// действие по умолчанию, значение текстового поля
// устанавливается в значение выбранного пункта
this.value = ui.item.label;
// устанавливаем значения скрытого поля
$("#User_id_firma").val(ui.item.id);
return false;
}',
    ),
    'htmlOptions' => array(
        'maxlength' => 50,
    ),
);

?>

<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('admin'),
    $model->username,
);


$this->menu = array(
    array('label' => UserModule::t('Create User'), 'url' => array('create')),
    array('label' => UserModule::t('Update User'), 'url' => array('update', 'id' => $model->id)),
    array('label' => UserModule::t('Delete User'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => UserModule::t('Are you sure to delete this item?'))),
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
    //  array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);
?>


<?php

$auth_info = array(
    'id',
    'username',
    'familiya',
    'name',
    'otchestvo',
    'doljnost',
    'phone_cell',
    'phone_home',
    'skype',
);
$attributes = array();

//$profileFields = ProfileField::model()->forOwner()->sort()->findAll();
/*if ($profileFields) {
    foreach ($profileFields as $field) {
        array_push($auth_info, array(
       //     'label' => UserModule::t($field->title),
        //    'name' => $field->varname,
        //    'type' => 'raw',
          //  'value' => (($field->widgetView($model->profile)) ? $field->widgetView($model->profile) : (($field->range) ? Profile::range($field->range, $model->profile->getAttribute($field->varname)) : $model->profile->getAttribute($field->varname))),
        ));
    }
}

if ($profileFields) {
    foreach ($profileFields as $field) {
        array_push($attributes, array(
       //     'label' => UserModule::t($field->title),
         //   'name' => $field->varname,
       //     'type' => 'raw',
          //  'value' => (($field->widgetView($model->profile)) ? $field->widgetView($model->profile) : (($field->range) ? Profile::range($field->range, $model->profile->getAttribute($field->varname)) : $model->profile->getAttribute($field->varname))),
        ));
    }
}*/

array_push($auth_info,
    // 'password',


    array(
        'name' => 'status',
        'value' => User::itemAlias("UserStatus", $model->status),
    )
);
array_push($attributes,
    // 'password',


    'pol',
    'birth_date',
    'passport',
    'folder_documents',
    'activkey',
    'email',
    'create_at',
    'lastvisit_at',

    'email',

    array(
        'name' => 'superuser',
        'value' => User::itemAlias("AdminStatus", $model->superuser),
    )

);

?>

<div class="wrapper wrapper-white">
    <div class="wrapper">
        <div class="row">
            <div class="page-subtitle page-subtitle-centralized">

                <h1><?php echo UserModule::t('View User') . ' "' . $model->username . '"'; ?></h1>
            </div>
            <div class="col-md-6">

                <div class="faq">

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'htmlOptions' => array('class' => 'faq-text'),
                        'itemCssClass' => 'faq-title',
                        'cssFile' => Yii::app()->baseUrl . '/css/blue-white.css',
                        'data' => $model,
                        'attributes' => $auth_info,
                        'itemTemplate' => ' <div class="col-md-6"><div class="faq-item active"><div class="faq-title"><span class="fa fa-angle-down"></span> {label}</div><div class="faq-text"> <h5>{value}</h5> <p> </p> </div></div></div>',

                    ));


                    ?>

                </div>

            </div>
            <div class="col-md-6">
                <div class="faq">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'htmlOptions' => array('class' => 'faq-text'),
                        'itemCssClass' => 'faq-title',
                        'cssFile' => Yii::app()->baseUrl . '/css/blue-white.css',
                        'data' => $model,
                        'attributes' => $attributes,
                        'itemTemplate' => '<div class="col-md-6">
<div class="faq-item active"><div class="faq-title"><span class="fa fa-angle-down"></span> {label}</div><div class="faq-text"> <h5>{value}</h5> <p> </p> </div></div></div>',

                    ));

                    ?>

                </div>
            </div>
        </div>

    </div>


</div>


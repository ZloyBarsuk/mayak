<?php

$autocompleteConfig = array(
    'model' => Contragent::model(), // модель
    'attribute' => 'name', // атрибут модели
    'htmlOptions' => array(
        'class' => '',
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
        'class' => 'form-control',
    ),
);
?>




<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

<div class="col-md-9">

    <div class="col-md-5">
        <div class="page-subtitle margin-bottom-0">
            <h3>Данные для авторизации</h3>

            <p>Важные поля для доступа к нашей системе</p>
        </div>
        <div class="form-group">
            <?php echo $form->error($model, 'username'); ?>
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>


        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'password'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>

        </div>
        <div class="form-group">

            <label>Фирма: </label><br>
            <?php // $this->widget('zii.widgets.jui.CJuiAutoComplete', $autocompleteConfig); ?>
            <?php  echo CHtml::activeDropDownList($model, 'id_firma', CHtml::listData(Ispolnitel::model()->findAll(), 'id', 'name'), array('empty' => 'Выбери фирму'),array('class'=>'form-control')); ?>

            <?php //  echo $form->hiddenField($model, 'id_firma', array('style' => 'display: none;')); ?>
            <?php // echo $form->dropDownList($model, 'id_firma', User::itemAlias('UserStatus'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'id_firma'); ?>
        </div>
        <div class="form-group">


            <?php echo $form->labelEx($model, 'superuser'); ?>
            <?php echo $form->dropDownList($model, 'superuser', User::itemAlias('AdminStatus'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'superuser'); ?>


        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', User::itemAlias('UserStatus'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>

        </div>


        <div class="form-group">

            <?php echo $form->labelEx($model, 'pol'); ?>
            <?php echo $form->dropDownList($model, 'pol', array('М' => 'муж.', 'Ж' => 'жен.'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'pol'); ?>

        </div>


    </div>

    <div class="col-md-5">
        <div class="page-subtitle margin-bottom-0">
            <h3>Персональная информация</h3>

            <p>Эти данные используются в документах</p>
        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>

        </div>

        <div class="form-group">

            <?php echo $form->labelEx($model, 'familiya'); ?>
            <?php echo $form->textField($model, 'familiya', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'familiya'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'otchestvo'); ?>
            <?php echo $form->textField($model, 'otchestvo', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'otchestvo'); ?>

        </div>

        <div class="form-group">


            <?php echo $form->labelEx($model, 'birth_date'); ?>

            <?php echo $form->dateField($model, 'birth_date', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>

            <?php /* $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'User[birth_date]',
                'model' => $model,
               // 'attribute' => 'birth_date',
                'value' => $model->birth_date,
                'language' => 'ru',
                'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                'options' => array(
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showButtonPanel' => 'true',
                    'constrainInput' => 'false',
                    'duration'=>'fast',
                    'showAnim' =>'slide',





                ),
                'htmlOptions' => array(
                   // 'style' => 'height:20px;',
                   // 'class'=>'form-control datepicker',
                ),
            )); */ ?>
            <?php echo $form->error($model, 'birth_date'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'doljnost'); ?>
            <?php echo $form->textField($model, 'doljnost', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'doljnost'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'atestat'); ?>
            <?php echo $form->textField($model, 'atestat', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'atestat'); ?>

        </div>

        <div class="form-group">

            <?php echo $form->labelEx($model, 'passport'); ?>
            <?php echo $form->textField($model, 'passport', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'passport'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'phone_cell'); ?>
            <?php echo $form->textField($model, 'phone_cell', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_cell'); ?>

        </div>

        <div class="form-group">

            <?php echo $form->labelEx($model, 'phone_home'); ?>
            <?php echo $form->textField($model, 'phone_home', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_home'); ?>

        </div>
        <div class="form-group">

            <?php echo $form->labelEx($model, 'skype'); ?>
            <?php echo $form->textField($model, 'skype', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'skype'); ?>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), array('class' => 'btn btn-danger pull-right')); ?>
                </div>

            </div>
        </div>

    </div>


</div>

<?php $this->endWidget(); ?>















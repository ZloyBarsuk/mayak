<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta section -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- /meta section -->

    <!-- css styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/light-white.css"
          id="dev-css">
    <!-- ./css styles -->
<?php

echo "dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf
dsfsfdsfdskfdskflkdfkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsfdsfsfdsfdskfdskflkd
fkdjklfdsklfjdklfjkdsfjlkdsjflkdsjflkdsjkfjdkljfkdskfdsfdsf";




?>
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/dev-other/dev-ie-fix.css">
    <![endif]-->

    <!-- javascripts -->
    <script type="text/javascript"
            src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/modernizr/modernizr.js"></script>
    <!-- ./javascripts -->

    <style></style>
</head>
<body>

<!-- page wrapper -->
<div class="dev-page dev-page-login dev-page-login-v2">

    <div class="dev-page-login-block">
        <a class=""></a>

        <div class="dev-page-login-block__form">
            <div class="title" style="align-content: center;"><strong><?php echo Yii::app()->name; ?></strong></div>

            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form-vertical login-form',
                ),
            )); ?>



            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <?php echo $form->textField($model, 'username', array('placeholder' => 'Логин', 'class' => 'form-control')); ?>


                </div>

            </div>
            <?php echo $form->error($model, 'username', array('style' => 'color:red')); ?>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                    <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Пароль', 'class' => 'form-control')); ?>

                </div>

            </div>
            <?php echo $form->error($model, 'password', array('style' => 'color:red')); ?>
            <div class="form-group no-border margin-top-20">


                <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-success btn-block')); ?>

            </div>

            <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'uniform')); ?>
            <?php echo $form->label($model, 'Запомнить меня'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>

            <?php $this->endWidget(); ?>


        </div>
        <div class="dev-page-login-block__footer">
            © 2015 <strong>Автор: китаец (за миску риса)</strong>
        </div>
    </div>

</div>
<!-- ./page wrapper -->

<!-- javascript -->
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- ./javascript -->
</body>
</html>







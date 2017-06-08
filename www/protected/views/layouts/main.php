<?php /* @var $this Controller */ ?>
<?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta section -->
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- ./meta section -->

    <!-- css styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/blue-white.css"
          id="dev-css">
    <!-- ./css styles -->

    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/dev-other/dev-ie-fix.css">
    <![endif]-->

    <!-- javascripts -->


    <!-- ./javascripts -->

    <style>
        .dev-page {
            visibility: hidden;
        }
    </style>
</head>
<body>


<!-- set loading layer -->
<!--<div class="dev-page-loading preloader"></div>
-->

<!-- ./set loading layer -->

<!-- page wrapper -->
<div class="dev-page">

    <!-- page header -->
    <div class="dev-page-header">

        <div class="dph-logo">
            <a href="index.html">Intuitive</a>
            <a class="dev-page-sidebar-collapse">
                <div class="dev-page-sidebar-collapse-icon">
                    <span class="line-one"></span>
                    <span class="line-two"></span>
                    <span class="line-three"></span>
                </div>
            </a>
        </div>

        <ul class="dph-buttons pull-right">
            <li class="dph-button-stuck">
                <a href="#" class="dev-page-search-toggle">
                    <div class="dev-page-search-toggle-icon">
                        <span class="circle"></span>
                        <span class="line"></span>
                    </div>
                </a>
            </li>
            <li class="dph-button-stuck">
                <a href="#" class="dev-page-rightbar-toggle">
                    <div class="dev-page-rightbar-toggle-icon">
                        <span class="line-one"></span>
                        <span class="line-two"></span>
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <!-- ./page header -->

    <!-- page container -->
    <div class="dev-page-container">

        <!-- page sidebar -->
        <div class="dev-page-sidebar">
            <?php

            // динасическое меню для пользователей из базы данных

            $this->widget('application.components.ActiveMenu', array(
                'encodeLabel' => false,
                'htmlOptions' => array('class' => 'dev-page-navigation'),
            ));

            ?>


        </div>
        <!-- ./page sidebar -->

        <!-- page content -->
        <div class="dev-page-content">
            <div class="container">
                <!-- page title -->
                <div class="page-title">
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'homeLink' => CHtml::link('Главная', 'index'),
                            'htmlOptions' => array('class' => 'breadcrumb')
                        )); ?>
                    <?php endif ?>


                </div>
                <!-- ./page title -->

                <?php
                echo $content;
                ?>
            </div>
        </div>
        <!-- ./page content -->
    </div>
    <!-- ./page container -->

    <!-- right bar -->
    <div class="dev-page-rightbar">
        <div class="rightbar-chat">

            <div class="rightbar-chat-frame-contacts scroll">
                <div class="rightbar-title">
                    <h3>Messages</h3>
                    <a href="#" class="btn btn-default btn-rounded rightbar-close pull-right"><span
                            class="fa fa-times"></span></a>
                </div>
                <ul class="contacts">
                    <li class="title">online</li>
                    <li>
                        <a href="#" class="status online">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_1.jpg"
                                 title="Aqvatarius"> John Doe
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status online">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_2.jpg"
                                 title="Aqvatarius"> Shannon Freeman
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status away">
                            <img src="assets/images/users/user_3.jpg" title="Aqvatarius"> Devin Stephens
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status away">
                            <img src="assets/images/users/user_4.jpg" title="Aqvatarius"> Marissa George
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status dont">
                            <img src="assets/images/users/user_5.jpg" title="Aqvatarius"> Sydney Reeves
                        </a>
                    </li>
                    <li class="title">offline</li>
                    <li>
                        <a href="#" class="status">
                            <img src="assets/images/users/user_6.jpg" title="Aqvatarius"> Kaitlynn Bowen
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_7.jpg"
                                 title="Aqvatarius"> Karen Spencer
                        </a>
                    </li>
                    <li>
                        <a href="#" class="status">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_8.jpg"
                                 title="Aqvatarius"> Darrell Wolfe
                        </a>
                    </li>
                </ul>
            </div>

            <div class="rightbar-chat-frame-chat">
                <div class="user">
                    <div class="user-panel">
                        <a href="#" class="btn btn-default btn-rounded rightbar-chat-close"><span
                                class="fa fa-angle-left"></span></a>
                        <a href="#" class="btn btn-default btn-rounded pull-right"><span class="fa fa-user"></span></a>
                    </div>
                    <div class="user-info">
                        <div class="user-info-image status online">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_1.jpg">
                        </div>
                        <h5>Devin Stephens</h5>
                        <span>UI/UX Designer</span>
                    </div>
                </div>
                <div class="chat-wrapper scroll">
                    <ul class="chat" id="rightbar_chat">
                        <li class="inbox">
                            Hi, you have a second? Need to ask you something.
                            <span>about 1h ago</span>
                        </li>
                        <li class="sent">
                            Sure i have...
                            <span>59min ago</span>
                        </li>
                        <li class="inbox">
                            It's about latest design you did...
                            <span>14min ago</span>
                        </li>
                        <li class="sent">
                            I will do my best to help you
                            <span>2min ago</span>
                        </li>
                    </ul>
                </div>

                <form class="form" action="#" method="post" id="rightbar_chat_form">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-paperclip"></i></button>
                            </div>
                            <input type="text" class="form-control" name="message">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- ./right bar -->

    <!-- page footer -->

    <!-- ./page footer -->

    <!-- page search -->
    <div class="dev-search">
        <div class="dev-search-container">


            <div class="dev-search-form">
                <!-- <form action="index.html" method="post">
                     <div class="dev-search-field">
                         <input type="text" placeholder="Search..." value="Nature">
                     </div>
                 </form>-->
            </div>
            <div class="dev-search-results"></div>
        </div>
    </div>
    <!-- page search -->
</div>
<!-- ./page wrapper -->

<!-- javascript -->
<!--=== JavaScript ===-->
<?php Yii::app()->getClientScript()->registerCoreScript('faq'); ?>
<?php // Yii::app()->getClientScript()->registerCoreScript('jui'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('modernizr'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('bootstrap'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('mcustomscrollbar'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('moment'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('knob'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('sparkline'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('bootstrap-select'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('nvd3'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('nvd'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('waypoint'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('counter'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('javas'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('add_contragent'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('add_ispolnitel'); ?>

<?php Yii::app()->getClientScript()->registerCoreScript('tabs_loadder'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('add_dogovor'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('contragent_info_dialog'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('unblocker'); ?>
<?php Yii::app()->getClientScript()->registerCoreScript('close_modals'); ?>

<?php Yii::app()->getClientScript()->registerCoreScript('load_calendar'); ?>


<?php // Yii::app()->getClientScript()->registerCoreScript('mindfukcers'); ?>


<?php


// $cs4 = Yii::app()->getClientScript();
// $cs4->registerScriptFile( Yii::app()->request->baseUrl.'/js/objectrabot.js');

?>
<!-- ./javascript -->

<!-- modal large -->

<!-- ./modal large -->


</body>
</html>







<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('admin'),
    UserModule::t('Create'),
);

$this->menu = array(
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
   // array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);
?>



<div class="wrapper wrapper-white">

        <div class="col-md-2">
            <p>
            </p>


            <div class="list-group">
                <a href="#" class="list-group-item active"><i class="fa fa-wrench"></i> Управление</a>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => '',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'list-group'),
                    'itemCssClass' => 'list-group-item',
                ));
                $this->endWidget();
                ?>
            </div>


        </div>

        <?php
        echo $this->renderPartial('_form', array('model' => $model, /* 'profile' => $profile */ ));
        ?>


</div>
<?php
$this->breadcrumbs = array(
    UserModule::t("Users"),
);
if (UserModule::isAdmin()) {
    $this->layout = '//layouts/column1';
    $this->menu = array(
        array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')),
       // array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    );
}

$this->menu = array(
    array('label' => UserModule::t('Create User'), 'url' => array('/user/admin/create')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
  //  array('label' => UserModule::t('Manage Profile Field'), 'url' => array('/profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);
?>








<div class="wrapper wrapper-white">
    <div class="row row-wider">
        <div class="col-md-2">


            <div class="list-group">
                <a href="#" class="list-group-item active"><i class="fa fa-wrench"></i> <?php echo UserModule::t("List User"); ?></a>
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
        <div class="col-md-10">


            <div class="panel panel-default">
                <div class="panel-heading">

                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="col-md-12">

                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'dataProvider' => $dataProvider,
                            'id' => '',
                            'template' => "\n{summary}\n{items}\n{pager}",
                            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                            //'cssFile'=>false,
                            //  'htmlOptions'=>'table-responsive',
                            'summaryText' => false,
                            'enablePagination' => true,
                            'pager' => array(

                                'pageSize'=>5,
                                'header' => '',
                                'prevPageLabel' => '&laquo; назад',
                                'nextPageLabel' => 'далее &raquo;',
                                'maxButtonCount' => 10,
                                'htmlOptions' => array('class' => 'pagination'),
                                'selectedPageCssClass' => 'paginate_button current',
                                'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',),


                            'columns' => array(
                                array(
                                    'name' => 'username',
                                   // 'type' => 'raw',
                                    //'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
                                ),

                                'create_at',
                                'lastvisit_at',
                            ),
                        )); ?>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
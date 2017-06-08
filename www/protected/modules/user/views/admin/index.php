<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user'),
    UserModule::t('Manage'),
);

$this->menu = array(
    array('label' => UserModule::t('Create User'), 'url' => array('admin/create')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
  //  array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>



<div class="wrapper wrapper-white">
    <div class="row row-wider">
        <div class="col-md-2">


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


                        <?php $this->widget('zii.widgets.grid.CGridView', array(

                            'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                            'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                            'template' => "\n{summary}\n{items}\n{pager}",

                            'summaryText' => false,
                            'enablePagination' => true,


                            'id' => 'user-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'pager' => array(
                                'pageSize'=>5,
                                'header' => '',
                                'prevPageLabel' => '&laquo; назад',
                                'nextPageLabel' => 'далее &raquo;',
                                'maxButtonCount' => 10,
                                'htmlOptions' => array('class' => 'pagination'),
                                'selectedPageCssClass' => 'paginate_button current',
                                'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',

                            ),

                            'columns' => array(
                                /*array(
                                    'name' => 'id',
                                    'type' => 'raw',
                                    'value' => '$data->id',
                                    'filter' => User::itemAlias("ID"),
                                    'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
                                     'htmlOptions'=>array('width'=>'3%','style'=>'text-color:red'),
                                ),*/
                                array(
                                    'name' => 'username',
                                    'type' => 'raw',
                                    'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
                                    // 	'htmlOptions'=>array('width'=>'5%'),
                                ),
                                /* array(
                                     'name' => 'email',
                                     'type' => 'raw',
                                     'value' => 'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
                                      'htmlOptions'=>array('width'=>'5%'),
                                 ),*/
                                'create_at',
                                'lastvisit_at',
                                array(
                                    'name' => 'superuser',
                                    'value' => 'User::itemAlias("AdminStatus",$data->superuser)',
                                    'filter' => User::itemAlias("AdminStatus"),


                                ),
                                array(
                                    'name' => 'status',
                                    'value' => 'User::itemAlias("UserStatus",$data->status)',
                                    'filter' => User::itemAlias("UserStatus"),
                                    'htmlOptions'=>array('width'=>'10%'),
                                ),
                                array(
                                    'class' => 'CButtonColumn',
                                    'htmlOptions'=>array('width'=>'100%'),
                                    'header'=>'Управление',
                                    'buttons' => array
                                    (

                                        'delete' => array
                                        (
                                            'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                                        ),
                                        'update' => array
                                        (
                                            'imageUrl' => Yii::app()->baseUrl . '/img/edit.png',
                                        ),

                                        'view' => array
                                        (
                                            'imageUrl' => Yii::app()->baseUrl . '/img/search.png',
                                        ),
                                    ),
                                  //  'template' => '{update}{delete}',
                                ),
                            ),
                        )); ?>

                    </div>



            </div>
        </div>

    </div>

</div>





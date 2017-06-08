<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>




             <!-- --><?php
/*                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => '',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'btn-group'),

                    'itemTemplate' => '<button type="button">{menu}</button>',
                    'itemCssClass' => 'btn btn-default btn-clean btn-rounded',


                ));
                $this->endWidget();
                */?>

            <?php echo $content; ?>




<?php $this->endContent(); ?>
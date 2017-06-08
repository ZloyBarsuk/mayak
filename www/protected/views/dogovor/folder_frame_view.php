<?php



?>

<div class="wrapper wrapper-white">
    <div class="page-subtitle">

        <p>
            <iframe width="800" height="400"
                    src="<?php echo Yii::app()->baseUrl . "/" . $folder_path; // Yii::app()->baseUrl  ?>"></iframe>
        </p>


        <?php
        echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" .$folder_path, array('target' => '_blank'));

        ?>

        <p>Путь к папке:
            <?php
            $srting = array("/");
            $folder_path = trim(str_replace($srting, "\\", $folder_path));
            echo Yii::getPathOfAlias('application') . "\\" . $folder_path;
            ?>
        </p>



    </div>
</div><!-- form -->

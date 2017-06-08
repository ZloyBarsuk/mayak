<?php

class ObjectRabotController extends Controller //Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    /* public function filters()
     {
         return array(
             'accessControl', // perform access control for CRUD operations
             'postOnly + delete', // we only allow deletion via POST request
             'ajaxOnly + Create',
             // 'ajaxOnly + Update',
         );
     }*/

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /* public function accessRules()
     {
         return array(
             array('allow',  // allow all users to perform 'index' and 'view' actions
                 'actions' => array('index', 'view', 'infobydogovor', 'update', 'create'),
                 'users' => array('*'),
             ),
               array('allow', // allow authenticated user to perform 'create' and 'update' actions
                   'actions' => array('create', 'update'),
                   'users' => array('@'),
               ),
               array('allow', // allow admin user to perform 'admin' and 'delete' actions
                   'actions' => array('admin', 'delete'),
                   'users' => array('admin'),
               ),
               array('deny',  // deny all users
                   'users' => array('*'),
               ),
         );
     }*/

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /* public function actionInfoByDogovor()
     {
        //  var_dump($id) ;
       //  var_dump($_GET['id']) ;
        // exit();
        $dataProvider = ObjectRabot::model()->ObjectByDogovor();
         if (Yii::app()->request->isAjaxRequest) {

             $this->renderPartial('object_list_for_dogovor_modal', array('dataProvider_object' => $dataProvider,), false, true);
             // $this->renderPartial('/objectRabot/admin', array('model' => $dataProvider2 = ObjectRabot::model(),), false, true);
         } else {
             $this->renderPartial('object_list_for_dogovor_modal', array('dataProvider_object' => $dataProvider,), false, true);
             //  $this->render('list_for_dogovor_modal', array('dataProvider' => $dataProvider,));
         }

     }*/

    public function actionInfoByDogovor()
    {


        $model = new ObjectRabot('search');
        // clear any default values

        if (Yii::app()->request->isAjaxRequest) {
            $model->unsetAttributes();
            if(isset($_POST['ObjectRabot'])) {
                $model->mixedSearch = $_POST['ObjectRabot']['adress'];
            }

            if (isset($_POST['ObjectRabot']))
            {
                $model->attributes = $_POST['ObjectRabot'];
                $this->renderPartial('object_list_for_dogovor_modal', array('model' => $model), false, true);

            }
            else{
                $this->renderPartial('object_list_for_dogovor_modal', array('model' => $model), false, true);

            }


        } else {
            $this->renderPartial('object_list_for_dogovor_modal', array('model' => $model), false, true);
        }

    }


    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    private function actionNumberGenerator($model)
    {
        $kol_po_dogovoru = Yii::app()->db->createCommand(array(
            'select' => array('COUNT(id) AS cur_position'),
            'from' => 'object_rabot',
            'where' => 'id_dogovor=' . (int)$model->id_dogovor,
        ))->queryRow();
        // спешил,написал как есть )
        if ((int)$kol_po_dogovoru['cur_position'] !== null) {
            ++$kol_po_dogovoru['cur_position'];
        }
        $index_number = $kol_po_dogovoru['cur_position'];
        return $index_number;
    }


    public function actionCreate()
    {
        $model = new ObjectRabot;

        //проверка на наличие запроса из модалки посредством ajax
        if (Yii::app()->request->isAjaxRequest) {
            //проверка передачи айди договора при первом открытии формы если есть- то выводим саму форму


            if (isset($_POST['dog_id'])) {
                $dog_id = $_POST['dog_id'];
                $model->id_dogovor = (int)$dog_id;
                $model->adress = "Российская Федерация, Санкт-Петербург,";


                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,), false, true);
            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['ObjectRabot'])) {
                    $model->attributes = $_POST['ObjectRabot'];
                    $model->record_date = new CDbExpression('NOW()');
                    $model->archiv_number = $this->actionNumberGenerator($model);
                    if ($model->save()) {
                        // делаем штрих код
                        $model->findByPk($model->id);
                        $model->ean=$model->BarCodeGenerator();
                        $model->update();
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны'
                        ));
                        Yii::app()->end();

                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model->getErrors(),
                        ));
                        Yii::app()->end();

                    }


                }
            }


        } //обычная проверка по умолчанию
        /* else {
             if (isset($_GET['dog_id'])) {
                 $dog_id = $_GET['dog_id'];
                 $model->id_dogovor = $dog_id;
                 $this->renderPartial('_form', array('model' => $model,), false, true);
             }

             if(isset($_POST['ObjectRabot']))
             {
                 $model->attributes=$_POST['ObjectRabot'];
                 if($model->save())
                     $this->redirect(array('admin','id'=>$model->id));
             }

             $this->render('create',array( 'model'=>$model,));



         }*/
    }




    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate()
    {
        if(isset($_POST['object_id']))
        {
            $id= $_POST['object_id'];
            $model = $this->loadModel($id);
        }
        if(isset($_POST['ObjectRabot']))
        {
            $id= $_POST['ObjectRabot']['id'];
            $model = $this->loadModel($id);
        }



        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['ObjectRabot'])) {
          //  $model = $this->loadModel($_POST['ObjectRabot']['id']);

            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['ObjectRabot'])) {
                    $model->attributes = $_POST['ObjectRabot'];
                    $model->record_date = new CDbExpression('NOW()');

                    if ($model->save()) {




                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны'
                        ));
                        Yii::app()->end();


                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model->getErrors(),
                        ));
                        Yii::app()->end();


                    }
                }


            }


        } else {
            // загрузка отобраения
            if (Yii::app()->request->isAjaxRequest) {
               // $ean_ready=$this->actionBarcode($model);

                $ean =$model->ean;
                $this->renderPartial('_form', array('model' => $model,'ean' =>$ean), false, true);
               // $this->renderPartial('_form', array('model' => $model,), false, true);


            } else {
               // $this->render('update', array('model' => $model,));


                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,), false, true);
            }

        }

    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
       /* echo 'Запись успешно удалена $id';
        if(isset($_POST['object_id']))
        {
            $id= $_POST['object_id'];

        }

        $this->loadModel($id)->delete();
        if (Yii::app()->request->isAjaxRequest) {
           echo 'Запись успешно удалена ';
           Yii::app()->end();
        }*/


            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if ( $this->loadModel($id)->delete())
            {

                echo CJSON::encode(array(
                    'status' => 'true',
                    'message' => 'Объект работ был успешно удален.Навсегда!',
                ));
                Yii::app()->end();
            }
              //  $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));


    }



    /**
     * Lists all models.
     */


    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('ObjectRabot');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }




    /**
     * Manages all models.
     */



    public function actionAdmin()
    {
        $model = new ObjectRabot('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ObjectRabot']))
            $model->attributes = $_GET['ObjectRabot'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ObjectRabot the loaded model
     * @throws CHttpException
     */



    public function loadModel($id)
    {
        $model = ObjectRabot::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }



    /**
     * Performs the AJAX validation.
     * @param ObjectRabot $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'object-rabot-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

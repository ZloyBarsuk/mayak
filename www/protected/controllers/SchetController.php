<?php

class SchetController extends Controller //Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
   /* public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'infobydogovor','update', 'create','EmailSchet'),
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


    public function actionInfoByDogovor($id)
    {


        $dataProvider = Schet::model()->SchetByDogovor($id);

        if (Yii::app()->request->isAjaxRequest) {

            $this->renderPartial('list_for_dogovor_modal', array('dataProvider_schet' => $dataProvider,), false, true);

        } else {
           // $this->renderPartial('list_for_dogovor_modal', array('dataProvider_schet' => $dataProvider,), false, true);

              $this->render('list_for_dogovor_modal', array('dataProvider_schet' => $dataProvider,));

        }


    }


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */


    public function actionCreate()
    {
        $model = new Schet;

        //проверка на наличие запроса из модалки посредством ajax
        if (Yii::app()->request->isAjaxRequest) {
            //проверка передачи айди договора при первом открытии формы если есть- то выводим саму форму


            if (isset($_POST['dog_id'])) {
                $dog_id = $_POST['dog_id'];
                $model->id_dogovor = $dog_id;
                $model->RaschetOstatkaDogovora();
                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,), false, true);


            }
            else {

                if (isset($_POST['Schet'])) {
                    $this->performAjaxValidation($model);
                    $model->attributes = $_POST['Schet'];
                    $model->RaschetSumm();
                    if ($model->save()) {
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',
                            'summa_bez_nds' => $model->summa_bez_nds,
                            'summa_s_nds' => $model->summa_s_nds,
                            'nds' => $model->nds,
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


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);


        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['Schet'])) {
            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['Schet'])) {
                    $model->attributes = $_POST['Schet'];
                  //  $model->data_scheta = new CDbExpression('NOW()');
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
                $this->renderPartial('_form', array('model' => $model,), false, true);


            } else {
                $this->render('update', array('model' => $model,));
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

        $this->loadModel($id)->delete();
        if (Yii::app()->request->isAjaxRequest) {
            echo 'Запись успешно удалена ';
            Yii::app()->end();
        }

    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Schet');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Schet('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Schet']))
            $model->attributes = $_GET['Schet'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Schet the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Schet::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Schet $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'schet-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }



    public function actionEmailSchet($id)
    {
        if (isset($id)) {

            $_POST['dog_id'] = $id;
            $_POST['email'] = 1;
            $print= Yii::app()->createController('Universaldocument');
            $document_url=$print[0]->actionPrintSchet($id);
            $mail = new YiiMailer();
            $mail->ClearAddresses();
            $mail->ContentType = 'text/html';
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->clearLayout();//if layout is already set in config
            $mail->setFrom('mayakgeo@gmail.com', '');

            $mail->setTo($document_url['contragent_mail']); //'mr.universe@mail.ru'
            $mail->setSubject('Счет  для подписи');
            $mail->setBody('Добрый день! Просим  подписать счет и выслать оригинал почтой. Заранее благодарим');
            $path_to_webroot= str_replace("\\", "/", YiiBase::getPathOfAlias("webroot"));
            $path_to_webroot.= str_replace("\\", "/", iconv("UTF-8", "windows-1251", $document_url['document_path']));

            // $mail->AddAttachment($path_to_webroot);      // attachment

            $mail->AddAttachment($path_to_webroot);// Договор_109226  "C:/xampp/htdocs/synapsis/www

            if ($mail->send()) {
                $mail->ClearAllRecipients();
                echo  'Ваше письмо успешно отправлено клиенту !';
            } else {
                echo "    Ошибка передачи данных " . $mail->ErrorInfo;
            }


            //   list($controller) = Yii::app()->createController('Universaldocument');
            //     $url=$controller->actionPrintDogovor();
            //     $urlsdsd=$url;
            //     $wer= $urlsdsd;


        }


    }
}

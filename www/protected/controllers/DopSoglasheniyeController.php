<?php

class DopSoglasheniyeController extends Controller //Controller
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
        );
    }*/

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
  /*  public function accessRules()
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */


    public function actionCreate()
    {
        $model = new DopSoglasheniye;

        //проверка на наличие запроса из модалки посредством ajax
        if (Yii::app()->request->isAjaxRequest) {
            //проверка передачи айди договора при первом открытии формы если есть- то выводим саму форму


            if (isset($_POST['dog_id'])) {
                $dog_id = $_POST['dog_id'];
                $model->id_dogovor = $dog_id;

                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,), false, true);
            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['DopSoglasheniye'])) {
                    $model->attributes = $_POST['DopSoglasheniye'];
                    $model->RaschetSumm();

                    //   $model->author_id = Yii::app()->user->id;

                    if ($model->save()) {
                        $model->CreateSchet();

                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',
                            'summa_nds' => $model->summa_nds,
                            'summa' => $model->summa,
                            'nds' => $model->nds,
                            'summa_avansa' => $model->summa_avansa,
                            'avans_procent' => $model->avans_procent,
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
        else {


            //  $this->render('create',array( 'model'=>$model,));


        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {


        $model = $this->loadModel($id);


        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['DopSoglasheniye'])) {
            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['DopSoglasheniye'])) {
                    $model->attributes = $_POST['DopSoglasheniye'];
                    $model->data = new CDbExpression('NOW()');
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
                // $this->renderPartial('admin', array('model' => VidRabotPoDogovoru::model(),), false, true);


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
        $dataProvider = new CActiveDataProvider('DopSoglasheniye');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new DopSoglasheniye('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['DopSoglasheniye']))
            $model->attributes = $_GET['DopSoglasheniye'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    public function loadModel($id)
    {
        $model = DopSoglasheniye::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


    public function actionInfoByDogovor($id)
    {

        $dataProvider = DopSoglasheniye::model()->DopSoglasheniyeByDogovor($id);
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('soglasheniye_list_for_dogovor_modal', array('dataProvider_soglasheniye' => $dataProvider,), false, true);
        } else {
            $this->renderPartial('soglasheniye_list_for_dogovor_modal', array('dataProvider_soglasheniye' => $dataProvider,), false, true);
            //  $this->render('list_for_dogovor_modal', array('dataProvider' => $dataProvider,));
        }

    }


    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dop-soglasheniye-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }






    public function actionEmailDopSoglasheniye($id)
    {
        if (isset($id)) {

            $_POST['dog_id'] = $id;
            $_POST['email'] = 1;
            $print= Yii::app()->createController('Universaldocument');
            $document_url=$print[0]->actionPrintDopSoglasheniye($id);
            $mail = new YiiMailer();
            $mail->ClearAddresses();
            $mail->ClearAttachments() ;
            $mail->ContentType = 'text/html';
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->clearLayout();//if layout is already set in config
            $mail->setFrom('mayakgeo@gmail.com', '');

            $mail->setTo($document_url['contragent_mail']); //'mr.universe@mail.ru'
            $mail->setSubject('Доп. соглашение  для подписи');
            $mail->setBody('Добрый день! Просим  подписать Доп. соглашение и выслать оригинал почтой. Заранее благодарим');
            $path_to_webroot= str_replace("\\", "/", YiiBase::getPathOfAlias("webroot"));
            $path_to_webroot.= str_replace("\\", "/", iconv("UTF-8", "windows-1251", $document_url['document_path']));

            // $mail->AddAttachment($path_to_webroot);      // attachment

            $mail->AddAttachment($path_to_webroot);// Договор_109226  "C:/xampp/htdocs/synapsis/www

            if ($mail->send()) {
                $mail->ClearAllRecipients();
                $mail->ClearAttachments() ;
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

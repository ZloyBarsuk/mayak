<?php

class CalendarController extends Controller
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
   /* public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'calendarevents', 'loadcalendar', 'create', 'update'),
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


    public function actionLoadCalendar()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $items = array();
            $model = EventFullcalendar::model()->findAllByAttributes(array('responsible' => Yii::app()->user->id,  'status' => 1)); // 'date_start' => date('Y-m-d'),
            foreach ($model as $value) {
                $items[] = array(
                    'id' => $value->id,
                    'title' => $value->title,
                    'start' => $value->date_start,
                    'end' => $value->date_end,
                    //	'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->date_end))),
                    //'color'=>'#CC0000',
                    //'allDay'=>true,
                    //'url'=>'http://anyurl.com'
                );
            }

            $this->renderPartial('load_in_dialog_view', array('events' => CJSON::encode($items)), false, true);

        }

    }


    public function actionCalendarEvents()
    {
        $items = array();
        $model = EventFullcalendar::model()->findAllByAttributes(array('responsible' => Yii::app()->user->id,  'status' => 1)); // 'date_start' => date('Y-m-d'),
        foreach ($model as $value) {
            $items[] = array(
                'id' => $value->id,
                'title' => $value->title,
                'start' => $value->date_start,
                'end' => date('Y-m-d', strtotime('+1 day', strtotime($value->date_end))),
                //'color'=>'#CC0000',
                //'allDay'=>true,
                //'url'=>'http://anyurl.com'
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }

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


        if (Yii::app()->request->isAjaxRequest) {
            $model = new EventFullcalendar;
            if (!isset($_POST['EventFullcalendar'])) {
                // если первый раз создаем догвоор


                $this->renderPartial('_form', array('model' => $model,), false, true);
            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['EventFullcalendar'])) {
                    $model->attributes = $_POST['EventFullcalendar'];
                    $model->author = Yii::app()->user->id;
                    $model->record_date = date("Y-m-d");
                    // $model->id = 2;


                    if ($model->save()) {

                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',


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
        if (isset($_POST['EventFullcalendar'])) {
            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['EventFullcalendar'])) {
                    $model->attributes = $_POST['EventFullcalendar'];
                    //  $model->record_date = new CDbExpression('NOW()');
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

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('EventFullcalendar');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new EventFullcalendar('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EventFullcalendar']))
            $model->attributes = $_GET['EventFullcalendar'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EventFullcalendar the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = EventFullcalendar::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EventFullcalendar $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'event-fullcalendar-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

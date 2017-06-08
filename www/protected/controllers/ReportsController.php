<?php

class ReportsController extends Controller //SBaseController //Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';


    public function actionOborotDogovor()
    {


        if (Yii::app()->request->isAjaxRequest) {
            $dogovor_model = Dogovor::model()->findByAttributes(array('dogovor_number' => $_POST['Reports']['dog_number']));
          //  var_dump($dogovor_model);
          //  exit();
            $schet_oplachen=array();
            $schet_ne_oplachen=array();
            $dop_sogl_summa=array();
            if($dogovor_model!==null)
            {
                $schet_model = Schet::model()->findAllByAttributes(array('id_dogovor' =>$dogovor_model->id));
                $dop_sogl_model = DopSoglasheniye::model()->findAllByAttributes(array('id_dogovor' =>$dogovor_model->id));

                $dogovor_summa=$dogovor_model->summa_dogovora_nachalnaya;


                foreach ($schet_model as $model=>$value)
                {
                    if($value['status']=='оплачен')
                    {
                        $schet_oplachen[]=(float) $value['summa_bez_nds'];
                    }
                    else{
                        $schet_ne_oplachen[]=(float) $value['summa_bez_nds'];
                    }

                }
                if($dop_sogl_model!==null)
                {
                    foreach ($dop_sogl_model as $model=>$value)
                    {

                        $dop_sogl_summa[]=(float) $value['summa'];


                    }
                }


                $total_dogovor_summa=$dogovor_summa+array_sum($dop_sogl_summa);
                $schet_oplachen=array_sum($schet_oplachen);
                $schet_ne_oplachen=array_sum($schet_ne_oplachen);
                $report=array(
                    'total_dogovor_summa'=>$total_dogovor_summa,
                    'schet_oplachen'=>$schet_oplachen,
                    'schet_ne_oplachen'=>$schet_ne_oplachen,
                    'total'=>$total_dogovor_summa-$schet_oplachen,
                    'dogovor_number'=>$dogovor_model->dogovor_number,
                    'dogovor_created'=>$dogovor_model->created_date,
                    'dogovor_assigned'=>$dogovor_model->podpisan_date,
                );
            }

            echo json_encode($report);


        }
    }


    public function actionChartView()
    {


        $criteria = new CDbCriteria;


        $dataProvider = new CActiveDataProvider('Dogovor',
            array(
                'criteria' => $criteria,
            )
        );

        //json formatted ajax response to request
        //  if(isset($_GET['json']) && $_GET['json'] == 1){
        $count = Dogovor::model()->count();
        for ($i = 1; $i <= $count; $i++) {
            $data = Dogovor::model()->findByPk($i);
        }
        echo CJSON::encode($dataProvider->getData());
        //  }else{
        $this->render('admin', array(
            'dataProvider' => $dataProvider,
        ));
        //  }

    }


    public function actionIndex()
    {

        $model = new Reports;


        $this->render('report', array(
            'model' => $model,
        ));
        //  $this->renderPartial('create_in_dialog_view', array('dogovor_model' => $model,), false, true);

        //   $this->actionChartView();

    }


    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'oborot-dogovor-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}

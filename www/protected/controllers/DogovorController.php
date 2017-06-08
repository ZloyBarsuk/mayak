<?php

class DogovorController extends Controller //SBaseController //Controller
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
    /*public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'infodialog', 'infobydogovor', 'unblock', 'test', 'showpropuskform'
                ,'actobsledovaniya','tehzadaniye','dopsvedeniya',
                    'obracheniye','zayavadopsvedeniya'),
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


    public function actionShowPropuskForm()
    {
        //  if (Yii::app()->request->isAjaxRequest) {


        $this->renderPartial('propusk_form_view', array(), false, true);

        //  }
    }


    public function actionInfoDialog($id_dogovor)
    {

        $model = $this->loadModel($id_dogovor);
        // $contragent=Contragent::model()->findByPk($model->id_contragent);

        // $contragent = Ispolnitel::model()->getDogovora($model->);
        $this->renderPartial('dialog_view', array(
            'dogovor_model' => $model,
            //  'contragent_model' => $contragent,

        ), false, true);

        /* $this->renderPartial('dialog_view',array(
            'model'=>$this->loadModel($id_dogovor),
        ), false, true); */
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Dogovor the loaded model
     * @throws CHttpException
     */


    public function loadModel($id)
    {
        $model = Dogovor::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),

        ));
    }


    public function actionActObsledovaniya()
    {
        if (isset($_POST['object_id'])) {
            $object_id = $_POST['object_id'];

            $this->renderPartial('act_obsledovaniya_form_view', array('id_object' => $object_id), false, true);
        } else {

            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',


            ));
            Yii::app()->end();
        }


    }

    public function actionTehzadaniye()
    {
        if (isset($_POST['object_id'])) {
            $object_id = $_POST['object_id'];

            $this->renderPartial('tehzadaniye_form_view', array('id_object' => $object_id), false, true);
        } else {

            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',


            ));
            Yii::app()->end();
        }


    }

    public function actionDopsvedeniya()
    {
        if (isset($_POST['object_id'])) {
            $object_id = $_POST['object_id'];

            $this->renderPartial('dopsvedeniya_form_view', array('id_object' => $object_id), false, true);
        } else {

            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',


            ));
            Yii::app()->end();
        }


    }


    public function actionObracheniye()
    {
        if (isset($_POST['object_id'])) {
            $object_id = $_POST['object_id'];

            $this->renderPartial('obracheniye_form_view', array('id_object' => $object_id), false, true);
        } else {

            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',


            ));
            Yii::app()->end();
        }


    }


    public function actionZayavaDopsvedeniya()
    {
        if (isset($_POST['object_id'])) {
            $object_id = $_POST['object_id'];
            $this->renderPartial('zayava_dopsvedeniya_form_view', array('id_object' => $object_id), false, true);
        } else {

            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',


            ));
            Yii::app()->end();
        }


    }


    /*public function actionTest()
    {
        $stavka_nds = Yii::app()->db->createCommand()
            ->select('stavka.stavka_nds')
            ->from('ispolnitel_info ispolnitel')
            ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('ispolnitel.id=:id', array(':id' =>1))
            ->order('ispolnitel.id desc')
            ->limit('1')
            ->queryRow();
        $nds_stavka = (double)$stavka_nds['stavka_nds'];
        $summa_bez_nds = $this->summa_dogovora_nachalnaya;
        $summa_s_nds = $this->summa_nds;
        $avans_procent = $this->avans_procent;
        $avans_rub = $this->summa_avansa;



    }*/

    public function actionCreate()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new Dogovor;
            if (!isset($_POST['Dogovor'])) {
                // если первый раз создаем догвоор

                $model->id = 0;

                $this->renderPartial('create_in_dialog_view', array('dogovor_model' => $model,), false, true);
            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['Dogovor'])) {
                    $this->performAjaxValidation($model);
                    $model->attributes = $_POST['Dogovor'];
                    $model->updated_date = date('Y-m-d H:i:s');

                    $model->RaschetSumm();


                    if ($model->save()) {
                        // $model->AddAttributes();
                        // блокируем договр,чтобы никто не смог пока его править, пока он открыт тем. кто его создал
                        //     $model->BlockDogovor();
                        $model->CreateSchet();
                        $model->LoggerInsert();
                        // формируем счет на основании договора автоматически
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',
                            'dogovor_number_new' => $model->dogovor_number,
                            'summa_s_nds' => $model->summa_nds,
                            'nds' => $model->nds,
                            'avans_summa' => $model->summa_avansa,
                            'avans_procent' => $model->avans_procent,
                            'dogovor_id' => $model->id,

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
     * Performs the AJAX validation.
     * @param Dogovor $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dogovor-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */

    public function actionOtchet($id)
    {

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
        date_default_timezone_set('Europe/London');

        Yii::import('ext.phpexcel.PHPExcel');


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
            ->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle('1:1')->getFont()->setBold(true);

        $objPHPExcel->getProperties()->setCreator("Andrew Dombrovsky")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");


// Заголовки таблицы
        $objPHPExcel->setActiveSheetIndex(0)
            // данные адерсов

            ->setCellValue('A1', '' /*'ID договора' */)
            ->setCellValue('B1', 'Архив. номер адреса')
            ->setCellValue('C1', 'Адрес')
            ->setCellValue('D1', 'Площадь кв.м.' /*'Кад. номер' */)
            ->setCellValue('E1', 'Район')
            ->setCellValue('F1', 'ТГР (передача в РО)')
            // данные этапов работ

            ->setCellValue('G1', 'Доп.сведения (исх.номер заявления на выдачу в ФБУ ЗКП)')
            ->setCellValue('H1', 'Доп.сведения (вх.номер заявления на выдачу в ФБУ ЗКП)')
            ->setCellValue('I1', 'Доп.сведения (получение)')
            ->setCellValue('J1', 'ТГР (подготовка)')
            ->setCellValue('K1', 'ТГР (передача в ФБУ ЗКП)')
            ->setCellValue('L1', 'ТГР (получение акта приемки)')
            // полевые , камеральные работы

            ->setCellValue('M1', 'Поле отв. лицо1')
            ->setCellValue('N1', 'Поле отв. лицо2')
            ->setCellValue('O1', 'Поле выдача')
            ->setCellValue('P1', 'Поле сдача')
            ->setCellValue('Q1', 'Камералка отв. лицо')
            ->setCellValue('R1', 'Камералка выдано')
            ->setCellValue('S1', 'Камералка сдана')
            ->setCellValue('T1', 'Межевой отв. лицо')
            ->setCellValue('U1', 'Межевой сдан');

        foreach (range('A', 'Y') as $columnID) {

            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);

        }

        $all_users = Yii::app()->db->createCommand("select id,familiya from tbl_users")->queryAll();

        $dog_num = Yii::app()->db->createCommand("select dogovor_number from dogovor where id=" . $id)->queryRow();


        $users = array();

        foreach ($all_users as $key => $value) {
            $users[$value['id']] = $value['familiya'];
        }

        $all_adresses = Yii::app()->db->createCommand("select DISTINCT ob.id,ob.id_dogovor,ob.archiv_number,ob.adress,ob.kadastroviy_nomer,ob.plochad_rabot,
" . "(select spr_rayony.naimenovaniye  from spr_rayony where spr_rayony.id = ob.id_rayon) as rayon" . "
 from object_rabot ob left join etap_rabor_po_objectu et on ob.id = et.id_objecta WHERE ob.id_dogovor=" . (int)$id)->queryAll();


        $row_number = 2;

        $etap_shablon = array(
            2 => 'G',
            3 => 'H',
            4 => 'I',
            8 => 'J',
            9 => 'K',
            10 => 'L',
            67 => 'F',
        );


        if (!empty($all_adresses)) {


            foreach ($all_adresses as $adress) {
                //  echo  $adress['qwe']."<br>";
                //  echo  $adress['id_dogovor']."<br>";

                //   continue;
// адреса
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $row_number, '' /*$adress['id_dogovor']*/)
                    ->setCellValue('B' . $row_number, $dog_num['dogovor_number'] . "-" . $adress['archiv_number'])
                    ->setCellValue('C' . $row_number, $adress['adress'])
                    ->setCellValue('D' . $row_number, $adress['plochad_rabot'] /*$adress['kadastroviy_nomer']*/)
                    ->setCellValue('E' . $row_number, $adress['rayon']);
                // ->setCellValue('F' . $row_number, );

                $all_etap_rabot_po_adresu = Yii::app()->db->createCommand(" SELECT etap.id_spr_etap_rabot as id_etap,etap.data_nachala_rabot,etap.data_okonchaniya_rabot,(
    SELECT users.familiya
FROM tbl_users users
WHERE etap.id_otvetstvennogo=users.id) AS otvet_person," . "(
SELECT etap_rabot
FROM spr_etap_rabot spr_etap
WHERE etap.id_spr_etap_rabot=spr_etap.id" . ") AS etap_name
FROM etap_rabor_po_objectu etap
WHERE  etap.id_spr_etap_rabot IN(2,3,4,8,9,10,67) AND etap.id_objecta=" . (int)$adress['id'])->queryALL();

                if (!empty($all_etap_rabot_po_adresu)) {
                    foreach ($all_etap_rabot_po_adresu as $etap) {
                        if (array_key_exists($etap['id_etap'], $etap_shablon)) {
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($etap_shablon[$etap['id_etap']] . $row_number, $etap['data_okonchaniya_rabot'] !== "0000-00-00" ? date('d.m.Y', strtotime($etap['data_okonchaniya_rabot'])) : "");
                        } else {
                            continue;
                        }
                    }
                }
                $all_pole_items = Yii::app()->db->createCommand("select * from soprovoditelniy_list where id_objecta=" . (int)$adress['id'])->queryRow();
                if ($all_pole_items) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $row_number, $users[$all_pole_items['id_polevik_1']])
                        ->setCellValue('N' . $row_number, $users[$all_pole_items['id_polevik_2']])
                        ->setCellValue('O' . $row_number, $all_pole_items['data_vidachi_pole'] !== "0000-00-00" ? date('d.m.Y', strtotime($all_pole_items['data_vidachi_pole'])) : "")
                        ->setCellValue('P' . $row_number, $all_pole_items['data_sdachi_pole'] !== "0000-00-00" ? date('d.m.Y', strtotime($all_pole_items['data_sdachi_pole'])) : "")
                        ->setCellValue('Q' . $row_number, $users[$all_pole_items['id_kameralka']])
                        ->setCellValue('R' . $row_number, $all_pole_items['data_vidachi_kameralka'] !== "0000-00-00" ? date('d.m.Y', strtotime($all_pole_items['data_vidachi_kameralka'])) : "")
                        ->setCellValue('S' . $row_number, $all_pole_items['data_sdachii_kameralka'] !== "0000-00-00" ? date('d.m.Y', strtotime($all_pole_items['data_sdachii_kameralka'])) : "")
                        ->setCellValue('T' . $row_number, $users[$all_pole_items['id_mejevoy']])
                        ->setCellValue('U' . $row_number, $all_pole_items['data_sdachi_mejevoy'] !== "0000-00-00" ? date('d.m.Y', strtotime($all_pole_items['data_sdachi_mejevoy'])) : "");
                }
                ++$row_number;
                //
            }
        } else {
            echo "До этому договору ($id) отсутствуют этапы работ !!!";
        }
// var_dump($subquery);

        //    exit();


        //    exit();


// Miscellaneous glyphs, UTF-8


// Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('ОТЧЁТ');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Договор_' . $id . '.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;


    }


    public function actionXlsImport()
    {

        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['Dogovor']) && isset($_POST['file_name']) && isset($_POST['ObjectRabot'])) {
                /*
                    рабочая хуйня

                        $path_to_file = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.'files' .DIRECTORY_SEPARATOR. $_POST['file_name'];
                        $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", "/", "(", " ", "  ");

                        $excelFile = "qwe.xlsx";
                        $sheet_array = Yii::app()->yexcel->readActiveSheet($path_to_file);
                        foreach( $sheet_array as $row ) {
                            foreach( $row as $column ){
                        }
                    }

                        echo $sheet_array[1]['A'];

                   рабочая хуйня


         */
                $path_to_file = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $_POST['file_name'];
                $id_rayon = $_POST['ObjectRabot']['id_rayon'];
                $id_dogovor = $_POST['Dogovor']['id'];

                $dogovor_model = Dogovor::model()->findByPk((int)$id_dogovor);

                //  echo $count_adresses;

                if ($dogovor_model !== null) {
                    $count_adresses = ObjectRabot::model()->count('id_dogovor=:id', array(':id' => (int)$id_dogovor));
                    $next_arch_number = $count_adresses++;


                    Yii::import('application.vendors.PHPExcel', true);

                    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                    $objPHPExcel = $objReader->load($path_to_file); //$file --> your filepath and filename
                    $all_data = $objPHPExcel->getActiveSheet()->toArray();

                    $records = 0;
                    // var_dump($ar_colls);
                    //  exit();
                    foreach ($all_data as $ar_colls) {


                        if ($ar_colls[0] == "Адрес") {

                            continue;
                        } else {
                            $new_adress_model = new ObjectRabot();
                            $new_adress_model->adress = trim($ar_colls[0]);
                            $new_adress_model->plochad_rabot = trim($ar_colls[1]);
                            $new_adress_model->kadastroviy_nomer = trim($ar_colls[2]);
                            $new_adress_model->data_dopsvedeniya = trim($ar_colls[3]);
                            $new_adress_model->record_date = new CDbExpression("NOW()");
                            $new_adress_model->id_rayon = trim((int)$id_rayon);
                            $new_adress_model->id_avtor = Yii::app()->user->id;
                            $new_adress_model->id_dogovor = $id_dogovor;
                            $new_adress_model->archiv_number = $next_arch_number;
                            $new_adress_model->save();
                            unset($new_adress_model);
                            $next_arch_number++;

                            $records++;
                        }


                    }
                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => "Всего записано из файла $records адресов",
                    ));
                    Yii::app()->end();


                }


            }


        }
    }


    public function actionUpload()
    {

        Yii::import("ext.EAjaxUpload.qqFileUploader");
        if (isset($_GET['ispolnitel'])) {
            $folder = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;// folder for uploaded files
            $allowedExtensions = array("jpg", "jpeg", "png", "xls", "xlsx", "mov", "mp4");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 100 * 1024 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            $fileSize = filesize($folder . $result['filename']);//GETTING FILE SIZE
            $fileName = $result['filename'];//GETTING FILE NAME
            //$img = CUploadedFile::getInstance($model,'image');

            //  $model_ispolnitel = Ispolnitel::model()->findByPk((int)$_GET['ispolnitel']);
            $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", ")", "(", " ", "  ", "/");
            $folder = trim(str_replace($srting, "\\", $folder));
            //  $model_ispolnitel->signature_path = $folder . $fileName;
            echo $return;// it's array
        } else {

        }


    }


    public function actionModal($id)
    {


        $model = $this->loadModel($id);
        $object_model = new ObjectRabot();

        $this->renderPartial('load_adresa', array('dogovor_model' => $model, 'object_model' => $object_model), false, true);


    }


    public function actionUpdate($id)
    {
        //var_dump($_POST);

        $model = $this->loadModel($id);
        $model->old_dogovor_number = $model->dogovor_number;
        $model->old_id_ispolnitel = $model->id_ispolnitel;
        $model->old_contragent_id = $model->id_contragent;
        $VidRabot = $model->VidiRabot();

        $old_status = $model->status;
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['Dogovor'])) {
                if (Yii::app()->request->isAjaxRequest) {
                    $this->performAjaxValidation($model);
                    if (isset($_POST['Dogovor'])) {
                        $model->attributes = $_POST['Dogovor'];
                        $model->RaschetSumm();
                        //  $notify = '';
                        $notify = $model->CheckZakritiye($old_status);
                        // $model->ChangeDocumentFolder();
                        $model->updated_date = date('Y-m-d H:i:s');
                        if ($model->save()) {

                            $model->LoggerInsert();


                            echo CJSON::encode(array(
                                'status' => 'true',
                                'message' => 'Данные успешно записаны  ' . $notify
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
                if ($model->CheckUserIsOwner()) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span></button><strong>ОЙ! </strong> Кто-то открыл этот договор для редактирования раньше Вас! :) </div>';
                    Yii::app()->end();
                } else {
                    // записываем разблокировку договора
                    //   $model->UnblockDogovor();
                    $this->renderPartial('dialog_view', array('dogovor_model' => $model,'VidRabot_model' => $VidRabot), false, true);
                }

            }

        } else {

        }


    }

    /**
     * Manages all models.
     */
    public
    function actionAdmin()
    {

        $model = new Dogovor('search');

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dogovor']))
            $model->attributes = $_GET['Dogovor'];


        //    var_dump($model);
        //  exit();


        $this->render('admin', array(
            'model' => $model,
        ), false, true);
    }


    public function actionMakeDirectoryAll()
    {
        $model = new Dogovor();
        echo $model->MakeDirectoryAll();
    }

    public function actionRecreateALL()
    {
        $model = new Dogovor();
        echo $model->RecreateALL();
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public
    function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public
    function actionIndex()
    {

// выбираем все срочные и  просроченые догвоора
        $model_calendar = EventFullcalendar::model()->findAllByAttributes(array('responsible' => Yii::app()->user->id, 'date_start' => date("Y-m-d"), 'status' => 1));
        $dataProvider = new Dogovor('ProsrocheniyDogovor');
        if (isset($_GET['ProsrocheniyDogovor']))
            $dataProvider->attributes = $_GET['ProsrocheniyDogovor'];
        $this->render('main', array('prosrochka' => $dataProvider, 'calendar' => count($model_calendar), 'events' => $model_calendar));


        //    $this->actionAdmin();

        // $dataProvider=new CActiveDataProvider('Dogovor');
        /* $this->render('index',array(
           'dataProvider'=>$dataProvider,
       )); */
    }

    public
    function actionUnblock()
    {
        if (isset($_POST['id_dogovor_block'])) {
            $model = $this->loadModel((int)$_POST['id_dogovor_block']);
            //  if ($model !== null && $model->opened_by_id == Yii::app()->user->id && $model->block = 'Y') {
            if ($model->CheckIfBlocked()) {
                $model->UnblockDogovor();

                /*if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array('status' => 'true', 'message' => "Договор успешно разблокирован",));
                    Yii::app()->end();
                } else {
                    $this->actionAdmin();
                }*/
            }

        }


    }


    public
    function actionOpenFolder($id)
    {
        if (isset($id)) {
            $model = $this->loadModel($id);
            if (!empty($model->folder_path)) {

                $this->renderPartial('folder_frame_view', array('folder_path' => $model->folder_path,), false, true);
                Yii::app()->end();
                $srting = array("/");
                $folder_path = /* YiiBase::getPathOfAlias("webroot").*/
                    '/' . $model->folder_path;
                $folder_path = iconv("UTF-8", "windows-1251", $folder_path);
                $folder_path = trim(str_replace($srting, "\\", $folder_path));
                //  $folder_path = trim(str_replace('/', "\\\\", $folder_path));
                exec("explorer \\192.168.1.45" . $folder_path);
                //  exec("start c:\\xampp\\htdocs");
                // $this->renderPartial('folder_frame_view', array('folder_path' => $model->folder_path,), false, true);
            } else {

            }


        }


    }


    public
    function actionEmailDogovor($id)
    {
        if (isset($id)) {

            $_POST['dog_id'] = $id;
            $_POST['email'] = 1;
            $print = Yii::app()->createController('Universaldocument');
            $document_url = $print[0]->actionPrintDogovor();
            $mail = new YiiMailer();
            $mail->ClearAddresses();
            $mail->ContentType = 'text/html';
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->clearLayout();//if layout is already set in config
            $mail->setFrom('mayakgeo@gmail.com', '');
            $mail->setTo($document_url['contragent_mail']); //'mr.universe@mail.ru'
            $mail->setSubject('Договор для подписи');
            $mail->setBody('Добрый день! Просим  подписать договор и выслать оригинал почтой. Заранее благодарим');
            $path_to_webroot = str_replace("\\", "/", YiiBase::getPathOfAlias("webroot"));
            $path_to_webroot .= str_replace("\\", "/", iconv("UTF-8", "windows-1251", $document_url['document_path']));
            // $mail->AddAttachment($path_to_webroot);      // attachment

            $mail->AddAttachment($path_to_webroot);// Договор_109226  "C:/xampp/htdocs/synapsis/www

            if ($mail->send()) {
                $mail->ClearAllRecipients();
                echo 'Ваше письмо успешно отправлено клиенту !';
            } else {
                echo "    Ошибка передачи данных " . $mail->ErrorInfo;
            }


            //   list($controller) = Yii::app()->createController('Universaldocument');
            //     $url=$controller->actionPrintDogovor();
            //     $urlsdsd=$url;
            //     $wer= $urlsdsd;


        }


    }


    public
    function actionComments()
    {

        $model = Dogovor::model()->attributeLabels();
        echo $model['created_date'];
        var_dump($model);
    }

}

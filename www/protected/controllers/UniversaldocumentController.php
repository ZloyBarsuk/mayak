<?php
header('Content-type: text/html; charset=utf-8');

class UniversaldocumentController extends Controller
{


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
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'copy', 'printdogovor', 'printsoprovod', 'printdoverennost', 'printschet', 'testprint',
                    'printdopsoglasheniye', 'printpropusk', 'printactobsledovaniya', 'printact', 'Barcodes',
                    'printtehzadaniye', 'printdopsvedeniya', 'printzayavadopsvedeniya', 'printobracheniye', 'MakeDirectory'),
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
    }


    public function actionIndex()
    {

        $temp_template = DocumentTemplates::model()->findAllByPk(29);
        $temp_template = $temp_template[0]->content;
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('dejavusans', '', 10);
        $pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
        $pdf->setFooterData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
        $tagvs = array('h1' => array(0 => array('h' => 1, 'n' => 3), 1 => array('h' => 1, 'n' => 2)), 'h2' => array(0 => array('h' => 1, 'n' => 2), 1 => array('h' => 1, 'n' => 1)));
        $pdf->setHtmlVSpace($tagvs);
        $pdf->AddPage();
        $pdf->writeHTML($temp_template, true, false, true, false, 'С');
        $pdf->LastPage();
        $pdf->Output(Yii::app()->request->baseUrl . "HTML_TEST.pdf", "F");


    }

    // Печать догоовра

    public function actionPrintDogovor()
    {

        Yii::import('application.vendors.ncl*');
        require_once('NCL.NameCase.ru.php');
        //  Yii::import('application.vendors.docxgen*');
        // require_once('phpDocx.php');
        //  $dog_id = 414139;
        //  $_POST['dog_id']=$dog_id;
        if (isset($_POST['dog_id']) && isset($_POST['stamp'])) {
            $dog_id = (int)$_POST['dog_id'];
            $stamp_status = (int)$_POST['stamp'];
        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'Ошибка печати договора! Возможно забыли привязать банк к контрагенту'
            ));

            Yii::app()->end();

        }
        // $dog_id =414139;
        //  echo "sdfdsf";
        //   Yii::app()->end();


        $dogovor_model = Dogovor::model()->findByPk($dog_id);
        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        $isplnitel_nds = SprNdsInfo::model()->findByPk($ispolnitel_info_model[0]->nds);

        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        // адреса работ
        $adress_model = Yii::app()->db->createCommand('select adress,archiv_number from object_rabot where id_dogovor =' . $dogovor_model->id)->queryAll();
        $adress_str = array();
        $table_row = '';
        $item_number = 1;
        foreach ($adress_model as $value) {
            array_push($adress_str, $value['archiv_number'] . ') ' . $value['adress']); // $adress_string .=','. $value['adress'];
        }
        $adress_string = implode(',', $adress_str);
// виды работ

        /* $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
             on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dogovor=' . $dogovor_model->id . '  GROUP BY spr_rabot.naimenovaniye ORDER BY vid_rabot.data ASC')->queryAll();*/

        $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dogovor=' . $dogovor_model->id)->queryAll();


        // обработка видов работ
        $vid_rabot_string = '';
        $summa = 0;
        foreach ($vid_rabot as $value) {
            $vid_rabot_string .= $value['naimenovaniye'] . ",";
            //  $summa += (double)$value['summa'];

        }

        $search_template_yur_lico = array(
            // шапка
            '{dogovor_number}',
            '{create_day}',
            '{create_month}',
            '{create_yaer}',
            '{contragent}',
            '{contragent_director}',
            '{osnovaniye_dogovora}',
            '{ispolnitel}',
            '{ispolnitel_director}',
            '{ispolnitel_osnovanie}',
            '{vid_rabot}',
            '{object_rabot}',
            '{ispolnitel}',
            '{soglasno}',
            // стоимость
            '{srok_vida_rabot}',
            '{vid_dney}',
            '{cena_dogovora}', // сумма без ндс
            '{summa_dogovora}',// сумма без ндс
            '{summa_itogo}', // сумма без ндс
            '{nds}', // ндс
            '{summa_vsego_nds}', // сумма с ндс
            '{avans_procent}',
            '{summa_vsego_k_oplate}',
            '{summa_propis}',
            '{nds_procent}',
            '{nds}',
            '{nds_propis}',


// данные реквизитов

            // контрагента
            '{contragent_name}',
            '{contragent_adress}',
            '{contragent_inn_kpp}',
            '{contragent_rs}',
            '{contragent_bank}',
            '{contragent_ks}',
            '{contragent_info}',
            '{contragent_bic}',

            '{contragent_mail}',
            '{contragent_director_podpis}',

            // исполнителя
            '{ispolnitel_name}',
            '{ispolnitel_adress}',
            '{ispolnitel_inn_kpp}',
            '{ispolnitel_rs}',
            '{ispolnitel_bank}',
            '{ispolnitel_ks}',
            '{ispolnitel_info}',
            '{ispolnitel_bic}',

            '{ispolnitel_mail}',
            '{podpis}',
            '{ispolnitel_director_podpis}',

        );

        $data = explode('-', $dogovor_model->created_date);
        $nc = new NCLNameCaseRu();
        $gender = $nc->genderDetect($contragent_model[0]->name);
        // $contragent_director=  $nc->q("Русаков Михаил Юрьевич");


        // получаем в родительно мпадеже названия Контрагента
        $contragent_name_fiz_lico = $nc->q($contragent_model[0]->name);
        $contragent_director = $nc->q($contragent_info_model[0]->director);
        $contragent_director_doljnost = $nc->q($contragent_info_model[0]->doljnost);
        $contragent_osnovanie = $nc->q($contragent_info_model[0]->osnovaniye_dogovora);


        // получаем в родительно мпадеже названия Исполниетя


        $ispolnitel_director = $nc->q($ispolnitel_info_model[0]->director);
        $ispolnitel_director_doljnost = $nc->q($ispolnitel_info_model[0]->doljnost);
        $ispolnitel_osnovanie = $nc->q($ispolnitel_info_model[0]->osnovaniye_dogovora);


        $replace_template_yur = array(

            // шапка
            // $dogovor_model->dogovor_number,
            $number = substr($dogovor_model->dogovor_number, -3), // печать номера договора из 3 последних цифр
            $data[2],
            $this->date_to_month($data),
            $data[0],
            $contragent_model[0]->name . ', именуемое ',
            " в лице " . $contragent_director_doljnost[1] . " " . $contragent_director[1],
            // $contragent_info_model[0]->director,
            " действующего на основании " . $contragent_osnovanie[1],
            $ispolnitel_model->name,
            " в лице " . $ispolnitel_director_doljnost[1] . " " . $ispolnitel_director[1],
            // $contragent_info_model[0]->director,
            " действующего на основании " . $ispolnitel_osnovanie[1],

            //  $ispolnitel_info_model[0]->director,
            $vid_rabot_string,
            $adress_string . '.',
            $ispolnitel_model->name,
            $ispolnitel_model->id == '3' || $ispolnitel_model->id == '1' ? ',согласно главы 26.2 НК РФ' : '',
            // стоимость
            $dogovor_model->srok_dni,
            $dogovor_model->tip_dney == 'раб.' ? '(рабочие дни)' : '(календарные дни)',
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->nds,
            $dogovor_model->summa_nds,
            (int)$dogovor_model->avans_procent,
            $dogovor_model->nds !== '0.00' ? $dogovor_model->summa_nds : $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->nds !== '0.00' ? $this->num2str($dogovor_model->summa_nds) : $this->num2str($dogovor_model->summa_dogovora_nachalnaya),
            (int)$isplnitel_nds->stavka_nds,
            $dogovor_model->nds,
            $dogovor_model->nds !== '0.00' ? $this->num2str($dogovor_model->nds) : ' ноль рублей 00 копеек',
            // данные реквизитов
            // контрагента
            $contragent_model[0]->name,
            $contragent_info_model[0]->yur_address,
            'ИНН/КПП ' . $contragent_info_model[0]->inn . '/' . $contragent_info_model[0]->kpp,
            'р/с ' . $contragent_bank_info[0]->r_s,
            $contragent_bank[0]->name,
            'к/с ' . $contragent_bank_info[0]->k_s,
            '',// 'Телефон/факс: ' . $contragent_info_model[0]->phone . '/' . $contragent_info_model[0]->fax,
            'БИК ' . $contragent_bank_info[0]->bic,
            '', // $contragent_info_model[0]->email,
            $contragent_info_model[0]->director,
            // исполнителя
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address,
            'ИНН/КПП ' . $ispolnitel_info_model[0]->inn . '/' . $ispolnitel_info_model[0]->kpp,
            'р/с ' . $ispolnitel_bank_info[0]->r_s,
            $ispolnitel_bank[0]->name,
            'к/с ' . $ispolnitel_bank_info[0]->k_s,
            'Телефон/факс: ' . $ispolnitel_info_model[0]->phone . '/' . $ispolnitel_info_model[0]->fax,
            'БИК ' . $ispolnitel_bank_info[0]->bic,
            $ispolnitel_info_model[0]->email,
            $stamp_status ? '<img src="' . $ispolnitel_model->signature_path . '">' : '',
            $ispolnitel_info_model[0]->director,
        );


        $search_template_fiz_lico = array(
            // шапка
            '{dogovor_number}',
            '{create_day}',
            '{create_month}',
            '{create_yaer}',
            '{contragent}',
            '{contragent_director}',
            '{osnovaniye_dogovora}',
            '{ispolnitel}',
            '{ispolnitel_director}',
            '{ispolnitel_osnovanie}',
            '{vid_rabot}',
            '{object_rabot}',
            '{ispolnitel}',
            '{soglasno}',

            // стоимость
            '{srok_vida_rabot}',
            '{vid_dney}',
            '{cena_dogovora}', // сумма без ндс
            '{summa_dogovora}',// сумма без ндс
            '{summa_itogo}', // сумма без ндс
            '{nds}', // ндс
            '{summa_vsego_nds}', // сумма с ндс
            '{avans_procent}',
            '{summa_vsego_k_oplate}',
            '{summa_propis}',
            '{nds_procent}',
            '{nds}',
            '{nds_propis}',
            // данные реквизитов
            // контрагента
            '{contragent_name}',
            '{contragent_adress}',
            '{contragent_inn_kpp}',
            '{contragent_rs}',
            '{contragent_bank}',
            '{contragent_ks}',
            '{contragent_info}',
            '{contragent_bic}',
            '{contragent_mail}',
            '{contragent_director_podpis}',
            // исполнителя
            '{ispolnitel_name}',
            '{ispolnitel_adress}',
            '{ispolnitel_inn_kpp}',
            '{ispolnitel_rs}',
            '{ispolnitel_bank}',
            '{ispolnitel_ks}',
            '{ispolnitel_info}',
            '{ispolnitel_bic}',
            '{ispolnitel_mail}',
            '{podpis}',
            '{ispolnitel_director_podpis}',
        );

        $replace_template_fiz = array(
            // шапка
            $dogovor_model->dogovor_number,
            $data[2],
            $this->date_to_month($data[1]),
            $data[0],
            $gender == NCL::$MAN ? $contragent_model[0]->name . ', именуемый ' : $contragent_model[0]->name . ', именуемая ',
            //  $contragent_info_model[0]->director,
            '',// $contragent_name_fiz_lico[1], //  $contragent_director[1],
            '', // $contragent_info_model[0]->pasport,
            $ispolnitel_model->name,
            "в лице " . $ispolnitel_director_doljnost[1] . " " . $ispolnitel_director[1],
            // $contragent_info_model[0]->director,
            " действующего на основании " . $ispolnitel_osnovanie[0],
            $vid_rabot_string,
            $adress_string . '.',
            $ispolnitel_model->name,
            $ispolnitel_model->id == '3' || $ispolnitel_model->id == '1' ? ',согласно главы 26.2 НК РФ' : '',

            // стоимость
            $dogovor_model->srok_dni,
            $dogovor_model->tip_dney == 'раб.' ? '(рабочие дни)' : '(календарные дни)',
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->nds,
            $dogovor_model->summa_nds,
            (int)$dogovor_model->avans_procent,
            $dogovor_model->nds !== '0.00' ? $dogovor_model->summa_nds : $dogovor_model->summa_dogovora_nachalnaya,
            $dogovor_model->nds !== '0.00' ? $this->num2str($dogovor_model->summa_nds) : $this->num2str($dogovor_model->summa_dogovora_nachalnaya),
            (int)$isplnitel_nds->stavka_nds,
            $dogovor_model->nds,
            $dogovor_model->nds !== '0.00' ? $this->num2str($dogovor_model->nds) : 'ноль рублей 00 копеек',


// данные реквизитов

            // контрагента
            $contragent_model[0]->name,
            $contragent_info_model[0]->pasport,
            '', //  'ИНН/КПП ' . $contragent_info_model[0]->inn . '/' . $contragent_info_model[0]->kpp,
            '', //  'р/с ' . $contragent_bank_info[0]->r_s,
            '', //   $contragent_bank[0]->name,
            '', //   'к/с ' . $contragent_bank_info[0]->k_s,
            '',// 'Телефон/факс: ' . $contragent_info_model[0]->phone . '/' . $contragent_info_model[0]->fax,
            '', //   'БИК ' . $contragent_bank_info[0]->bic,
            '', // $contragent_info_model[0]->email,
            $contragent_model[0]->name,//    $contragent_info_model[0]->director,
            // исполнителя
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address,
            'ИНН/КПП ' . $ispolnitel_info_model[0]->inn . '/' . $ispolnitel_info_model[0]->kpp,
            'р/с ' . $ispolnitel_bank_info[0]->r_s,
            $ispolnitel_bank[0]->name,
            'к/с ' . $ispolnitel_bank_info[0]->k_s,
            'Телефон/факс: ' . $ispolnitel_info_model[0]->phone . '/' . $ispolnitel_info_model[0]->fax,
            'БИК ' . $ispolnitel_bank_info[0]->bic,
            $ispolnitel_info_model[0]->email,
            $stamp_status ? '<img src="' . $ispolnitel_model->signature_path . '">' : '',
            $ispolnitel_info_model[0]->director,

        );


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'dogovor', 'id' => $dogovor_model->id_template));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;


        if ($contragent_model[0]->type == 'юр.') {
            $html_template = str_replace($search_template_yur_lico, $replace_template_yur, $temp_template);

        } else {
            $html_template = str_replace($search_template_fiz_lico, $replace_template_fiz, $temp_template);

        }


        //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $tagvs = array('p' => array(0 => array('h' => 2, 'n' => 0), 1 => array('h' => 2, 'n'
        //  => 0)));
        //  $pdf->setHtmlVSpace($tagvs);
        // $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetAuthor('Nicola Asuni');
        //   $pdf->SetTitle('TCPDF Example 001');
        //   $pdf->SetSubject('TCPDF Tutorial');

        //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        //  $pdf->SetHeaderData('', 0, 'Information', 'All data in one');
        //   $pdf->setHeaderFont(Array('helvetica', '', 8));
        //    $pdf->setFooterFont(Array('helvetica', '', 6));
        /*  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(19, 10, 3);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 10);
          $pdf->AddPage();
          $pdf->writeHTML($html_template, true, false, true, false, 'С');
          $pdf->LastPage();*/
        // $pdf->Output(Yii::app()->request->baseUrl . "Contract.pdf", "F"); //   YiiBase::getPathOfAlias("webroot")
        //  $web_root = YiiBase::getPathOfAlias("webroot") .'\\'. $dogovor_model->folder_path ;
        $filename = iconv("UTF-8", "windows-1251", "Договор");
        $doc_template_name = iconv("UTF-8", "windows-1251", $title);
        // $doc_template_name = $title;

        // echo  Yii::app()->request->baseUrl;
        //  echo  Yii::app()->getRequest()->getBaseUrl(true) ;
        // echo Yii::app()->getRequest()->getBaseUrl(true).DIRECTORY_SEPARATOR . "templates".DIRECTORY_SEPARATOR.$title;


        ///echo Yii::getPathOfAlias('webroot');
        // exit();

        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


        $this->doccy->newFile($doc_template_name . '.docx');

        if ($contragent_model[0]->type == 'юр.') {
            // $html_template = str_replace($search_template_yur_lico, $replace_template_yur, $temp_template);
            for ($i = 0; $i < count($search_template_yur_lico); $i++) {

                //   var_dump($replace_template_yur);
                // echo $replace_template_yur[$i]."<BR>";
                $this->doccy->phpdocx->assign($search_template_yur_lico[$i], $replace_template_yur[$i]); // basic field mapping
            }

        } else {
            //  $html_template = str_replace($search_template_fiz_lico, $replace_template_fiz, $temp_template);
            for ($i = 0; $i < count($search_template_fiz_lico); $i++) {
                $this->doccy->phpdocx->assign($search_template_fiz_lico[$i], $replace_template_fiz[$i]); // basic field mapping
                //  var_dump($replace_template_fiz);
                //   exit();
            }
        }
        $this->doccy->save_template(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . ".docx");

        // $this->doccy->save_template($dogovor_model->dogovor_number.'docx');

        /* */


        //  $filename = iconv( "windows-1251","UTF-8", "Договор");
        //   $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . ".pdf", "F");

        if (isset($_POST['email'])) {
            return array('contragent_mail' => $contragent_info_model[0]->email, 'document_path' => "/" . $folder_path . '/' . "Договор" . '_' . $dogovor_model->dogovor_number . ".pdf");
        } else {
            // echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" .  $folder_path.'/'. "Договор" . '_' . $dogovor_model->dogovor_number . ".pdf", array('target' => '_blank'));
            echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . "/" . "Договор" . '_' . $dogovor_model->dogovor_number . ".pdf", array('target' => '_blank'));
        }


    }


    private function PrintDocumentsInWord($dogovor_model, $search_template_yur_lico, $replace_template_yur, $search_template_fiz_lico, $replace_template_fiz, $contragent_model, $filename, $title, $doc_number = '')
    {

        $doc_template_name = iconv("UTF-8", "windows-1251", $title);
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);
        $this->doccy->newFile($doc_template_name . '.docx');
        if ($contragent_model[0]->type == 'юр.') {
            for ($i = 0; $i < count($search_template_yur_lico); $i++) {
                $this->doccy->phpdocx->assign($search_template_yur_lico[$i], $replace_template_yur[$i]); // basic field mapping
            }
        } else {
            for ($i = 0; $i < count($search_template_fiz_lico); $i++) {
                $this->doccy->phpdocx->assign($search_template_fiz_lico[$i], $replace_template_fiz[$i]); // basic field mapping
            }
        }
        $this->doccy->save_template(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . "_" . $doc_number . ".docx");

    }


    public function behaviors()
    {
        return array(
            'doccy' => array(
                'class' => 'ext.doccy.Doccy',
            ),
        );
    }


    private function date_to_month($date)
    {

        switch ($date[1]) {
            case 1:
                return $m = 'января';
                break;
            case 2:
                return $m = 'февраля';
                break;
            case 3:
                return $m = 'марта';
                break;
            case 4:
                return $m = 'апреля';
                break;
            case 5:
                return $m = 'мая';
                break;
            case 6:
                return $m = 'июня';
                break;
            case 7:
                return $m = 'июля';
                break;
            case 8 :
                return $m = 'августа';
                break;
            case 9:
                return $m = 'сентября';
                break;
            case 10:
                return $m = 'октября';
                break;
            case 11:
                return $m = 'ноября';
                break;
            case 12:
                return $m = 'декабря';
                break;

        }
    }

    // печать дополнительного соглашения
    public function actionPrintDopSoglasheniye($id)
    {
        Yii::import('application.vendors.ncl*');
        require_once('NCL.NameCase.ru.php');
        $dopsoglasheniye_model = DopSoglasheniye::model()->findByPk($id);

        $dogovor_model = Dogovor::model()->findByPk((int)$dopsoglasheniye_model->id_dogovor);
        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        $isplnitel_nds = SprNdsInfo::model()->findByPk($ispolnitel_info_model[0]->nds);

        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        // адреса работ
        /* $adress_model = Yii::app()->db->createCommand('select adress from object_rabot where id_dogovor =' . $dogovor_model->id)->queryAll();
         $adress_string = '';
         $table_row = '';
         $item_number = 1;
         foreach ($adress_model as $value) {
             $adress_string .= $value['adress'] . "<br>";
         }*/

        // виды работ

        $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dopsoglasheniya=' . $dopsoglasheniye_model->id . '  GROUP BY spr_rabot.naimenovaniye')->queryAll();
        // обработка видов работ
        $vid_rabot_string = '';
        //  $summa = 0;
        foreach ($vid_rabot as $value) {
            $vid_rabot_string .= $value['naimenovaniye'] . ",";
            //  $summa += (double)$value['summa'];

        }

        $search_template_yur_lico = array(

            // шапка
            '{dop_soglacheniye_nomer}',
            '{dogovor_number}',
            '{dogovor_day}',
            '{dogovor_month}',
            '{dogovor_year}',
            '{current_day}',
            '{current_month}',
            '{current_year}',
            '{client_name}',

            '{client_doljnnost}',
            '{client_director}',

            '{client_osnovanie}',
            '{ispolnitel_doljnost}',
            '{ispolnitel}',

            '{ispolnitel_director}',
            '{ispolnitel_osnovanie}',
            '{dopsogl_number}',
            '{vidi_rabot}',
            '{dogovor_number}',
            '{dopsogl_summa}',
            '{dopsogl_summa_propis}',
            '{dogovor_number}',
            '{dopsogl_srok}',

            '{dogovor_number}',
            '{dogovor_day}',
            '{dogovor_month}',
            '{dogovor_year}',
            // данные реквизитов

            // контрагента
            '{contragent_name}',
            '{contragent_adress}',
            '{contragent_inn_kpp}',
            '{contragent_rs}',
            '{contragent_bank}',
            '{contragent_ks}',
            '{contragent_info}',
            '{contragent_mail}',
            '{contragent_director_podpis}',

            // исполнителя
            '{ispolnitel_name}',
            '{ispolnitel_adress}',
            '{ispolnitel_inn_kpp}',
            '{ispolnitel_rs}',
            '{ispolnitel_bank}',
            '{ispolnitel_ks}',
            '{ispolnitel_info}',
            '{ispolnitel_mail}',
            '{podpis}',
            '{ispolnitel_director_podpis}',

        );

        $data = explode('-', $dogovor_model->created_date);
        $current_date = explode('-', date("d-m-Y"));
        $nc = new NCLNameCaseRu();
        $gender = $nc->genderDetect($contragent_model[0]->name);
        // $contragent_director=  $nc->q("Русаков Михаил Юрьевич");

        $contragent_director = $nc->q($contragent_info_model[0]->director);
        $contragent_director_doljnost = $nc->q($contragent_info_model[0]->doljnost);
        $ispolnitel_director = $nc->q($ispolnitel_info_model[0]->director);
        $ispolnitel_osnovaniye_dogovora = $nc->q($ispolnitel_info_model[0]->osnovaniye_dogovora);
        $contragent_osnovaniye_dogovora = $nc->q($contragent_info_model[0]->osnovaniye_dogovora);

        $replace_template_yur = array(

            // шапка

            $dopsoglasheniye_model->number,
            substr($dogovor_model->dogovor_number, -3),

            $data[2],
            $this->date_to_month($data),
            $data[0],
            $current_date[0],
            $this->date_to_month($current_date),
            $current_date[2],

            $contragent_model[0]->name,
            $contragent_director_doljnost[1],
            $contragent_director[1],

            $contragent_osnovaniye_dogovora[1],
            // $contragent_info_model[0]->director,
            $ispolnitel_info_model[0]->doljnost,
            $ispolnitel_model->name,
            $ispolnitel_director[0],

            $ispolnitel_osnovaniye_dogovora[1],


            $dopsoglasheniye_model->number,
            $dopsoglasheniye_model->type == 'по виду работ' ? $vid_rabot_string : $dopsoglasheniye_model->name,
            $dogovor_model->dogovor_number,
            $dopsoglasheniye_model->nds !== '0.00' ? $dopsoglasheniye_model->summa_nds : $dopsoglasheniye_model->summa,

            $dopsoglasheniye_model->nds !== '0.00' ? $this->num2str($dopsoglasheniye_model->summa_nds) : $this->num2str($dopsoglasheniye_model->summa),

            $dogovor_model->dogovor_number,
            $dopsoglasheniye_model->srok_ispolneniya . " " . $dopsoglasheniye_model->tip_dney,
            $dogovor_model->dogovor_number,
            $data[2],
            $this->date_to_month($data),
            $data[0],

// данные реквизитов

            // контрагента
            $contragent_model[0]->name,
            "Юридический адрес: " . $contragent_info_model[0]->yur_address,
            "ИНН/КПП: " . $contragent_info_model[0]->inn . '/' . $contragent_info_model[0]->kpp,

            "р/с: " . $contragent_bank_info[0]->r_s,
            $contragent_bank[0]->name,
            "к/с: " . $contragent_bank_info[0]->k_s,
            $contragent_info_model[0]->phone . ' ' . $contragent_info_model[0]->fax,
            $contragent_info_model[0]->email,
            $contragent_info_model[0]->director,

            // исполнителя
            $ispolnitel_model->name,
            "Юридический адрес: " . $ispolnitel_info_model[0]->yur_address,
            "ИНН/КПП: " . $contragent_info_model[0]->inn . '/' . $ispolnitel_info_model[0]->kpp,


            "р/с: " . $ispolnitel_bank_info[0]->r_s,
            $ispolnitel_bank[0]->name,
            "к/с: " . $ispolnitel_bank_info[0]->k_s,
            "Тел./факс: " . $ispolnitel_info_model[0]->phone . ' ' . $ispolnitel_info_model[0]->fax,
            $ispolnitel_info_model[0]->email,
            // '<img src="' . $ispolnitel_model->signature_path . '"  style="width:167px; height167px;"/>',
            '',
            $ispolnitel_info_model[0]->director,

        );

        $search_template_fiz_lico = array(

            // шапка
            '{dop_soglacheniye_nomer}',
            '{dogovor_number}',
            '{dogovor_day}',
            '{dogovor_month}',
            '{dogovor_year}',
            '{current_day}',
            '{current_month}',
            '{current_year}',
            '{client_name}',

            '{client_doljnnost}',
            '{client_director}',

            '{client_osnovanie}',
            '{ispolnitel_doljnost}',
            '{ispolnitel}',

            '{ispolnitel_director}',
            '{ispolnitel_osnovanie}',
            '{dopsogl_number}',
            '{vidi_rabot}',
            '{dogovor_number}',
            '{dopsogl_summa}',
            '{dopsogl_summa_propis}',
            '{dogovor_number}',
            '{dopsogl_srok}',

            '{dogovor_number}',
            '{dogovor_day}',
            '{dogovor_month}',
            '{dogovor_year}',
            // данные реквизитов

            // контрагента
            '{contragent_name}',
            '{contragent_adress}',
            '{contragent_inn_kpp}',
            '{contragent_rs}',
            '{contragent_bank}',
            '{contragent_ks}',
            '{contragent_info}',
            '{contragent_mail}',
            '{contragent_director_podpis}',

            // исполнителя
            '{ispolnitel_name}',
            '{ispolnitel_adress}',
            '{ispolnitel_inn_kpp}',
            '{ispolnitel_rs}',
            '{ispolnitel_bank}',
            '{ispolnitel_ks}',
            '{ispolnitel_info}',
            '{ispolnitel_mail}',
            '{podpis}',
            '{ispolnitel_director_podpis}',
        );

        $replace_template_fiz = array(
            // шапка

            $dopsoglasheniye_model->number,
            substr($dogovor_model->dogovor_number, -3),

            $data[2],
            $this->date_to_month($data),
            $data[0],
            $current_date[0],
            $this->date_to_month($current_date),
            $current_date[2],
            $contragent_model[0]->name,
            //   $gender == NCL::$MAN ? $contragent_model[0]->name  : $contragent_model[0]->name ,
            $contragent_director_doljnost[1],
            $contragent_director[1],

            $contragent_info_model[0]->pasport,
            $ispolnitel_info_model[0]->doljnost,
            $ispolnitel_model->name,
            $ispolnitel_director[0],
            $ispolnitel_osnovaniye_dogovora[1],
            $dopsoglasheniye_model->number,
            $dopsoglasheniye_model->type == 'по виду работ' ? $vid_rabot_string : $dopsoglasheniye_model->name,
            $dogovor_model->dogovor_number,
            $dopsoglasheniye_model->nds !== '0.00' ? $dopsoglasheniye_model->summa_nds : $dopsoglasheniye_model->summa,
            $dopsoglasheniye_model->nds !== '0.00' ? $this->num2str($dopsoglasheniye_model->summa_nds) : $this->num2str($dopsoglasheniye_model->summa),
            $dogovor_model->dogovor_number,
            $dopsoglasheniye_model->srok_ispolneniya . " " . $dopsoglasheniye_model->tip_dney,
            $dogovor_model->dogovor_number,
            $data[2],
            $this->date_to_month($data),
            $data[0],


            // данные реквизитов
            // контрагента
            $contragent_model[0]->name,
            "", // "Юридический адрес: " . $contragent_info_model[0]->yur_address,
            "", // "КПП/ИНН: " . $contragent_info_model[0]->kpp . '/' . $contragent_info_model[0]->inn,
            "", //   "р/с: " . $contragent_bank_info[0]->r_s,
            "", //   $contragent_bank[0]->name,
            "", //   "к/с: " . $contragent_bank_info[0]->k_s,
            $contragent_info_model[0]->phone . ' ' . $contragent_info_model[0]->fax,
            $contragent_info_model[0]->email,
            "", //    $contragent_info_model[0]->director,
            // исполнителя
            $ispolnitel_model->name,
            "Юридический адрес: " . $ispolnitel_info_model[0]->yur_address,
            "ИНН/КПП: " . $contragent_info_model[0]->inn . '/' . $ispolnitel_info_model[0]->kpp,
            "р/с: " . $ispolnitel_bank_info[0]->r_s,
            $ispolnitel_bank[0]->name,
            "к/с: " . $ispolnitel_bank_info[0]->k_s,
            "Тел./факс: " . $ispolnitel_info_model[0]->phone . ' ' . $ispolnitel_info_model[0]->fax,
            $ispolnitel_info_model[0]->email,
            // '<img src="' . $ispolnitel_model->signature_path . '"  style="width:167px; height167px;"/>',
            '',
            $ispolnitel_info_model[0]->director,
        );


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'soglasheniye', 'id' => $dopsoglasheniye_model->id_template));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;

        if ($contragent_model[0]->type == 'юр.') {
            $html_template = str_replace($search_template_yur_lico, $replace_template_yur, $temp_template);
        } else {
            $html_template = str_replace($search_template_fiz_lico, $replace_template_fiz, $temp_template);

        }


        //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetAuthor('Nicola Asuni');
        //   $pdf->SetTitle('TCPDF Example 001');
        //   $pdf->SetSubject('TCPDF Tutorial');

        //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        //  $pdf->SetHeaderData('', 0, 'Information', 'All data in one');
        //   $pdf->setHeaderFont(Array('helvetica', '', 8));
        //    $pdf->setFooterFont(Array('helvetica', '', 6));
        //  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //  $pdf->SetMargins(15, 5, 5);
        //  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //  $pdf->SetPrintHeader(false);
        //  $pdf->SetPrintFooter(false);

        //  $pdf->SetFont('timesnewroman', '', 10);
        //  $pdf->AddPage();

        $filename = iconv("UTF-8", "windows-1251", "Доп.соглашение");
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


        /* PRINT in WORD 2007*/

        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur_lico, $replace_template_yur, $search_template_fiz_lico, $replace_template_fiz, $contragent_model, $filename, $title);

        /* */


        //  $pdf->writeHTML($html_template, true, false, true, false, 'С');
        //  $pdf->LastPage();
        //   $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dopsoglasheniye_model->number . ".pdf", "F");

        if (isset($_POST['email'])) {
            return array('contragent_mail' => $contragent_info_model[0]->email, 'document_path' => "/" . $folder_path . "/" . "Доп.соглашение" . '_' . $dopsoglasheniye_model->number . ".pdf");
        } else {
            echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . "/" . "Доп.соглашение" . '_' . $dopsoglasheniye_model->number . ".pdf", array('target' => '_blank'));

        }


    }

// Печать сопроводительного листа
    public function actionPrintSoprovod()
    {


        if (isset($_POST['dogovor_id']) && isset($_POST['adres'])) {
            $addresses = implode(',', $_POST['adres']);
            $dogovor_model = Dogovor::model()->findAllByPk($_POST['dogovor_id']);
            $ispolnitel_model = Ispolnitel::model()->findAllByPk($dogovor_model[0]->id_ispolnitel);

            $contragent_model = Contragent::model()->findAllByPk($dogovor_model[0]->id_contragent);
            $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model[0]->id_contragent), array(
                'order' => 'id desc',
                'limit' => '1',
            ));

            $adress_model = Yii::app()->db->createCommand('select adress,kadastroviy_nomer,plochad_rabot from object_rabot where id IN(' . $addresses . ')')->queryAll();

            $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dogovor=' . $_POST['dogovor_id'] . '  GROUP BY spr_rabot.naimenovaniye')->queryAll();


            $pole = Yii::app()->db->createCommand('select * from soprovoditelniy_list where id_objecta IN(' . $addresses . ')')->queryAll();

            //обработка полевиков
            $polevik_1 = array();
            $polevik_2 = array();
            $kameralka = array();
            $data_pole_vidan = '';
            $data_pole_sdan = '';


            foreach ($pole as $value) {
                $polevik_1[] = !empty($value['id_polevik_1']) ? $value['id_polevik_1'] : "";
                $polevik_2[] = !empty($value['id_polevik_2']) ? $value['id_polevik_2'] : "";
                $kameralka[] = !empty($value['id_kameralka']) ? $value['id_kameralka'] : "";
                $data_pole_vidan = !empty($value['data_vidachi_pole']) ? $value['data_vidachi_pole'] : "";
                $data_pole_sdan = !empty($value['data_sdachi_pole']) ? $value['data_sdachi_pole'] : "";


            }


            // $polevik_1 = implode(',', array_unique($polevik_1));
            // $polevik_2 = implode(',', array_unique($polevik_2));
            $kameralka = implode(',', array_unique($kameralka));
            $vse_poleviki = implode(',', array_unique(array_merge($polevik_1, $polevik_2)));


            $familiya_polevikov = Yii::app()->db->createCommand('select familiya from tbl_users where id IN(' . $vse_poleviki . ') GROUP BY familiya ')->queryAll();
            $familiya_pole = '';
            // $familiya_polevikov=$familiya_polevikov[0]->familiya;

            if (!empty($familiya_polevikov)) {
                foreach ($familiya_polevikov as $value) {
                    $familiya_pole .= $value['familiya'] . ",";
                }
            }


            // $familiya_polevikov=implode(',', array_unique($familiya_polevikov));

            // обработка адресов работ
            $adress_string = '';
            $plochad_rabot = 0;
            foreach ($adress_model as $value) {
                $adress_string .= $value['adress'] . ",";
                $plochad_rabot += (double)$value['plochad_rabot'];
            }
            // обработка видов работ
            $vid_rabot_string = '';
            $summa = 0;
            foreach ($vid_rabot as $value) {
                $vid_rabot_string .= $value['naimenovaniye'] . ",";
                //  $summa += (double)$value['summa'];

            }


        }


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'soprovodlist'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        $padej_template = $temp_template[0]->padej;

        $search_template = array(
            '{nomer_soprovod_lista}',
            '{ispolnitel}',
            '{dogovor_number}',
            '{client}',
            '{client_contacts}',
            '{object_rabot}',
            '{vid_rabot}',
            '{pole_otvetstveniy_pole}',
            '{data_vidachi_pole}',
            '{data_sdachi_pole}',
            '{stoimost_pole}',
        );


        $replace_template = array(

            date('d.m.y'),
            $ispolnitel_model[0]->name,
            substr($dogovor_model[0]->dogovor_number, -3),

            $contragent_model[0]->name,
            $contragent_info_model[0]->director . " " . $contragent_info_model[0]->phone,
            $adress_string,
            $vid_rabot_string,
            $familiya_pole,
            date('d.m.y', strtotime($data_pole_vidan)),
            date('d.m.y', strtotime($data_pole_sdan)),
            '',

        );
        $html_template = str_replace($search_template, $replace_template, $temp_template);


        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetAuthor('Nicola Asuni');
        //   $pdf->SetTitle('TCPDF Example 001');
        //   $pdf->SetSubject('TCPDF Tutorial');

        //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        //  $pdf->SetHeaderData('', 0, 'Information', 'All data in one');
        //   $pdf->setHeaderFont(Array('helvetica', '', 8));
        //    $pdf->setFooterFont(Array('helvetica', '', 6));
        //   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //  $pdf->SetMargins(15, 5, 1);
        //  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //  $pdf->SetPrintHeader(false);
        //   $pdf->SetPrintFooter(false);

        //  $pdf->SetFont('timesnewroman', '', 10);
        //  $pdf->AddPage();

        $filename = iconv("windows-1251", "UTF-8", "сопроводительный лист");
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model[0]->folder_path);
        $doc_template_name = iconv("windows-1251", "UTF-8", $title);

        Yii::import('ext.phpword.XPHPWord');
        $phpWord = XPHPWord::createPHPWord();

        $document = $phpWord->loadTemplate(Yii::getPathOfAlias('webroot') . "/" . "templates" . "/" . $filename . '_' . ".docx");

        //  $document->setValue('Value1', 'Sun');


        for ($i = 0; $i < count($search_template); $i++) {
            $document->setValue($search_template[$i], $replace_template[$i]);


        }
        //  print_r(str_replace($search_template, $replace_template, $temp_template));
        //   exit();


//var_dump(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . '.docx');
//exit();
        $document->save(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . '.docx');


        /* PRINT in WORD 2007*/

        //   $this->PrintDocumentsInWord($dogovor_model, $search_template, $replace_template, $search_template, $replace_template, $contragent_model, $filename, $title);

        /* */
        //    $pdf->writeHTML($html_template, true, false, true, false, 'С');
        //  $pdf->LastPage();
        //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . ".pdf", "F");
        echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $dogovor_model[0]->folder_path . '/' . "Сопроводительный_лист" . '_' . ".pdf", array('target' => '_blank'));


    }

// Печать сопроводительного листа
    public function actionPrintDoverennost()
    {

        setlocale(LC_ALL, 'ru_RU.UTF-8');
        //   if (isset($_POST['dogovor_id']) && isset($_POST['adres'])) {

        // $_POST['adres']=array('1092261','315018879','315018886');
        //  $_POST['dogovor_id']=array('109226');
        Yii::import('application.vendors.ncl*');
        require_once('NCL.NameCase.ru.php');

        $addresses = implode(',', $_POST['adres']);
        $dogovor_model = Dogovor::model()->findByPk($_POST['dogovor_id']);
        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $adress_model = Yii::app()->db->createCommand('select adress,kadastroviy_nomer,plochad_rabot from object_rabot where id IN(' . $addresses . ')')->queryAll();
        $adress_string = '';

        foreach ($adress_model as $value) {
            $adress_string .= $value['adress']; /*. "<br>"*/

        }


        //  } else {
        //    echo "Ошибка обработки входящих данных";
        //   Yii::app()->end();
        //   }


        $nc = new NCLNameCaseRu();

        $contragents_fiz = $nc->q($contragent_model[0]->name);
        $contragent_doljnost = $nc->q($contragent_info_model[0]->doljnost);

        $contragent_director = $nc->q($contragent_info_model[0]->director);


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'doverennost'));

        $title = $temp_template[0]->title;
        //  $temp_template = $temp_template[0]->content;
        $current_date = explode('-', date("d-m-Y"));
        $search_template_yur = array(
            '{contragent_name}',
            '{contragent_info}',
            '{create_day}',
            '{create_month}',
            '{create_yaer}',
            '{client_name}',
            '{client_zamestitel}',
            '{ispolnitel_name}',
            '{client_name}',
            '{object_rabot_adres}',
            '{srok_deystviya_doverki}',
            '{client_doljnost}',
            '{client_name}',
            '{client_director}',
        );

        $replace_template_yur = array(

            $contragent_model[0]->name,
            "Юридический адрес:" . $contragent_info_model[0]->yur_address /*. "<br>"*/ .
            "ИНН/КПП" . $contragent_info_model[0]->inn . "/" . $contragent_info_model[0]->kpp /*. "<br>"*/ .
            "р/с: " . $contragent_bank_info[0]->r_s . " в " . $contragent_bank[0]->name /*. "<br>" */ .
            "к/с: " . $contragent_bank_info[0]->k_s /*. "<br>" */ . "БИК " . $contragent_bank_info[0]->bic . "ОГРН " . $contragent_info_model[0]->ogrn /*. "<br>"*/,
            // .  "Email:" . $contragent_info_model[0]->email . " " .  "Тел./факс: " . $contragent_info_model[0]->phone . "/" . $contragent_info_model[0]->fax,
            $current_date[0],

            $this->date_to_month($current_date[1]),
            $current_date[2],
            $contragent_model[0]->name,
            "в лице" . $contragent_doljnost[1] . " " . $contragent_director[1],
            $ispolnitel_model->name,
            $contragent_model[0]->name,
            $adress_string,
            $lastday = date("d.") . date("m.") . (date("Y") + 1),
            $contragent_info_model[0]->doljnost,
            $contragent_model[0]->name,
            $contragent_info_model[0]->director,
        );

        $search_template_fiz = array(


            '{contragent_name}',
            '{contragent_info}',
            '{create_day}',
            '{create_month}',
            '{create_yaer}',
            '{client_name}',
            '{client_name}',
            '{client_zamestitel}',
            '{ispolnitel_name}',
            '{client_name}',
            '{object_rabot_adres}',
            '{srok_deystviya_doverki}',
            '{client_doljnost}',
            '{client_name}',
            '{client_director}',


        );
        $replace_template_fiz = array(
            $contragent_model[0]->name,
            $contragent_info_model[0]->pasport,
            $current_date[0],
            $this->date_to_month($current_date[1]),
            $current_date[2],
            $contragent_model[0]->name,
            '',// $contragent_model[0]->name,
            '',//$contragent_doljnost[1] . " " . $contragents_fiz[1],
            $ispolnitel_model->name,
            $contragent_model[0]->name,
            $adress_string,
            $lastday = date("d.") . date("m.") . (date("Y") + 1),
            $contragent_info_model[0]->doljnost,
            $contragent_model[0]->name,
            $contragent_info_model[0]->director,

        );


        $filename = mb_convert_encoding("доверенность", 'Windows-1251', 'UTF-8');
        $adress_string = mb_convert_encoding($adress_string, 'Windows-1251', 'UTF-8');
        //$file_name=iconv("windows-1251", "UTF-8", "Доверенность");
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title);


    }


// Печать счета


    public
    function actionPrintSchet($id, $print)
    {

        $skloneniye_oplat = array(
            '1' => ' предполагаемого аванса ',
            '2' => ' предполагаемой доплаты ',
            '3' => ' предполагаемой полной оплаты ',
            '4' => ' предполагаемой оплаты по доп. соглашению ',

        );
        // if (!Yii::app()->request->isAjaxRequest) {
        Yii::import('application.vendors.tcpdf*');
        //  require_once('tcpdf.tcpdf.php');

        $schet_model = Schet::model()->findByPk($id);

        $dogovor_model = Dogovor::model()->findByPk($schet_model->id_dogovor);


        if ($schet_model->id_dopsoglasheniya !== null) {
            $dop_soglashenie_model = DopSoglasheniye::model()->findByPk((int)$schet_model->id_dopsoglasheniya);

        } else {
            $dop_soglashenie_model = null;
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        $adress_model = Yii::app()->db->createCommand('select adress,archiv_number from object_rabot where id_dogovor =' . $dogovor_model->id)->queryAll();
        $adress_string = '';
        $table_row = '';
        $item_number = 1;
        foreach ($adress_model as $value) {
            // $adress_string .= $value['archiv_number'] . ') ' . $value['adress'] . "<br>";
            $adress_string .= $value['archiv_number'] . ') ' . $value['adress'];

        }
        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'schet'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        $search_template = array(


            '{ISPOLNITEL_NAME}',
            '{ISPOLNITEL_INN}',
            '{ISPOLNITEL_KPP}',
            '{ISPOLNITEL_LEGAL_ADDRESS}',
            '{ISPOLNITEL_PHONE}',
            '{ISPOLNITEL_EMAIL}',
            // шапка 2
            '{ISPOLNITEL_INN}',
            '{ISPOLNITEL_KPP}',
            '{ISPOLNITEL_NAME}',
            '{ISPOLNITEL_BANK_RS}',
            '{ISPOLNITEL_BANK_BIC}',
            '{ISPOLNITEL_BANK_NAME}',
            '{ISPOLNITEL_BANK_KS}',
            // номера счета
            '{schet_number}',
            '{schet_date}',
            //  данные плательщика
            '{CONTRAGENT_NAME}',
            '{CONTRAGENT_LEGAL_ADDRESS}',
            '{CONTRAGENT_INN}',
            '{CONTRAGENT_KPP}',
            '{CONTRAGENT_RS}',
            '{CONTRAGENT_BANK_NAME}',
            '{CONTRAGENT_BANK_LEGAL_ADDRESS}',
            '{CONTRAGENT_BANK_KS}',
            '{CONTRAGENT_BANK_BIC}',
            // данные таблицы счета
            '{USLUGA_NUMBER}',
            '{OSNOVANIE}',

            '{NUMBER}',

            '{DATE}',

            '{USLUGA_NAME}',
            '{USLUGA_PRICE}',
            '{USLUGA_PRICE_ITOG}',
            '{USLUGA_ITOGO_NO_NDS}',
            '{USLUGA_NDS}',
            '{USLUGA_ITOGO}',


            // суммы прописью

            '{KVO_USLUG}',
            '{SUMMA_USLUG}',
            '{SUMMA_USLUG_SLOVAMI}',
            '{tip_oplati}',
            '{OSNOVANIE2}',
            '{v_razmere}',
            //  '#dogovor_summa_avans_procent#',
            '{dogovor_number}',
            '{podpis}',
            '{ISPOLNITEL_DIRECTOR}',


        );


        $replace_template = array(

            // шапка
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->inn,
            $ispolnitel_info_model[0]->kpp,
            $ispolnitel_info_model[0]->yur_address,
            $ispolnitel_info_model[0]->phone,
            $ispolnitel_info_model[0]->email,

            // шапка 2
            $ispolnitel_info_model[0]->inn,
            $ispolnitel_info_model[0]->kpp,
            $ispolnitel_model->name,
            $ispolnitel_bank_info[0]->r_s,
            $ispolnitel_bank_info[0]->bic,
            $ispolnitel_bank[0]->name,
            $ispolnitel_bank_info[0]->k_s,

            // номера счета
            substr($schet_model->schet_number, -5),
            date("d.m.Y", strtotime($schet_model->data_scheta)),

            //  данные плательщика
            $contragent_model[0]->name,
            $contragent_info_model[0]->yur_address,
            $contragent_info_model[0]->inn,
            $contragent_info_model[0]->kpp,
            $contragent_bank_info[0]->r_s,
            $contragent_bank[0]->name,
            $contragent_bank_info[0]->yur_address,
            $contragent_bank_info[0]->k_s,
            $contragent_bank_info[0]->bic,

            // данные таблицы счета
            $item_number,
            // основание
            $dop_soglashenie_model !== null ? " доп. соглашению " : " п.п. 1.1 договора",
            //  "sdfdfdsff",
            $dop_soglashenie_model !== null ? $dop_soglashenie_model->number . " к договору №" . substr($dogovor_model->dogovor_number, -3) : substr($dogovor_model->dogovor_number, -3),
            //  $dop_soglashenie_model!==null?date("d-m-Y", strtotime($dop_soglashenie_model->data_vneseniya)):date("d-m-Y", strtotime($dogovor_model->created_date)),
            ($dogovor_model->podpisan_date !== '0000-00-00') ? date("d.m.Y", strtotime($dogovor_model->podpisan_date)) : '',
            $adress_string,

            $schet_model->nds !== '0.00' ? $schet_model->summa_s_nds : $schet_model->summa_bez_nds,
            $schet_model->nds !== '0.00' ? $schet_model->summa_s_nds : $schet_model->summa_bez_nds,
            $schet_model->summa_bez_nds,
            $schet_model->nds,
            $schet_model->nds !== '0.00' ? $schet_model->summa_s_nds : $schet_model->summa_bez_nds,


            // суммы прописью

            $item_number,
            $summa = $schet_model->nds !== '0.00' ? $schet_model->summa_s_nds : $schet_model->summa_bez_nds,
            $this->num2str($summa),
            array_key_exists($schet_model->schet_tip, $skloneniye_oplat) ? $skloneniye_oplat[$schet_model->schet_tip] : "НЕТ СООТВЕТСТВУЮЩЕГО ЗНАЧЕНИЯ В МАССИВЕ ",

            $dop_soglashenie_model !== null ? " №" . $dop_soglashenie_model->number : "",
            $dop_soglashenie_model !== null ? " " : "в размере " . (int)$dogovor_model->avans_procent . "% ",
            substr($dogovor_model->dogovor_number, -3),
            $print == "yes" ? '<img src="' . $ispolnitel_model->signature_path . '"  style="width:167px; height:167px;"/>' : '',
            $ispolnitel_info_model[0]->director,


        );
        $html_template = str_replace($search_template, $replace_template, $temp_template);


        //   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $tagvs = array('p' => array(0 => array('h' => 1, 'n' => 0), 1 => array('h' => 1, 'n'
        => 0)));
        //   $pdf->setHtmlVSpace($tagvs);
        // $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetCreator(PDF_CREATOR);
        //  $pdf->SetAuthor('Nicola Asuni');
        //   $pdf->SetTitle('TCPDF Example 001');
        //   $pdf->SetSubject('TCPDF Tutorial');

        //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        //  $pdf->SetHeaderData('', 0, 'Information', 'All data in one');
        //   $pdf->setHeaderFont(Array('helvetica', '', 8));
        //    $pdf->setFooterFont(Array('helvetica', '', 6));
        //  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //  $pdf->SetMargins(17, 5, 3);
        //  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //  $pdf->SetPrintHeader(false);
        //  $pdf->SetPrintFooter(false);

        //  $pdf->SetFont('timesnewroman', '', 10);
        //  $pdf->AddPage();


        //  $pdf->writeHTML($html_template, true, false, true, false, 'С');
        //  $pdf->LastPage();
        $filename = iconv("UTF-8", "windows-1251", "Счет");
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);
        $doc_template_name = iconv("windows-1251", "UTF-8", $title);

        //  Yii::import('ext.phpword.XPHPWord');
        //  $phpWord = XPHPWord::createPHPWord();

        //  $document = $phpWord->loadTemplate(Yii::getPathOfAlias('webroot') . "/" . "templates" . "/" . $filename . ".docx");
        //  print_r($phpWord);
        //  exit();
        // $document->setValue('Value1', 'Sun');

        for ($i = 0; $i < count($search_template); $i++) {

            //   $document->setValue($search_template[$i], $replace_template[$i]);
        }


        //  $document->save(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . '.docx');

        $this->PrintDocumentsInWord($dogovor_model, $search_template, $replace_template, $search_template, $replace_template, $contragent_model, $filename, $title, $schet_model->schet_number);


        //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $schet_model->schet_number . ".pdf", "F");

        if (isset($_POST['email'])) {
            return array('contragent_mail' => $contragent_info_model[0]->email, 'document_path' => "/" . $folder_path . '/' . "Счет" . '_' . $schet_model->schet_number . ".pdf");
        } else {
            echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . '/' . "Счет" . '_' . $schet_model->schet_number . ".pdf", array('target' => '_blank'));

        }


        //   }
    }

    public
    function actionInfoByDogovor($id)
    {

        $dataProvider = DopSoglasheniye::model()->DopSoglasheniyeByDogovor($id);
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('soglasheniye_list_for_dogovor_modal', array('dataProvider_soglasheniye' => $dataProvider,), false, true);
        } else {
            $this->renderPartial('soglasheniye_list_for_dogovor_modal', array('dataProvider_soglasheniye' => $dataProvider,), false, true);
            //  $this->render('list_for_dogovor_modal', array('dataProvider' => $dataProvider,));
        }

    }


    public
    function actionTestPrint()
    {
        $temp_template = DocumentTemplates::model()->findByPk(13);
        $temp_template = $temp_template->content;
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        //   $pdf->SetCreator(PDF_CREATOR);
        //   $pdf->SetCreator(PDF_CREATOR);
        //   $pdf->SetAuthor('Nicola Asuni');
        //   $pdf->SetTitle('TCPDF Example 001');
        //   $pdf->SetSubject('TCPDF Tutorial');
        //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        //   $pdf->SetHeaderData('', 0, 'Information', 'All data in one');
        //   $pdf->setHeaderFont(Array('helvetica', '', 8));
        //   $pdf->setFooterFont(Array('helvetica', '', 6));


        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(5, 5, 1);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        // $pdf->SetFont('arial', '', 10);
        $pdf->SetFont('dejavusans', '', 10);
        $pdf->AddPage();
        $pdf->writeHTML($temp_template, true, false, true, false, 'С');
        $pdf->LastPage();
        $pdf->Output(Yii::app()->request->baseUrl . "TEST.pdf", "F");


    }


    public
    function num2str($inn, $stripkop = false)
    {
        $nol = 'ноль';
        $str[100] = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
        $str[11] = array('', 'десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать', 'двадцать');
        $str[10] = array('', 'десять', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
        $sex = array(
            array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),// m
            array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять') // f
        );
        $forms = array(
            array('копейка', 'копейки', 'копеек', 1), // 10^-2
            array('рубль', 'рубля', 'рублей', 0), // 10^ 0
            array('тысяча', 'тысячи', 'тысяч', 1), // 10^ 3
            array('миллион', 'миллиона', 'миллионов', 0), // 10^ 6
            array('миллиард', 'миллиарда', 'миллиардов', 0), // 10^ 9
            array('триллион', 'триллиона', 'триллионов', 0), // 10^12
        );
        $out = $tmp = array();
        // Поехали!
        $tmp = explode('.', str_replace(',', '.', $inn));
        $rub = number_format($tmp[0], 0, '', '-');
        if ($rub == 0) $out[] = $nol;
        // нормализация копеек
        $kop = isset($tmp[1]) ? substr(str_pad($tmp[1], 2, '0', STR_PAD_RIGHT), 0, 2) : '00';
        $segments = explode('-', $rub);
        $offset = sizeof($segments);

        if ((int)$rub == 0) { // если 0 рублей
            $o[] = $nol;
            $o[] = $this->morph(0, $forms[1][0], $forms[1][1], $forms[1][2]);
        } else {
            foreach ($segments as $k => $lev) {
                $sexi = (int)$forms[$offset][3]; // определяем род
                $ri = (int)$lev; // текущий сегмент
                if ($ri == 0 && $offset > 1) {// если сегмент==0 & не последний уровень(там Units)
                    $offset--;
                    continue;
                }
                // нормализация
                $ri = str_pad($ri, 3, '0', STR_PAD_LEFT);
                // получаем циферки для анализа
                $r1 = (int)substr($ri, 0, 1); //первая цифра
                $r2 = (int)substr($ri, 1, 1); //вторая
                $r3 = (int)substr($ri, 2, 1); //третья
                $r22 = (int)$r2 . $r3; //вторая и третья
                // разгребаем порядки
                if ($ri > 99) $o[] = $str[100][$r1]; // Сотни
                if ($r22 > 20) {// >20
                    $o[] = $str[10][$r2];
                    $o[] = $sex[$sexi][$r3];
                } else { // <=20
                    if ($r22 > 9) $o[] = $str[11][$r22 - 9]; // 10-20
                    elseif ($r22 > 0) $o[] = $sex[$sexi][$r3]; // 1-9
                }
                // Рубли
                $o[] = $this->morph($ri, $forms[$offset][0], $forms[$offset][1], $forms[$offset][2]);
                $offset--;
            }
        }
        // Копейки
        if (!$stripkop) {
            $o[] = $kop;
            $o[] = $this->morph($kop, $forms[0][0], $forms[0][1], $forms[0][2]);
        }
        return preg_replace("/\s{2,}/", ' ', implode(' ', $o));
    }

    /**
     * Склоняем словоформу
     */
    public
    function morph($n, $f1, $f2, $f5)
    {
        $n = abs($n) % 100;
        $n1 = $n % 10;
        if ($n > 10 && $n < 20) return $f5;
        if ($n1 > 1 && $n1 < 5) return $f2;
        if ($n1 == 1) return $f1;
        return $f5;
    }

// печать пропуска


    public function actionPrintPropusk()
    {


        if (
            isset($_POST['dogovor_id'])
            && isset($_POST['adres'])
            && isset($_POST['date_from'])
            && isset($_POST['date_to'])
            && isset($_POST['users_list'])
            && isset($_POST['out_number'])
            && isset($_POST['date_number'])

        ) {


            $date_from = $_POST['date_from'];
            $date_to = $_POST['date_to'];
            $addresses = implode(',', $_POST['adres']);
            $dogovor_id = $_POST['dogovor_id'];
            $users = $_POST['users_list'];
            $out_number = $_POST['out_number'];
            $date_number = $_POST['date_number'];


            $dogovor_model = Dogovor::model()->findByPk((int)$dogovor_id);
            $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
            $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
                'order' => 'id desc',
                'limit' => '1',
            ));

            //   $isplnitel_nds = SprNdsInfo::model()->findByPk($ispolnitel_info_model[0]->nds);

            $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
            $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
                'order' => 'id desc',
                'limit' => '1',
            ));


            // адреса работ
            /* $adress_model = Yii::app()->db->createCommand('select adress from object_rabot where id_dogovor =' . $dogovor_model->id)->queryAll();
             $adress_string = '';
             $table_row = '';
             $item_number = 1;
             foreach ($adress_model as $value) {
                 $adress_string .= $value['adress'] . "<br>";
             }*/

            // виды работ

            $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dogovor=' . $dogovor_model->id . '  GROUP BY spr_rabot.naimenovaniye')->queryAll();

            // обработка видов работ
            $vid_rabot_string = '';
            //  $summa = 0;
            foreach ($vid_rabot as $value) {
                $vid_rabot_string .= $value['naimenovaniye'] . ",";
                //  $summa += (double)$value['summa'];

            }


            $adress_model = Yii::app()->db->createCommand('select adress,kadastroviy_nomer,plochad_rabot from object_rabot where id IN(' . $addresses . ')')->queryAll();

            $adress_string = '';

            foreach ($adress_model as $value) {
                $adress_string .= $value['adress'] . ",";
            }

            $users_string = '';

            $users_list = Yii::app()->db->createCommand('select * from tbl_users where id IN(' . $users . ')')->queryAll();
            $kvo_sotrudnikov = count($users_list);
            foreach ($users_list as $value) {
                $users_string .= $value['familiya'] . " " . $value['name'] . " " . $value['otchestvo'] /*. "<br>"*/
                ;
            }

            $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'propusk'));
            $title = $temp_template[0]->title;
            $temp_template = $temp_template[0]->content;


            $search_template_yur = array(


                '{ispolnitel}',
                '{ispolnitel_bank_info}',
                '{out_number}',
                '{out_data}',

                '{client_doljnost}',
                '{client_name}',
                '{client_fio}',

                '{client_name_otchestvo}',
                '{dogovor_number}',
                '{vid_rabot}',
                '{object_adres}',
                '{date_from}',
                '{date_to}',
                '{ispolnitel_name}',
                '{kvo_rabotnikov}',
                '{spisok_rabotnikov}',

                '{ispolnitel_name}',
                '{ispolnitel_name}',
                '{ispolnitel_fio}',


            );

            $replace_template_yur = array(

                $ispolnitel_model->name,
                $ispolnitel_bank[0]->name /*. "<br> " */ . $ispolnitel_bank_info[0]->yur_address . " р/с " . $ispolnitel_bank_info[0]->r_s .
                " к/с " . $ispolnitel_bank_info[0]->k_s,
                $out_number,
                date("d-m-Y", strtotime($date_number)),

                $contragent_info_model[0]->doljnost,
                $contragent_model[0]->name,
                $contragent_info_model[0]->director,
                $contragent_info_model[0]->director,
                substr($dogovor_model->dogovor_number, -3),

                $vid_rabot_string,
                $adress_string,
                date("d.m.Y", strtotime($date_from)),
                date("d.m.Y", strtotime($date_to)),

                $ispolnitel_model->name,
                $kvo_sotrudnikov,
                $users_string,

                $ispolnitel_model->name,
                $ispolnitel_model->name,
                $ispolnitel_info_model[0]->director,


            );


            $search_template_fiz = array(

                '{ispolnitel}',
                '{ispolnitel_bank_info}',
                '{out_number}',
                '{out_data}',

                '{client_doljnost}',
                '{client_name}',
                '{client_fio}',

                '{client_name_otchestvo}',
                '{dogovor_number}',
                '{vid_rabot}',
                '{object_adres}',
                '{date_from}',
                '{date_to}',
                '{ispolnitel_name}',
                '{kvo_rabotnikov}',
                '{spisok_rabotnikov}',

                '{ispolnitel_name}',
                '{ispolnitel_name}',
                '{ispolnitel_fio}',

            );

            $replace_template_fiz = array(
                $ispolnitel_model->name,
                $ispolnitel_bank[0]->name /*. "<br> " */ . $ispolnitel_bank_info[0]->yur_address . " р/с " . $ispolnitel_bank_info[0]->r_s .
                " к/с " . $ispolnitel_bank_info[0]->k_s,
                $out_number,
                date("d.m.Y", strtotime($date_number)),

                $contragent_info_model[0]->doljnost,
                $contragent_model[0]->name,
                $contragent_model[0]->name,

                $contragent_model[0]->name,
                substr($dogovor_model->dogovor_number, -3),
                $vid_rabot_string,
                $adress_string,
                date("d.m.Y", strtotime($date_from)),
                date("d.m.Y", strtotime($date_to)),

                $ispolnitel_model->name,
                $kvo_sotrudnikov,
                $users_string,

                $ispolnitel_model->name,
                $ispolnitel_model->name,
                $ispolnitel_info_model[0]->director,

            );


            if ($contragent_model[0]->type == 'юр.') {
                $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);

            } else {
                $html_template = str_replace($search_template_fiz, $replace_template_fiz, $temp_template);

            }
            //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            //  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            //  $pdf->SetMargins(15, 5, 4);
            //  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            //  $pdf->SetPrintHeader(false);
            //  $pdf->SetPrintFooter(false);
            //  $pdf->SetFont('timesnewroman', '', 10);
            // $pdf->AddPage();
            // $pdf->writeHTML($html_template, true, false, true, false, 'С');
            //  $pdf->LastPage();
            $filename = mb_convert_encoding("Пропуск", 'Windows-1251', 'UTF-8');
            $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


            $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title);

            //$file_name=iconv("windows-1251", "UTF-8", "Доверенность");
            //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . "/" . $filename . '_' . $out_number . ".pdf", "F");
            //  echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $folder_path . "/" . "Пропуск" . '_' . $out_number . ".pdf", array('target' => '_blank'));
            echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . "/" . "Пропуск" . '_' . $out_number . ".pdf", array('target' => '_blank'));

            //   }
        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'Ошибка',


            ));
            Yii::app()->end();

        }
    }


// печать сраногоо акта обследования
    public
    function actionPrintActObsledovaniya()
    {

        if (
            isset($_POST['object_rabot_id'])
            && isset($_POST['date_act'])
            && isset($_POST['kadastr_pasport_number'])
            && isset($_POST['reestr_number'])
            && isset($_POST['users_list'])


        ) {


            $object_rabot_id = $_POST['object_rabot_id'];
            $date_act = $_POST['date_act'];
            $kadastr_pasport_number = $_POST['kadastr_pasport_number'];
            $reestr_number = $_POST['reestr_number'];
            $users = $_POST['users_list'];

            $object_rabot_model = ObjectRabot::model()->findByPk($object_rabot_id);

            $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot_model->id_dogovor);
            $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
            $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
                'order' => 'id desc',
                'limit' => '1',
            ));


            /* $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_contragenta' => $dogovor_model->id_ispolnitel), array(
                 'order' => 'id desc',
                 'limit' => '1',
             ));
             $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
                 'order' => 'id desc',
                 'limit' => '1',
             ));*/

            //   $isplnitel_nds = SprNdsInfo::model()->findByPk($ispolnitel_info_model[0]->nds);

            $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
            $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
                'order' => 'id desc',
                'limit' => '1',
            ));

            /*$contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
                'order' => 'id desc',
                'limit' => '1',
            ));*/


            $adress_model = Yii::app()->db->createCommand('select adress,kadastroviy_nomer,plochad_rabot from object_rabot where id =' . (int)$object_rabot_id)->queryAll();

            $adress_string = '';
            $kad_nomer_zdaniya = '';
            foreach ($adress_model as $value) {
                $adress_string .= $value['adress'];
                $kad_nomer_zdaniya .= $value['kadastroviy_nomer'];
            }
            $users_string = '';
            $user_atestat = '';
            $users_list = Yii::app()->db->createCommand('select * from tbl_users where id=' . $users)->queryAll();
            foreach ($users_list as $value) {
                $users_string .= $value['familiya'] . " " . $value['name'] . " " . $value['otchestvo'];
                $user_atestat .= $value['atestat'];
            }
            $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'actobsledovaniya'));
            $title = $temp_template[0]->title;
            $temp_template = $temp_template[0]->content;
            $search_template_yur = array(

                '{cadastroviy_nomer}',
                '{contragent_name}',
                '{contragent_fiz_adress}',
                '{fio_kadastroviy_injener}',
                '{kadastroviy_injener_atestat}',
                '{ispolnitel_telefon}',
                '{ispolnitel_fiz_adres}',
                '{ispolnitel_name}',
                '{data_obsledovaniya}',
                '{contragent_name}',
                '{nomer_reestrovoy_zapisi}',
                '{nomer_kadastroviy_pasport}',
                '{object_adres}',


            );

            $replace_template_yur = array(


                $kad_nomer_zdaniya,
                $contragent_model[0]->name,
                $contragent_info_model[0]->fiz_address,
                $users_string,
                $user_atestat,
                $ispolnitel_info_model[0]->phone,
                $ispolnitel_info_model[0]->fiz_address,
                $ispolnitel_model->name,
                date("d.m.Y", strtotime($date_act)),
                $contragent_model[0]->name,
                $reestr_number,
                $kadastr_pasport_number,
                $adress_string,


            );


            $search_template_fiz = array(

                '{cadastroviy_nomer}',
                '{contragent_name}',
                '{contragent_fiz_adress}',
                '{fio_kadastroviy_injener}',
                '{kadastroviy_injener_atestat}',
                '{ispolnitel_telefon}',
                '{ispolnitel_fiz_adres}',
                '{ispolnitel_name}',
                '{data_obsledovaniya}',
                '{contragent_name}',
                '{nomer_reestrovoy_zapisi}',
                '{nomer_kadastroviy_pasport}',
                '{object_adres}',

            );

            $replace_template_fiz = array(

                $kad_nomer_zdaniya,
                $contragent_model[0]->name,
                $contragent_info_model[0]->fiz_address,
                $users_string,
                $user_atestat,
                $ispolnitel_info_model[0]->phone,
                $ispolnitel_info_model[0]->fiz_address,
                $ispolnitel_model->name,
                date("d.m.Y", strtotime($date_act)),
                $contragent_model[0]->name,
                $reestr_number,
                $kadastr_pasport_number,
                $adress_string,

            );


            if ($contragent_model[0]->type == 'юр.') {
                $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);
            } else {
                $html_template = str_replace($search_template_fiz, $replace_template_fiz, $temp_template);
            }
            //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            /* $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
             $pdf->SetMargins(5, 5, 1);
             $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
             $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
             $pdf->SetPrintHeader(false);
             $pdf->SetPrintFooter(false);

             $pdf->SetFont('timesnewroman', '', 10);
             $pdf->AddPage();
             $pdf->writeHTML($html_template, true, false, true, false, 'С');
             $pdf->LastPage();*/
            $filename = mb_convert_encoding("Акт_обследования", 'Windows-1251', 'UTF-8');
            $adress_string = mb_convert_encoding($adress_string, 'Windows-1251', 'UTF-8');
            //$file_name=iconv("windows-1251", "UTF-8", "Доверенность");
            $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


            $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title);

            //  $musor=array('\r','\n','\r\n');
            //   $adress_string = preg_replace('\r\n', "", $adress_string);
            // $adress_string= str_replace($musor, " ", $adress_string);


            //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path. "/" . $filename  . ".pdf", "F");

            // $pdf->Output(Yii::app()->request->baseUrl . $folder_path . "/" . $filename . '_' . ".pdf", "F");
            $data = array(
                'id_objecta' => (int)$_POST['object_rabot_id'],
                'id_spr_etap_rabot' => 89,
                'id_otvetstvennogo' => (int)$_POST['users_list'],
                'id_avtor' => Yii::app()->user->id,
                'data_okonchaniya_rabot' => $_POST['date_act'],
                'status' => ' в работе',

            );

            $this->actionAddEtapRabotAutomatic($data);


            echo CHtml::link(CHtml::encode("     Документ сформирован и помещен в папку договора! "), Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . "/" . "Акт_обследования" . '_' . ".pdf", array('target' => '_blank'));


            //   }
        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'Ошибка',
            ));
            Yii::app()->end();

        }


    }


    private function actionAddEtapRabotAutomatic($data)
    {

        $etap_rabot = EtapRabotPoObjectu::model()->findAllByAttributes(
            array('id_objecta' => $data['id_objecta'], 'id_spr_etap_rabot' => $data['id_spr_etap_rabot'])
        );

        /*  var_dump($etap_rabot);
          var_dump($etap_rabot->document_number);
          var_dump($data['document_number']);
          exit();*/
        $etap_rabot_new = new  EtapRabotPoObjectu();

        $flag = 0;
        foreach ($etap_rabot as $items => $item) {


            if ($item['document_number'] === $data['document_number']) {
                // echo($item['document_number']);
                ++$flag;
                //  break;
            }

        }
        // echo($flag);

        //    exit();

        if ($flag == 0) {
            foreach ($data as $key => $value) {
                $etap_rabot_new->$key = $value;

            }
            $etap_rabot_new->save();
        }


    }


// Акт
    public
    function actionPrintAct()
    {

        Yii::import('application.vendors.ncl*');
        require_once('NCL.NameCase.ru.php');
        //  $_POST['dop_sogl_id']='414070';
        //   var_dump($_POST);
        //   exit();


        if (isset($_POST['dop_sogl_id'])) {
            $stamp_status = 0;
            $dop_sogl_id = $_POST['dop_sogl_id'];
            $dop_sogl = DopSoglasheniye::model()->findByPk($dop_sogl_id);

            $dogovor_model = Dogovor::model()->findByPk((int)$dop_sogl->id_dogovor);

            //   var_dump($dogovor_model);
            if ($dop_sogl->type == "по виду работ") {
                $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dopsoglasheniya=' . $dop_sogl_id . '  GROUP BY spr_rabot.naimenovaniye')->queryAll();
                // обработка видов работ
                $vid_rabot_string = '';
                foreach ($vid_rabot as $value) {
                    $vid_rabot_string .= $value['naimenovaniye'] . ",";
                }
            } else {
                $vid_rabot_string = $dop_sogl->name;
            }
        } elseif (isset($_POST['dog_number']) && isset($_POST['stamp'])) {

            $stamp_status = (int)$_POST['stamp'];
            $dog_id = $_POST['dog_number'];


            $dogovor_model = Dogovor::model()->findByPk((int)$dog_id);

            $vid_rabot = Yii::app()->db->createCommand('select spr_rabot.naimenovaniye,vid_rabot.summa from spr_vid_rabot spr_rabot join vid_rabor_po_dogovoru vid_rabot
            on (spr_rabot.id_rabot=vid_rabot.id_vid_rabot) WHERE  vid_rabot.id_dogovor=' . $dogovor_model->id . '  GROUP BY spr_rabot.naimenovaniye')->queryAll();
            // обработка видов работ
            $vid_rabot_string = '';
            foreach ($vid_rabot as $value) {
                $vid_rabot_string .= strtolower($value['naimenovaniye']);
            }
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /*
         $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_contragenta' => $dogovor_model->id_ispolnitel), array(
              'order' => 'id desc',
              'limit' => '1',
          ));
          $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
              'order' => 'id desc',
              'limit' => '1',
          ));
        */
        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /* $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));*/

        $adress_string = '';
        $adress_model = Yii::app()->db->createCommand('select archiv_number,adress,kadastroviy_nomer,plochad_rabot from object_rabot where id_dogovor =' . (int)$dogovor_model->id)->queryAll();

        foreach ($adress_model as $value) {
            $adress_string .= /*'<br>' .*/
                $value['archiv_number'] . ')' . $value['adress'] . ", ";
        }
        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'actpriyomki'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        if (!empty($dog_id)) {
            $summa = $dogovor_model->summa_nds !== "0.00" ? $dogovor_model->summa_nds : $dogovor_model->summa_dogovora_nachalnaya;
        } else {
            $types_summa_nds = gettype($dop_sogl->summa_nds);
            $types_summa = gettype($dop_sogl->summa);
            $summa = $dop_sogl->summa;
            $summa_nds = $dop_sogl->summa_nds;
            $summa = $dop_sogl->summa_nds !== "0.00" ? $dop_sogl->summa_nds : $dop_sogl->summa;
        }
        $nc = new NCLNameCaseRu();
        $contragent_director = $nc->q($contragent_info_model[0]->director);
        $contragent_director_doljnost = $nc->q($contragent_info_model[0]->doljnost);
        $ispolnitel_director = $nc->q($ispolnitel_info_model[0]->director);
        $search_template_yur = array(
            '{osnovanie_acta}',
            '{dogovor_number}',
            '{dogovor_date}',
            '{act_date}',
            '{client_name}',
            '{client_doljnost}',
            '{client_zam}',
            '{osnovanie}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{vid_rabot}',
            '{object_rabot}',
            '{summa_propis}',
            '{client_doljnost2}',
            '{pechat}',
            '{contragent_director_podpis}',
            '{ispolnitel_director_podpis}',
        );
        $contragent_osnovanie = $nc->q($contragent_info_model[0]->osnovaniye_dogovora);
        $ispolnitel_director_doljnost = $nc->q($ispolnitel_info_model[0]->doljnost);
        $ispolnitel_osnovanie = $nc->q($ispolnitel_info_model[0]->osnovaniye_dogovora);


        $replace_template_yur = array(
            !empty($dog_id) ? " по договору " : " по дополнительному соглашению  ",
            !empty($dog_id) ? substr($dogovor_model->dogovor_number, -3) : $dop_sogl->number,
            !empty($dog_id) ? date("d.m.Y", strtotime($dogovor_model->created_date)) : date("d.m.Y", strtotime($dop_sogl->data)),
            date("d.m.Y"),
            $contragent_model[0]->name,
            ", в лице " . $contragent_director_doljnost[1] . " " . $contragent_director[1],
            '',
            ", действующего на основании " . $contragent_osnovanie[1],
            $ispolnitel_model->name,
            ", в лице " . $ispolnitel_director_doljnost[1] . " " . $ispolnitel_director[1],
            $vid_rabot_string,
            $adress_string,
            $summa . " руб. ( " . $this->num2str($summa) . " ) ",
            $contragent_info_model[0]->doljnost,
            //  '<img src="' . $ispolnitel_model->signature_path . '"  style="width:167px; height167px;"/>',
            $stamp_status ? '<img src="' . $ispolnitel_model->signature_path . '">' : '',
            $contragent_info_model[0]->director,
            $ispolnitel_director[0],

        );


        $search_template_fiz = array(
            '{osnovanie_acta}',
            '{dogovor_number}',
            '{dogovor_date}',
            '{act_date}',
            '{client_name}',
            '{client_doljnost}',
            '{client_zam}',
            '{osnovanie}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{vid_rabot}',
            '{object_rabot}',
            '{summa_propis}',
            '{client_doljnost2}',
            '{pechat}',
            '{client_director}',
            '{ispolnitel_director_podpis}',
        );


        $replace_template_fiz = array(
            !empty($dog_id) ? "по договору " : " по дополнительному соглашению  ",
            !empty($dog_id) ? substr($dogovor_model->dogovor_number, -3) : $dop_sogl->number,
            !empty($dog_id) ? ($dogovor_model->podpisan_date !== '0000-00-00') ? date("d-m-Y", strtotime($dogovor_model->podpisan_date)) : '' : date("d.m.Y", strtotime($dop_sogl->data)),

            date("d.m.Y"),
            $contragent_model[0]->name,
            '',// $contragent_director_doljnost[1] . "  " . $contragent_director[1], // падеж Родительский
            '',
            '',//  $contragent_info_model[0]->osnovaniye_dogovora,
            $ispolnitel_model->name,
            " в лице " . $ispolnitel_director_doljnost[1] . " " . $ispolnitel_director[1],
            $vid_rabot_string,
            $adress_string,
            $summa . " руб. ( " . $this->num2str($summa) . " ) ",
            $contragent_info_model[0]->doljnost,
            // '<img src="' . $ispolnitel_model->signature_path . '"  style="width:167px; height167px;"/>',
            $stamp_status ? '<img src="' . $ispolnitel_model->signature_path . '">' : '',
            $contragent_model[0]->name,
            $ispolnitel_info_model[0]->director,

        );

        if ($contragent_model[0]->type == 'юр.') {
            $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);
        } else {
            $html_template = str_replace($search_template_fiz, $replace_template_fiz, $temp_template);
        }

        //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $tagvs = array('p' => array(0 => array('h' => 3, 'n' => 2), 1 => array('h' => 3, 'n'
        => 2)));
        /* $pdf->setHtmlVSpace($tagvs);
         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         $pdf->SetMargins(20, 10, 10);
         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         $pdf->SetPrintHeader(false);
         $pdf->SetPrintFooter(false);
         $pdf->SetFont('timesnewroman', '', 12);
         $pdf->AddPage();
         $pdf->writeHTML($html_template, true, false, true, false, 'С');
         $pdf->LastPage();*/
        $filename = mb_convert_encoding("Акт", 'Windows-1251', 'UTF-8');
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title, !empty($dop_sogl) ? $dop_sogl->number : $dogovor_model->dogovor_number);

        //$file_name=iconv("windows-1251", "UTF-8", "Доверенность");
        $doc_number = !empty($dog_id) ? $dogovor_model->dogovor_number : $dop_sogl->number;
        //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $doc_number . ".pdf", "F");
        echo CHtml::link("     Ссылка на файл для просмотра ", Yii::app()->baseUrl . "/" . $dogovor_model->folder_path . '/' . "Акт" . '_' . $doc_number . ".pdf", array('target' => '_blank'));
        //   }
    }


    public
    function actionMakeFonts()
    {
        Yii::import('application.vendors.tcpdf*');
        require_once('makefont.php');
        MakeFont('times.ttf', 'times.ufm', true, ' iso-8859-5');
    }


    public function actionBarcodes()
    {


        if (
        isset($_POST['dog_number'])
        ) {
            // print_r($_POST);
            // exit();
            $dog_id = (int)$_POST['dog_number'];
            $object_rabot__model = ObjectRabot::model()->findAllByAttributes(array('id_dogovor' => $dog_id));
            $dogovor_model = Dogovor::model()->findByPk($dog_id);

        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',
            ));
            Yii::app()->end();
        }


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 027');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 027', PDF_HEADER_STRING);

// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set a barcode on the page footer
        //  $pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
        $pdf->SetFont('helvetica', '', 11);

// add a page
        $pdf->AddPage();

// print a message
        $txt = ".\n";
        $pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
        $pdf->SetY(10);

// -----------------------------------------------------------------------------

        $pdf->SetFont('timesnewroman', '', 10);

// define barcode style
        $style = array(
            'position' => '',
            'align' => 'L',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => true,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'timesnewroman',
            'fontsize' => 8,
            'stretchtext' => 4
        );


        foreach ($object_rabot__model as $items => $item) {
            // $pdf->Cell(0, 0, "договор № ".$dogovor_model->dogovor_number." (".$item['adress']." )", 0, 1);
            $pdf->Cell(0, 0, $item['adress'], 0, 1);
            $pdf->write1DBarcode($item['ean'], 'EAN13', '', '', '', 18, 0.4, $style, 'N');
        }


// $pdf->AddPage();


//Close and output PDF document
        //  $pdf->Output('example_027.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


        /*  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(12, 5, 1);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 10);
          $pdf->AddPage();
          $pdf->writeHTML($html_template, true, false, true, false, 'С');
          $pdf->LastPage();*/
        $filename = mb_convert_encoding("Штрих Коды", 'Windows-1251', 'UTF-8');
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);
        $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $dogovor_model->dogovor_number . '_' . ".pdf", "F");
        echo CHtml::link(CHtml::encode("     Файл сформирован в папке договора "), Yii::app()->baseUrl . '/' . $dogovor_model->folder_path . '/' . "Штрих Коды" . '_' . $dogovor_model->dogovor_number . '_' . ".pdf", array('target' => '_blank'));


    }


// Техническое задание
    public function actionPrintTehzadaniye()
    {

        if (isset($_POST['object_rabot_id'])) {
            $tip_rabot = $_POST['tip_rabot'];
            $object_rabot_id = $_POST['object_rabot_id'];
            $object_rabot__model = ObjectRabot::model()->findByPk((int)$object_rabot_id);
            $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot__model->id_dogovor);

        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',            ));
            Yii::app()->end();
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',

        ));


        /*
         $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_contragenta' => $dogovor_model->id_ispolnitel), array(
              'order' => 'id desc',
              'limit' => '1',
          ));
          $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
              'order' => 'id desc',
              'limit' => '1',
          ));
        */
        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /* $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));*/


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'tzt'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        $search_template_yur = array(
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{curr_year}',
            '{contragent_doljnost}',
            '{contragent_name}',
            '{contragent_director}',
            '{curr_year}',


            '{ispolnitel_name}',
            '{ispolnitel_yur_adres}',
            '{client_name}',
            '{client_yuradres}',
            '{object_rabot}',
            '{tip_rabot}',

            '{ispolnitel_name}',
            '{contragent_name}',
            '{current_year}',


        );
        $replace_template_yur = array(

            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,
            date("Y"),
            $contragent_info_model[0]->doljnost,
            $contragent_model[0]->name,
            $contragent_info_model[0]->director,
            date("Y"),
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address,
            $contragent_model[0]->name,
            $contragent_info_model[0]->yur_address,
            $object_rabot__model->adress,
            $tip_rabot,
            $ispolnitel_model->name,
            $contragent_model[0]->name,
            date("Y"),


        );


        $search_template_fiz = array(
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{curr_year}',
            '{contragent_doljnost}',
            '{contragent_name}',
            '{contragent_director}',
            '{curr_year}',
            '{ispolnitel_name}',
            '{ispolnitel_yur_adres}',
            '{client_name}',
            '{client_yuradres}',
            '{object_rabot}',
            '{tip_rabot}',
            '{ispolnitel_name}',
            '{contragent_name}',
            '{current_year}',

        );

        $replace_template_fiz = array(
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,
            date("Y"),
            $contragent_info_model[0]->doljnost,
            $contragent_model[0]->name,
            $contragent_info_model[0]->director,
            date("Y"),

            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address,
            $contragent_model[0]->name,
            $contragent_info_model[0]->yur_address,
            $object_rabot__model->adress,
            $tip_rabot,


            $ispolnitel_model->name,
            $contragent_model[0]->name,
            date("Y"),


        );

        if ($contragent_model[0]->type == 'юр.') {
            $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);
        } else {
            $html_template = str_replace($search_template_fiz, $replace_template_fiz, $temp_template);
        }


        /*  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(15, 5, 1);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 10);
          $pdf->AddPage();
          $pdf->writeHTML($html_template, true, false, true, false, 'С');
          $pdf->LastPage();*/
        $filename = mb_convert_encoding("Техническое_задание", 'Windows-1251', 'UTF-8');
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);
        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title);
        $tip_rabot = $_POST['tip_rabot'];
        $object_rabot_id = $_POST['object_rabot_id'];
        $object_rabot__model = ObjectRabot::model()->findByPk((int)$object_rabot_id);
        $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot__model->id_dogovor);

        $data = array(
            'id_objecta' => (int)$_POST['object_rabot_id'],
            'id_spr_etap_rabot' => 47,
            'id_otvetstvennogo' => Yii::app()->user->id,
            'id_avtor' => Yii::app()->user->id,
            'data_okonchaniya_rabot' => date('Y-m-d'),
            'status' => ' в работе',

        );

        $this->actionAddEtapRabotAutomatic($data);

        //$file_name=iconv("windows-1251", "UTF-8", "Доверенность");
        //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $object_rabot__model->archiv_number . ".pdf", "F");
        echo CHtml::link(CHtml::encode("     Документ записан в папку договора "), Yii::app()->baseUrl . '/' . $dogovor_model->folder_path . '/' . "Техническое_задание" . '_' . $object_rabot__model->archiv_number . ".pdf", array('target' => '_blank'));


        //   }


    }


// Дополнительные сведения

    public function actionPrintDopsvedeniya()
    {


        if (
            isset($_POST['object_rabot_id']) && isset($_POST['tip_rabot']) && isset($_POST['glava_rayona'])
        ) {
            $tip_rabot = $_POST['tip_rabot'];
            $object_rabot_id = $_POST['object_rabot_id'];
            $glava_rayona = $_POST['glava_rayona'];
            //   $out_number = $_POST['out_number'];
            //  $out_data = $_POST['date_number'];
            /*   $object_rabot_id='315018883';

               $tip_rabot='1';
               $glava_rayona = 'ro';*/

            Yii::import('application.vendors.ncl*');
            require_once('NCL.NameCase.ru.php');

            $object_rabot__model = ObjectRabot::model()->findByPk((int)$object_rabot_id);
            $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot__model->id_dogovor);
            $rayon_model = Rayon::model()->findByPk((int)$object_rabot__model->id_rayon);
            $uchrejdeniye_model = SprGosOrgan::model()->findByAttributes(array('id_rayon' => (int)$rayon_model->id));


        } else {
            /* echo CJSON::encode(array(
                 'status' => 'false',
                 'message' => 'ошибка печати документа',
             ));
             Yii::app()->end();*/
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        /*   $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_contragenta' => $dogovor_model->id_ispolnitel), array(
                'order' => 'id desc',
                'limit' => '1',
            ));
            $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
                'order' => 'id desc',
                'limit' => '1',
            ));*/

        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /* $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));*/

        $nc = new NCLNameCaseRu();
        $uchrejdeniye_glava = $nc->q($uchrejdeniye_model->fio_nachalnik_otdela);
        $ro_rayon = $nc->q($rayon_model->naimenovaniye);
        $fio = explode(' ', $uchrejdeniye_model->fio_nachalnik_otdela);


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'tzkz'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        $search_template_yur = array(
            '{client_name}',
            '{client_fio}',
            '{current_date}',
            '{current_month}',
            '{current_year}',


            '{organization}',
            '{rayon_komy}',
            '{glava_rayona}',


            '{current_date}',
            '{current_month}',
            '{current_year}',

            '{number}',
            '{date}',
            '{ispolnitel_name}',
            '{ispolnitel_svedeniya}',
            '{client_name}',
            '{object_adres}',
            '{rayon_name}',

            '{kadastroviy_nomer_rayona}',

            '{plochad}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{ispolnitel_telefon}',


        );
        $sklonenie_rayona = strrpos($ro_rayon[1], ' и ') ? ' районов' : ' района';


        //  var_dump($contragent_info_model);
        //  exit();
        $replace_template_yur = array(
            $contragent_model[0]->name,
            $contragent_info_model[0]->doljnost . " " . $contragent_info_model[0]->director,
            '___  ',
            '_____',
            date("Y"),
            $glava_rayona == 'ro' ? "отдела формирования земельных участков" : "управления землеустройства",
            $glava_rayona == 'ro' ? ' ' . $ro_rayon[1] . $sklonenie_rayona : "",
            $uchrejdeniye_glava[0],

            '___  ',
            '_____',
            date("Y"),

            '___',
            date("Y"),
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address . ", ИНН/КПП " . $ispolnitel_info_model[0]->inn . "/" . $ispolnitel_info_model[0]->kpp,

            $contragent_model[0]->name,
            $object_rabot__model->adress,
            $rayon_model->naimenovaniye,
            $object_rabot__model->kadastroviy_nomer,
            $object_rabot__model->plochad_rabot,
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,
            $ispolnitel_info_model[0]->phone,

        );


        $search_template_fiz = array(
            '{client_name}',
            '{client_fio}',
            '{current_date}',
            '{current_month}',
            '{current_year}',


            '{organization}',
            '{rayon_komy}',
            '{glava_rayona}',


            '{current_date}',
            '{current_month}',
            '{current_year}',

            '{number}',
            '{date}',
            '{ispolnitel_name}',
            '{ispolnitel_svedeniya}',
            '{client_name}',
            '{object_adres}',
            '{rayon_name}',

            '{kadastroviy_nomer_rayona}',

            '{plochad}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',
            '{ispolnitel_telefon}',

        );

        $replace_template_fiz = array(
            $contragent_model[0]->name,
            $contragent_model[0]->name,
            '___  ',
            '_____',
            date("Y"),

            $glava_rayona == 'ro' ? "Отдела формирования земельных участков" /*. "<br>" */ : "управления землеустройства",
            $glava_rayona == 'ro' ? ' ' . $ro_rayon[1] . $sklonenie_rayona : "",
            $uchrejdeniye_glava[0],

            '___  ',
            '_____',
            date("Y"),


            '______',
            date("Y"),
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->yur_address . ", ИНН/КПП " . $ispolnitel_info_model[0]->inn . "/" . $ispolnitel_info_model[0]->kpp,

            $contragent_model[0]->name,
            $object_rabot__model->adress,

            $rayon_model->naimenovaniye,
            $object_rabot__model->kadastroviy_nomer,
            $object_rabot__model->plochad_rabot,
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,
            $ispolnitel_info_model[0]->phone,

        );

        /*  if ($contragent_model[0]->type == 'юр.') {
              $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);
          } else {
              $html_template = str_replace($search_template_fiz, $replace_template_fiz, $temp_template);
          }*/


        /* $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         $tagvs = array('p' => array(0 => array('h' => 2, 'n' => 0), 1 => array('h' => 2, 'n'
         => 0)));
         $pdf->setHtmlVSpace($tagvs);*/

        /*  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(12, 5, 6);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 10);
          $pdf->AddPage();

          $pdf->writeHTML($html_template, true, false, true, false, 'С');

          $pdf->LastPage();*/
        $filename = mb_convert_encoding("Дополнительные сведения", 'Windows-1251', 'UTF-8');
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);


        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_fiz, $replace_template_fiz, $contragent_model, $filename, $title);


        $adres = iconv("UTF-8", "windows-1251", $object_rabot__model->adress);
        // $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", "F");

        /* $zapis_etapa_rabot=new EtapRaborPoObjectu();
          $zapis_etapa_rabot->id_objecta=$object_rabot__model->id;
          $zapis_etapa_rabot->id_spr_etap_rabot='44';
          $zapis_etapa_rabot->id_otvetstvennogo= Yii::app()->user->id;
          $zapis_etapa_rabot->id_avtor= Yii::app()->user->id;
          $zapis_etapa_rabot->document_number=;
          $zapis_etapa_rabot->status='в работе';
          $zapis_etapa_rabot->save();*/


        $data = array(
            'id_objecta' => (int)$_POST['object_rabot_id'],
            'id_spr_etap_rabot' => $_POST['glava_rayona'] == 'ro' ? 69 : 2,
            'id_otvetstvennogo' => Yii::app()->user->id,
            'id_avtor' => Yii::app()->user->id,
            'data_okonchaniya_rabot' => date('Y-m-d'),
            'status' => ' в работе',
            'document_number' => $object_rabot__model->nomer_dopsvedeniya,

        );

        $this->actionAddEtapRabotAutomatic($data);


        echo CHtml::link(CHtml::encode("     Документ распечатан в папку договора "), Yii::app()->baseUrl . '/' . $dogovor_model->folder_path . '/' . "Дополнительные сведения" . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", array('target' => '_blank'));


        //   }


    }

// Заявка на доп. сведения
    public
    function actionPrintZayavaDopsvedeniya()
    {
        if (
            isset($_POST['object_rabot_id']) && isset($_POST['glava_rayona'])
            && isset($_POST['out_number']) && isset($_POST['date_number'])
        ) {
            // $tip_rabot = $_POST['tip_rabot'];
            $object_rabot_id = $_POST['object_rabot_id'];

            $glava_rayona = $_POST['glava_rayona'];
            $out_number = $_POST['out_number'];
            $out_data = $_POST['date_number'];


            $object_rabot__model = ObjectRabot::model()->findByPk((int)$object_rabot_id);
            $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot__model->id_dogovor);
            $rayon_model = Rayon::model()->findByPk((int)$object_rabot__model->id_rayon);
            $uchrejdeniye_model = SprGosOrgan::model()->findByAttributes(array('id_rayon' => (int)$rayon_model->id));


        } else {
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => 'ошибка печати документа',
            ));
            Yii::app()->end();
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /* $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));*/


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'dopsvedeniya'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;

        Yii::import('application.vendors.ncl*');
        require_once('NCL.NameCase.ru.php');

        $nc = new NCLNameCaseRu();
        //   $contragent_director = $nc->q($contragent_info_model[0]->director);
        // $contragent_director_doljnost = $nc->q($contragent_info_model[0]->doljnost);
        //  $ispolnitel_director = $nc->q($ispolnitel_info_model[0]->director);


        $uchrejdeniye_glava = $nc->q($uchrejdeniye_model->fio_nachalnik_otdela);
        $ro_rayon = $nc->q($rayon_model->naimenovaniye);
        $fio = explode(' ', $uchrejdeniye_model->fio_nachalnik_otdela);
        $sklonenie_rayona = strrpos($ro_rayon[1], ' и ') ? ' районов' : ' района';

        $search_template_yur = array(

            '{ispolnitel_name}',
            '{ispolnitel_yur_adres}',
            '{ispolnitel_bank_info}',
            '{ispolnitel_telefon}',

            '{organization}',
            '{rayon}',
            '{glava_rayona}',
            '{adress_rayona}',
            '{out_number}',
            '{out_data}',
            '{obrachenie_glava_rayona}',
            '{plochad_rabot}',
            '{object_adres}',
            '{client_name}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',

        );

        $replace_template_yur = array(

            $ispolnitel_model->name,

            "Юридический адрес: " . $ispolnitel_info_model[0]->yur_address . " ИНН/КПП " .
            $ispolnitel_info_model[0]->inn . "/" . $ispolnitel_info_model[0]->kpp,
            $ispolnitel_bank[0]->name . " ," .
            $ispolnitel_bank_info[0]->yur_address . ", р/с " . $ispolnitel_bank_info[0]->r_s
            . ", к/с " . $ispolnitel_bank_info[0]->k_s . ", БИК " . $ispolnitel_bank_info[0]->bic . ",ОКПО " .
            $ispolnitel_info_model[0]->okpo . ",ОГРН " . $ispolnitel_info_model[0]->ogrn,

            " Тел./факс:" . $ispolnitel_info_model[0]->phone . " Email:" . $ispolnitel_info_model[0]->email,
            $glava_rayona == 'ro' ? "Отдела формирования земельных участков" /*. "<br>" */ : "управления землеустройства",
            $glava_rayona == 'ro' ? ' ' . $ro_rayon[1] . $sklonenie_rayona : "",

            $uchrejdeniye_glava[2],
            $uchrejdeniye_model->adress,
            $out_number,
            date("d.m.Y", strtotime($out_data)),

            // $glava_rayona == 'y' ? $uchrejdeniye_model->fio_nachalnik_otdela : "",
            // $glava_rayona == 'y' ? $uchrejdeniye_model->adress : "",
            $uchrejdeniye_model->pol == "м" ? "Уважаемый " . $fio[1] . ' ' . $fio[2] : "Уважаемая " . $fio[1] . ' ' . $fio[2],
            $object_rabot__model->plochad_rabot,
            $object_rabot__model->adress,
            $contragent_model[0]->name,
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,


        );


        $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);


        /*  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(12, 5, 1);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 10);
          $pdf->AddPage();
          $pdf->writeHTML($html_template, true, false, true, false, 'С');
          $pdf->LastPage();*/
        $filename = mb_convert_encoding("ЗаявНаДопСв", 'Windows-1251', 'UTF-8');
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);

        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_yur, $replace_template_yur, $contragent_model, $filename . "_" . $object_rabot__model->archiv_number, $title);

        $adres = iconv("windows-1251", "UTF-8", $object_rabot__model->adress);


        $data = array(
            'id_objecta' => (int)$_POST['object_rabot_id'],
            'id_spr_etap_rabot' => $_POST['glava_rayona'] == 'ro' ? 69 : 2,
            'id_otvetstvennogo' => Yii::app()->user->id,
            'id_avtor' => Yii::app()->user->id,
            'document_number' => $_POST['out_number'],
            'data_nachala_rabot' => date('Y-m-d'),
            'data_okonchaniya_rabot' => $_POST['date_number'],
            'status' => ' в работе',

        );

        $this->actionAddEtapRabotAutomatic($data);


        //  $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", "F");
        echo CHtml::link(CHtml::encode("     Файл сформирован в папке договора "), Yii::app()->baseUrl . '/' . $dogovor_model->folder_path . '/' . "ЗаявНаДопСв" . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", array('target' => '_blank'));

        //   }


    }


// Обращение (ТГР)
    public
    function actionPrintObracheniye()
    {


        if (isset($_POST['object_rabot_id'])) {

            Yii::import('application.vendors.ncl*');
            require_once('NCL.NameCase.ru.php');
            $nc = new NCLNameCaseRu();
            $tip_rabot = $_POST['tip_rabot'];
            $object_rabot_id = $_POST['object_rabot_id'];
            // $object_rabot_id='1092261';
            $glava_rayona = $_POST['glava_rayona'];
            $out_number = $_POST['out_number'];
            $out_data = $_POST['date_number'];
            $format_lista = $_POST['format_lista'];
            $kvo_protokol = $_POST['kvo_listov_prot'];
            $kvo_plan = $_POST['kvo_listov_plan'];
            $schema = $_POST['schema'];


            /*  $tip_rabot ='dfgfdg';

              $object_rabot_id='3150213';
                $glava_rayona = 'yes';
                $out_number = 'sdfsdf';
                $out_data = '2017-12-12';*/


            // обьект адреса
            $object_rabot__model = ObjectRabot::model()->findByPk((int)$object_rabot_id);
            // объект договора
            $dogovor_model = Dogovor::model()->findByPk((int)$object_rabot__model->id_dogovor);
            // объект района
            $rayon_model = Rayon::model()->findByPk((int)$object_rabot__model->id_rayon);

            // объект учреждения
            $uchrejdeniye_model = SprGosOrgan::model()->findByAttributes(array('id_rayon' => (int)$rayon_model->id));


        } else {
            /*  echo CJSON::encode(array(
                  'status' => 'false',
                  'message' => 'ошибка печати документа',
              ));
              Yii::app()->end();*/
        }

        $ispolnitel_model = Ispolnitel::model()->findByPk($dogovor_model->id_ispolnitel);
        $ispolnitel_info_model = IspolnitelInfo::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));


        $ispolnitel_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $dogovor_model->id_ispolnitel), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $ispolnitel_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $ispolnitel_bank[0]->id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        $contragent_model = Contragent::model()->findAllByPk($dogovor_model->id_contragent);
        $contragent_info_model = ContragentInfo::model()->findAllByAttributes(array('id_contragent' => $dogovor_model->id_contragent), array(
            'order' => 'id desc',
            'limit' => '1',
        ));

        /* $contragent_bank = Bank::model()->findAllByAttributes(array('id' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $contragent_bank_info = BankDetails::model()->findAllByAttributes(array('id_bank' => $dogovor_model->id_bank_contragenta), array(
            'order' => 'id desc',
            'limit' => '1',
        ));*/


        $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'tgr'));
        //  $temp_template = DocumentTemplates::model()->findAllByAttributes(array('type' => 'tzk'));
        $title = $temp_template[0]->title;
        $temp_template = $temp_template[0]->content;
        $search_template_yur = array(

            '{ispolnitel_name}',
            '{ispolnitel_yur_adres}',
            '{ispolnitel_bank_info}',
            '{ispolnitel_telefon}',
            '{organization}',// 5
            '{rayon}',//6
            '{glava_rayona}',//7
            '{adress_rayona}',//8
            '{out_number}',
            '{out_data}',
            '{obrachenie_lico}',
            '{dop_data}',
            '{number_dop_svedeniya}',
            '{object_adres}',
            '{plochad}',
            '{cadastroviy_nomer}',
            '{client_name}',
            '{vid_rabot}',
            '{fo2}',
            '{fo3}',
            '{pdf1}',
            '{format_lista}',
            '{doc1}',
            '{format_lista}',
            '{pdf2}',
            '{kvo_listov_prot}',
            '{kvo_listov_plan}',
            '{schema}',
            '{ispolnitel_name}',
            '{ispolnitel_director}',
        );

        $uchrejdeniye_glava = $nc->q($uchrejdeniye_model->fio_nachalnik_otdela);
        $ro_rayon = $nc->q($rayon_model->naimenovaniye);
        $fio = explode(' ', $uchrejdeniye_model->fio_nachalnik_otdela);
        $sklonenie_rayona = strrpos($ro_rayon[1], ' и ') ? ' районов' : ' района';
        $replace_template_yur = array(

            $ispol = str_replace("ООО", '', $ispolnitel_model->name),//1
            "Юридический адрес " . $ispolnitel_info_model[0]->yur_address /*. '<br>'*/ .
            " ИНН/КПП " . $ispolnitel_info_model[0]->inn . "/" . $ispolnitel_info_model[0]->kpp . ",ОГРН " . $ispolnitel_info_model[0]->ogrn, //2
            " Банк: " . $ispolnitel_bank[0]->name . " " .
            $ispolnitel_bank_info[0]->yur_address /*. '<br>' */ . " р/с " . $ispolnitel_bank_info[0]->r_s
            . ", к/с " . $ispolnitel_bank_info[0]->k_s /*. '<br>'*/ . " БИК " . $ispolnitel_bank_info[0]->bic .
            ",ОКПО " .
            $ispolnitel_info_model[0]->okpo,
            " Тел./факс:" . $ispolnitel_info_model[0]->phone . ',' . $ispolnitel_info_model[0]->fax,// . " Email:" . $ispolnitel_info_model[0]->email,


            $glava_rayona == 'ro' ? "Отдела формирования земельных участков" /*. "<br>"*/ : "управления землеустройства", // organozation
            $glava_rayona == 'ro' ? $ro_rayon[1] . $sklonenie_rayona : "", // rayon
            $uchrejdeniye_glava[2],
            $glava_rayona == 'y' ? $uchrejdeniye_model->adress : "",
            $out_number,
            date("d.m.Y", strtotime($out_data)),
            $uchrejdeniye_model->pol == "м" ? "Уважаемый " . $fio[1] . ' ' . $fio[2] : "Уважаемая " . $fio[1] . ' ' . $fio[2],
            date("d.m.Y", strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))),// что сюда писать блядь?
            $dop_sved=$this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),
           // $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),
            $object_rabot__model->adress,
            $object_rabot__model->plochad_rabot,
            $object_rabot__model->kadastroviy_nomer,
            $contragent_model[0]->name,

            $tip_rabot,//18 строка

            /*fo2 */

            $ispolnitel_model->dogovor_symbol . date('y', strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))) . '-' . $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),
            /*fo3 */

            $ispolnitel_model->dogovor_symbol . date('y', strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))) . '-' . $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),
            /*pdf1*/

            $ispolnitel_model->dogovor_symbol . date('y', strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))) . '-' . $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),

            /*format_lista*/

            $format_lista,
            $ispolnitel_model->dogovor_symbol . date('y', strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))) . '-' . $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),
            /*format_lista*/
            $format_lista,
            /* pdf2*/

            $ispolnitel_model->dogovor_symbol . date('y', strtotime($this->actionDopSvedeniyaPolucheniye($object_rabot__model, 0))) . '-' . $this->actionDopSvedeniyaPolucheniye($object_rabot__model, 1),

            $kvo_protokol,
            $kvo_plan,
            $schema,
            $ispolnitel_model->name,
            $ispolnitel_info_model[0]->director,

        );


        $html_template = str_replace($search_template_yur, $replace_template_yur, $temp_template);

        //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $tagvs = array('p' => array(0 => array('h' => 1, 'n' => 0), 1 => array('h' => 1, 'n'
        => 0)));
        /*  $pdf->setHtmlVSpace($tagvs);

          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(15, 5, 6);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          $pdf->SetPrintHeader(false);
          $pdf->SetPrintFooter(false);
          $pdf->SetFont('timesnewroman', '', 11);
          $pdf->AddPage();
          $pdf->writeHTML($html_template, true, false, true, false, 'С');
          $pdf->LastPage();*/
        $filename = iconv("UTF-8", "windows-1251", "Обращение");
        $folder_path = iconv("UTF-8", "windows-1251", $dogovor_model->folder_path);
        $this->PrintDocumentsInWord($dogovor_model, $search_template_yur, $replace_template_yur, $search_template_yur, $replace_template_yur, $contragent_model, $filename, $title, $object_rabot__model->archiv_number);
        $data = array(
            'id_objecta' => (int)$_POST['object_rabot_id'],
            'id_spr_etap_rabot' => $_POST['glava_rayona'] == 'ro' ? 67 : 9,
            'id_otvetstvennogo' => Yii::app()->user->id,
            'id_avtor' => Yii::app()->user->id,
            'document_number' => $out_number,
            'data_nachala_rabot' => date('Y-m-d'),
            'data_okonchaniya_rabot' => $_POST['date_number'],
            'status' => ' в работе',

        );

        $this->actionAddEtapRabotAutomatic($data);


        // $pdf->Output(Yii::app()->request->baseUrl . $folder_path . '/' . $filename . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", "F");
        echo CHtml::link(CHtml::encode("     Файл сформирован в папку договора "), Yii::app()->baseUrl . '/' . $dogovor_model->folder_path . '/' . "Обращение" . '_' . $object_rabot__model->archiv_number . '_' . ".pdf", array('target' => '_blank'));

    }


    //  получает доп сведения из этапов работ

    public function actionDopSvedeniyaPolucheniye($item, $flag = 0)
    {
        $etap_rabot = EtapRabotPoObjectu::model()->findAllByAttributes(
            array('id_objecta' => $item->id, 'id_spr_etap_rabot' => 4)
        );
        $result = array();
        if ($etap_rabot !== null) {
            foreach ($etap_rabot as $items => $item) {
                if ($item['id_spr_etap_rabot'] == 4) {
                    $result[] = $item['data_okonchaniya_rabot'];
                    $result[] = $item['document_number'];
                    return $result[$flag];
                } else {
                    return null;
                }
            }
        } else {
            return null;
        }
    }


// Создание директории

    public function actionMakeDirectory($path, $filename, $pdf) //$path,$pdf
    {

        // $pathToFile = 'test1/test2/test3/test4';
        $pathToFile = $path;
        // $fileName = basename($pathToFile);
        $folders = explode('/', $pathToFile);

        $currentFolder = '';
        foreach ($folders as $folder) {
            $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", ")", "(", " ", "  ");
            $folder = trim(str_replace($srting, "", $folder));
            $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
            $currentFolder .= $folder . "/";
            if (!file_exists($currentFolder)) {

                //    $currentFolder = preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/","",$currentFolder);
                mkdir($currentFolder, 0755);
            }
        }

        //   $res = $pdf->Output(Yii::app()->request->baseUrl . $file_path . $file_name . "_" . $adres . "_.pdf", "F");

        //     echo CHtml::link(CHtml::encode("     Ссылка на файл для просмотра "), Yii::app()->baseUrl . "/" . $file_name, array('target' => '_blank'));

        //   return Yii::app()->request->baseUrl . $currentFolder;

        //  file_put_contents($pathToFile, 'test2');


    }

}
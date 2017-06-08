<?php

/**
 * This is the model class for table "dogovor".
 *
 * The followings are the available columns in table 'dogovor':
 * @property integer $id
 * @property integer $id_ispolnitel
 * @property integer $id_contragent
 * @property integer $id_author
 * @property string $dogovor_number
 * @property string $dogovor_number_old
 * @property string $primechaniye
 * @property string $avans_procent
 * @property string $summa_avansa
 * @property string $summa_dogovora_nachalnaya
 * @property string $created_date
 * @property string $closed_date
 * @property string $srok_ispolneniya
 * @property string $podpisan_date
 * @property string $status
 * @property string $otkat
 *
 * The followings are the available model relations:
 * @property ActPbsledovaniya[] $actPbsledovaniyas
 * @property Users $idAuthor
 * @property Contragent $idContragent
 * @property Ispolnitel $idIspolnitel
 * @property DogovorResponsibleTransfer[] $dogovorResponsibleTransfers
 * @property DopSoglasheniye[] $dopSoglasheniyes
 * @property ObjectRabot[] $objectRabots
 * @property Schet[] $schets
 * @property VidRaborPoDogovoru[] $vidRaborPoDogovorus
 * @property ZatratiPoDogovoru[] $zatratiPoDogovorus
 */
class Dogovor extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */


    public $ostalos_dney = '';
    public $contacts = '';
    public $author_search = '';
    public $document_number_search = '';
    public $ispolnitel_search = '';
    public $object_search = '';
    public $contragent_search = '';
    public static $days_enum = array('раб.' => 'рабочий', 'календ.' => 'календарный');
    public $old_dogovor_number = '';
    public $old_id_ispolnitel = '';
    public $old_contragent_id = '';

    const DB_ENUM_DAY_RAB = "раб.";
    const DB_ENUM_DAY_KAL = "календ.";


    public function tableName()
    {
        return 'dogovor';
    }

    public static function enum_days()
    {
        return self::$days_enum;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_ispolnitel,id_bank_contragenta,created_date, id_template, id_contragent,
            status,tip_dney,srok_dni,avans_procent,summa_dogovora_nachalnaya', 'required'),
            array('id_ispolnitel, id_author', 'numerical', 'integerOnly' => true),// id_contragent
            array('dogovor_number, dogovor_number_old', 'length', 'max' => 255),
            array('summa_avansa,summa_nds,nds,folder_path,updated_date,old_id_ispolnitel,old_contragent_id,old_dogovor_number', 'safe'),
            //   array('avans_procent, summa_avansa, summa_dogovora_nachalnaya, otkat', 'length', 'max' => 10),
            array('avans_procent', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('summa_avansa', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('summa_dogovora_nachalnaya', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('summa_nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('otkat', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('status', 'length', 'max' => 25),


            array('primechaniye, closed_date, srok_ispolneniya,
			podpisan_date,author_search,author_search,ispolnitel_search,object_search,contragent_search,tip_dney,contacts,document_number_search', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_ispolnitel, author_search,id_bank_contragenta,object_search,ispolnitel_search,contragent_search,id_contragent, id_author, dogovor_number, dogovor_number_old,
			primechaniye, avans_procent,nds,summa_nds,folder_path, summa_avansa, id_template,summa_dogovora_nachalnaya, created_date, closed_date, srok_ispolneniya, podpisan_date, status, otkat,contacts,document_number_search', 'safe', 'on' => 'search'),
        );
    }


    protected function beforeSave()
    {
        // parent::afterSave();
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->AddAttributes();
                $this->MakeDirectory();
            }
            if (!$this->isNewRecord) {
                // проверяем смену контрагента, его банка и переписываем путь в папку Догвоора
                $this->CheckPath();
            }
            return true;
        } else
            return false;
    }


    protected function CheckPath()
    {


        if ($this->old_dogovor_number !== $this->dogovor_number || $this->old_id_ispolnitel !== $this->id_ispolnitel || $this->old_contragent_id !== $this->id_contragent) {
            //    print_r($this);
            //   echo "fuck";
            //   exit();

            //    $this->ChangeFolderPath();

            $this->MakeDirectory();

        }

    }


    public function ChangeFolderPath() //$path,$pdf
    {

        $dogovor_model = Dogovor::model()->findAll();
        foreach ($dogovor_model as $dogovor) {
            $dogovor_folder_name = mb_convert_encoding("Договор", 'Windows-1251', 'UTF-8');
            $work_folder_name = mb_convert_encoding("Рабочие  документы", 'Windows-1251', 'UTF-8');
            $folders = explode('/', $dogovor->folder_path);
            $folders[count($folders) - 1] = "";
            $folder = Yii::getPathOfAlias('webroot') . "/" . implode('/', $folders);
            $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
            if (file_exists($folder)) {
                mkdir($folder . $work_folder_name, 0755, true);
            } else {
                echo "NO SUCH DIRECTORY  =" . $folder . "<br>";
            }


        }


    }


    public function LoggerInsert()
    {

        /* ДА! именно так, ибо лень)*/
        $json = CJSON::encode($this);
        $logger = new DogovorHistory();
        $logger->id_dogovor = $this->id;
        $logger->new_info = $json;
        //  $logger->date_modified = date('Y-m-d H:i:s');
        $logger->save();
    }

    public function GetDogovorsByPeriod($data)
    {


        $dogovors = Yii::app()->db->createCommand()
            ->select('SUM(dogovor.otkat) AS otkat,COUNT(dogovor.id) AS kvo,CONCAT(MONTHNAME(created_date),YEAR(created_date)) AS year,SUM(dogovor.summa_dogovora_nachalnaya) AS symma_bez_nds ,SUM(dogovor.nds) AS nds,SUM(dogovor.summa_nds) AS summa_s_nds,SUM(dogovor.summa_avansa) AS summa_avansa ')
            ->from('dogovor')
            //  ->where('created_date>='2010-06-17' AND closed_date<='2016-04-18' AND status='на подписании' AND YEAR(created_date)=2016')
            ->where('YEAR(created_date)=:year', array(':year' => $data->years_from_base))
            //  ->order('years desc')
            ->group('MONTH(created_date)')
            ->queryAll();
        return $dogovors;


    }


    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'actObsledovaniya' => array(self::HAS_MANY, 'ActPbsledovaniya', 'id_dogovor'),
            'Author' => array(self::BELONGS_TO, 'User', 'id_author'),
            'Contragents' => array(self::BELONGS_TO, 'Contragent', 'id_contragent'),
            'Ispolnitels' => array(self::BELONGS_TO, 'Ispolnitel', 'id_ispolnitel'),
            'dogovorResponsibleTransfers' => array(self::HAS_MANY, 'DogovorResponsibleTransfer', 'id_dogovor'),
            'Soglasheniye' => array(self::HAS_MANY, 'DopSoglasheniye', 'id_dogovor'),
            'object' => array(self::HAS_MANY, 'ObjectRabot', 'id_dogovor'),
            'schet' => array(self::HAS_MANY, 'Schet', 'id_dogovor'),
            'vidRaborPoDogovoru' => array(self::HAS_MANY, 'VidRaborPoDogovoru', 'id_dogovor'),
            'zatratiPoDogovoru' => array(self::HAS_MANY, 'ZatratiPoDogovoru', 'id_dogovor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_ispolnitel' => 'Исполнитель',
            'id_contragent' => 'Контрагент',
            'id_author' => 'Автор',
            'dogovor_number' => '№ договор/архивный',
            'dogovor_number_old' => '№ архивный',
            'primechaniye' => 'Контакты/Примечание',
            'avans_procent' => 'Аванс %',
            'summa_avansa' => 'Аванс руб.',
            'summa_dogovora_nachalnaya' => 'сумма без НДС',
            'created_date' => 'Создан',
            'closed_date' => 'Закрыт',
            'srok_ispolneniya' => 'Дата сдачи',
            'podpisan_date' => 'Подписан',
            'status' => 'Статус',
            'otkat' => 'Разное',
            'contragent_search' => 'Контрагент',
            'ispolnitel_search' => 'Исполнитель',
            'object_search' => 'Объект работ',
            'srok_dni' => 'Срок работы в днях',
            'tip_dney' => 'Тип дней',
            'ostalos_dney' => 'Срок дней',
            'id_template' => 'Шаблон документа',
            'id_bank_contragenta' => 'Банк контрагента',
            'nds' => 'НДС',
            'summa_nds' => 'Сумма с НДС',
            'contacts' => 'Контакты',
            'updated_date' => "Обновлен",
            'document_number_search' => "№ документа"

        );
    }


    private function StavkaNDS()
    {

        $stavka_nds = Yii::app()->db->createCommand()
            ->select('stavka.stavka_nds')
            ->from('ispolnitel_info ispolnitel')
            ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('ispolnitel.id_ispolnitel=:id', array(':id' => (int)$this->id_ispolnitel))
            ->order('stavka.id desc')
            ->limit('1')
            ->queryRow();
        $nds = $stavka_nds['stavka_nds'];
        return (double)$nds;

    }

    private function getDogovorIDS()
    {

        $stavka_nds = Yii::app()->db->createCommand()
            ->select('stavka.stavka_nds')
            ->from('ispolnitel_info ispolnitel')
            ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('ispolnitel.id_ispolnitel=:id', array(':id' => (int)$this->id_ispolnitel))
            ->order('stavka.id desc')
            // ->limit('1')
            ->queryRow();
        $nds = $stavka_nds['stavka_nds'];
        return (double)$nds;

    }


    public function GetAllDogovors()
    {

        $criteria = new CDbCriteria;

        $criteria->alias = 't';
        $criteria->select = array('t.id', 't.dogovor_number', 't.summa_dogovora_nachalnaya', 't.nds', 't.summa_nds', 't.summa_avansa');
        $criteria->order = 'created_date DESC';
        $criteria->together = true;
        $criteria->with = array(
            'Contragents' => array('alias' => 'contragent', //'together' => true,
                'select' => array('contragent.id', 'contragent.name',)),
            'Ispolnitels' => array('alias' => 'ispolnitel', //'together' => true,
                'select' => array('ispolnitel.id', 'ispolnitel.name',)),

        );


    }

    public function RaschetSumm()
    {

        $nds_stavka = $this->StavkaNDS(); // 18
        $summa_bez_nds = $this->summa_dogovora_nachalnaya;
        // $summa_s_nds = $this->summa_nds;
        $avans_procent = $this->avans_procent;// если путой то = '0.00'
        $avans_rub = $this->summa_avansa; // если путой то = 0

        // расчет суммы c НДС

        if (!empty($nds_stavka)) {
            $summa_s_nds = round($summa_bez_nds * (1 + $nds_stavka / 100), 2);
            $this->summa_nds = $summa_s_nds;
            $nds = $summa_s_nds - $summa_bez_nds;
            $this->nds = $nds;
            if (!empty($avans_rub)) {
                $avans_rub = round($avans_rub * (1 + $nds_stavka / 100), 2);
                $this->summa_avansa = $avans_rub;
                $this->avans_procent = round($avans_rub / $summa_s_nds * 100, 2);
            } else {
                $avans_rub = round($summa_s_nds / 100 * $avans_procent, 2);
                $this->summa_avansa = $avans_rub;
            }
        } else {

            $this->summa_nds = '0.00';
            $this->nds = '0.00';
            if (!empty($avans_rub)) {
                $this->summa_avansa = $avans_rub;
                $this->avans_procent = round($avans_rub / $summa_bez_nds * 100, 2);
            } else {
                $avans_rub = round($summa_bez_nds / 100 * $avans_procent, 2);
                $this->summa_avansa = $avans_rub;
            }

        }


    }

    public function CreateSchet()
    {
        // создание счета
        $schet = new Schet;
        $schet->id_dogovor = $this->id;
        $schet->author_id = $this->id_author;

        if ($this->nds !== '0.00') {

            // если сумма аванса указана, а проценты аванса нет
            if (!empty($this->summa_avansa)) {
                $schet->summa_s_nds = (double)$this->summa_avansa;
                $schet->nds = (double)$this->summa_avansa - (round($this->summa_avansa / (1 + $this->StavkaNDS() / 100), 2));
                $schet->summa_bez_nds = $schet->summa_s_nds - $schet->nds;
            } // если аванс равен 0,а процент есть
            elseif (empty($this->summa_avansa)) {
                /* $schet->summa_s_nds = $this->summa_nds;
                 $schet->nds = (double)round($schet->summa_s_nds - ($schet->summa_s_nds / (1 + $this->StavkaNDS() / 100)), 2);
                 $schet->summa_bez_nds = $schet->summa_s_nds - $schet->nds;*/


                $schet->summa_s_nds = $this->summa_nds;
                $schet->nds = $this->nds;
                $schet->summa_bez_nds = $this->summa_dogovora_nachalnaya;

            }


        } else {

            // если сумма аванса указана, а проценты аванса нет
            if (!empty($this->summa_avansa)) {
                $schet->summa_s_nds = '0.00';
                $schet->nds = '0.00';
                $schet->summa_bez_nds = $this->summa_avansa;
            } elseif (empty($this->summa_avansa)) {
                $schet->summa_s_nds = '0.00';
                $schet->nds = '0.00';
                $schet->summa_bez_nds = $this->summa_dogovora_nachalnaya;

            }

        }
        $schet->data_scheta = date("Y-m-d");
        !empty($this->summa_avansa) ? $schet->schet_tip = '1' : $schet->schet_tip = '3';
        $schet->status = 'не оплачен';
        $schet->tip_oplati = 'безнал';
        $schet->id_dopsoglasheniya = null;

        if (!$schet->save())
            $schet->getErrors();

    }


    private function MakeDirectory() //$path,$pdf
    {

        $separator = "/";

        if ($this->created_date !== null) {
            $year = date('Y', strtotime($this->created_date));
        } else {
            $year = date("Y");
        }
        $ispolnitel_name = Ispolnitel::model()->findByPk((int)$this->id_ispolnitel);
        $ispolnitel_name = $ispolnitel_name->name; //  mysql_real_escape_string($ispolnitel_name->name);
        $contragent_name = Contragent::model()->findByPk((int)$this->id_contragent);
        $contragent_name = $contragent_name->name; //  mysql_real_escape_string($contragent_name->name);
        $dogovor_number = $this->dogovor_number;
        $path_to_documents_folder = Yii::app()->params['documents_folder']
            . $separator . $year . $separator . $ispolnitel_name . $separator . $contragent_name . $separator . $dogovor_number . $separator . "Договор";

        if (!file_exists($path_to_documents_folder)) {
            $pathToFile = $path_to_documents_folder;
            $folders = explode('/', $pathToFile);
            $currentFolder = '';
            $folder_path = array();
            foreach ($folders as $folder) {
                $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", ")", "(", " ", "  ");
                $folder = trim(str_replace($srting, " ", $folder));
                $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
                array_push($folder_path, $folder);
                $currentFolder .= $folder . $separator;
                if (!file_exists($currentFolder)) {
                    mkdir($currentFolder, 0755, true);

                }
            }
        }
        // сохранение пути в базу можели договора

        $this->folder_path = mb_convert_encoding(implode("/", $folder_path), 'UTF-8', 'Windows-1251');
        $work_folder_name = mb_convert_encoding("Рабочие  документы", 'Windows-1251', 'UTF-8');

        $folders = explode('/', $this->folder_path);
        $folders[count($folders) - 1] = "";
        $folder = Yii::getPathOfAlias('webroot') . "/" . implode('/', $folders);
        $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
        if (!file_exists($folder . $work_folder_name)) {
            mkdir($folder . $work_folder_name, 0755, true);
        } else {
            //   echo "NO SUCH DIRECTORY  =" . $folder . "<br>";
        }

    }

    public function RecreateALL() //$path,$pdf
    {

        $dogovor_model = Dogovor::model()->findAll();
        foreach ($dogovor_model as $dogovor) {
            $work_folder_name = mb_convert_encoding("Рабочие  документы", 'Windows-1251', 'UTF-8');
            $folders = explode('/', $dogovor->folder_path);
            $folders[count($folders) - 1] = "";
            $folder = Yii::getPathOfAlias('webroot') . "/" . implode('/', $folders);
            $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
            if (file_exists($folder)) {
                mkdir($folder . $work_folder_name, 0755, true);
            } else {
                echo "NO SUCH DIRECTORY  =" . $folder . "<br>";
            }


        }


    }

    public function MakeDirectoryAll() //$path,$pdf
    {

        $dogovor_model = Dogovor::model()->findAll();
        foreach ($dogovor_model as $dogovor) {
// $new_model_dogovor=new Dogovor();
            //   echo $dogovor->dogovor_number;
            // exit();
            $separator = "/";
            $year = date("Y", strtotime($dogovor->created_date));  //date("Y");
            $ispolnitel_name = Ispolnitel::model()->findByPk((int)$dogovor->id_ispolnitel);
            $ispolnitel_name = $ispolnitel_name->name; //  mysql_real_escape_string($ispolnitel_name->name);
            $contragent_name = Contragent::model()->findByPk((int)$dogovor->id_contragent);
            $contragent_name = $contragent_name->name; //  mysql_real_escape_string($contragent_name->name);
            $dogovor_number = $dogovor->dogovor_number;
            $path_to_documents_folder = Yii::app()->params['documents_folder']
                . $separator . $year . $separator . $ispolnitel_name . $separator . $contragent_name . $separator . $dogovor_number . $separator . "Договор";
            // $pathToFile = 'test1/test2/test3/test4';
            $pathToFile = $path_to_documents_folder;
            // $fileName = basename($pathToFile);
            $folders = explode('/', $pathToFile);
            $currentFolder = '';
            $folder_path = array();
            foreach ($folders as $folder) {
                $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", ")", "(", " ", "  ");
                $folder = trim(str_replace($srting, " ", $folder));
                $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
                array_push($folder_path, $folder);
                $currentFolder .= $folder . "/";

                if (!file_exists($currentFolder)) {

                    //    $currentFolder = preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/","",$currentFolder);
                    mkdir($currentFolder, 0755);
                }

                $path_to_documents_folder2 = Yii::app()->params['documents_folder'] . $separator . $year . $separator . $ispolnitel_name . $separator . $contragent_name . $separator . $dogovor_number . $separator . "Рабочие документы";
                $folder2 = mb_convert_encoding($path_to_documents_folder2, 'Windows-1251', 'UTF-8');

                if (!file_exists($folder2)) {

                    mkdir($folder2, 0755);
                }
            }
            //  mkdir($path_to_documents_folder = Yii::app()->params['documents_folder']. $separator . $year . $separator . $ispolnitel_name . $separator . $contragent_name . $separator . $dogovor_number . $separator ."Рабочие материалы", 0755);


            echo $dogovor->folder_path = mb_convert_encoding(implode("/", $folder_path), 'UTF-8', 'Windows-1251');
            if ($dogovor->save(false)) {
                echo $dogovor->folder_path;

                $work_folder_name = mb_convert_encoding("Рабочие  документы", 'Windows-1251', 'UTF-8');
                $folders = explode('/', $dogovor->folder_path);
                $folders[count($folders) - 1] = "";
                $folder = Yii::getPathOfAlias('webroot') . "/" . implode('/', $folders);
                $folder = mb_convert_encoding($folder, 'Windows-1251', 'UTF-8');
                if (file_exists($folder)) {
                    mkdir($folder . $work_folder_name, 0755, true);
                } else {
                    echo "NO SUCH DIRECTORY  =" . $folder . "<br>";
                }
            }

        }


    }


    public function ProsrocheniyDogovor()
    {
        $criteria = new CDbCriteria;
        // DATEDIFF(NOW(),t.srok_ispolneniya) AS
        $criteria->alias = 't';
        $criteria->select = array('DATEDIFF(srok_ispolneniya,CURDATE()) AS ostalos_dney', 't.srok_ispolneniya', 't.dogovor_number', 't.dogovor_number_old', 't.podpisan_date', 't.status', 't.created_date', 't.id');
        $criteria->condition = "t.status NOT IN('закрыт','не заключили') AND DATEDIFF(t.srok_ispolneniya,CURDATE())<=" . Yii::app()->params['dogovor_srok_do'];
        // $criteria->condition = "t.status <> 'закрыт' AND (DATEDIFF(srok_ispolneniya,CURDATE())) <=" . Yii::app()->params['dogovor_srok_do'] . " OR  DATEDIFF(CURDATE(), t.srok_ispolneniya) >" . Yii::app()->params['dogovor_srok_posle'] . ")";
        $criteria->order = 'created_date DESC';
        $criteria->together = true;
        $criteria->with = array(
            'Contragents' => array('alias' => 'contragent', //'together' => true,
                'select' => array('contragent.id', 'contragent.name',)),
            'Ispolnitels' => array('alias' => 'ispolnitel', //'together' => true,
                'select' => array('ispolnitel.id', 'ispolnitel.name',)),
        );


        /*
         $criteria->compare('t.id', $this->id);
         $criteria->compare('t.id_ispolnitel', $this->id_ispolnitel);
         $criteria->compare('t.id_contragent', $this->id_contragent);
         $criteria->compare('t.id_author', $this->id_author);
         $criteria->compare('dogovor_number', $this->dogovor_number, true);
         $criteria->compare('dogovor_number_old', $this->dogovor_number_old, true);
         $criteria->compare('t.primechaniye', $this->primechaniye, true);
         $criteria->compare('avans_procent', $this->avans_procent, true);
         $criteria->compare('summa_avansa', $this->summa_avansa, true);
         $criteria->compare('summa_dogovora_nachalnaya', $this->summa_dogovora_nachalnaya, true);
         // $criteria->compare('created_date',$this->created_date,true);
         // $criteria->compare('closed_date',$this->closed_date,true);
         $criteria->compare('srok_ispolneniya', $this->srok_ispolneniya, true);
         // $criteria->compare('podpisan_date',$this->podpisan_date,true);
         $criteria->compare('t.status', $this->status, true);


        */

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 8,
            ),


        ));

    }


    public function VidiRabot()
    {
        $spr_vid = Yii::app()->db->createCommand()
            ->select('spr_vid.naimenovaniye')
            ->from('spr_vid_rabot spr_vid')
            ->join('vid_rabor_po_dogovoru vid_rabor', 'spr_vid.id_rabot=vid_rabor.id_vid_rabot')
            ->where('vid_rabor.id_dogovor=:id', array(':id' => (int)$this->id))
            ->order('vid_rabor.data asc')
            //->limit('1')
            ->queryAll();
        return $spr_vid;

    }


    public function CheckZakritiye($old_status)
    {
        $notify = '';

        if ($_POST['Dogovor']['status'] == "закрыт") {

            $schet = Schet::model()->find('id_dogovor=:dogovorId AND status=:Status', array(':dogovorId' => (int)$this->id, ':Status' => 'не оплачен'));
            $count = count($schet);
            if ($count > 0) {
                $this->status = $old_status;
                $notify = "Договор не может быть закрыт! По нему есть неоплаченные счета в количестве : $count  !";
            } else {
                $this->status = 'закрыт';
                $notify = 'Договор  закрыт!';
            }
        }
        return $notify;

    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.


        if ($this->document_number_search) {


// $this->document_number_search=$_GET['Dogovor']['document_number_search'];
            $criteria = new CDbCriteria;
            // DATEDIFF(NOW(),t.srok_ispolneniya) AS
            $criteria->alias = 't';
            $criteria->select = array('t.*', 'etap.document_number AS document_number_search');
            $criteria->join = 'LEFT JOIN object_rabot ob ON t.id=ob.id_dogovor LEFT JOIN etap_rabor_po_objectu etap ON ob.id=etap.id_objecta';

            // $criteria->condition = 'etap.document_number = 36/18464';
            //  $criteria->compare('etap.document_number', '36/18464', true, 'OR');
            $criteria->condition = "etap.document_number LIKE :doc_num";
            $criteria->params = array(':doc_num' => "%$this->document_number_search%");
            // $criteria->compare('etap.document_number', '18464', true, 'LIKE');
            $criteria->together = true;
            /*$criteria->with = array(
                'Contragents' => array('alias' => 'contragent', //'together' => true,
                    'select' => array('contragent.id', 'contragent.name',)),
                'Ispolnitels' => array('alias' => 'ispolnitel', //'together' => true,
                    'select' => array('ispolnitel.id', 'ispolnitel.name',)),




            );*/


            return $sdf = new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'sort' => array(
                    'defaultOrder' => 't.id DESC',
                ),


            ));


            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'sort' => array(
                    'defaultOrder' => 't.id DESC',
                ),


            ));
        } else {


            $criteria = new CDbCriteria;
            $criteria->compare('t.id', $this->id);
            $criteria->compare('t.id_ispolnitel', $this->id_ispolnitel);
            $criteria->compare('t.id_contragent', $this->id_contragent);
            $criteria->compare('t.id_author', $this->id_author);
            $criteria->compare('t.dogovor_number', $this->dogovor_number, true);
            $criteria->compare('t.dogovor_number', $this->dogovor_number_old, true);
            $criteria->compare('t.dogovor_number_old', $this->dogovor_number_old, true);
            $criteria->compare('t.dogovor_number', $this->dogovor_number_old, true);
            $criteria->compare('t.primechaniye', $this->primechaniye, true);
            $criteria->compare('t.avans_procent', $this->avans_procent, true);
            $criteria->compare('t.summa_avansa', $this->summa_avansa, true);
            $criteria->compare('t.summa_dogovora_nachalnaya', $this->summa_dogovora_nachalnaya, true);
            // $criteria->compare('created_date',$this->created_date,true);
            // $criteria->compare('closed_date',$this->closed_date,true);
            $criteria->compare('t.srok_ispolneniya', $this->srok_ispolneniya, true);
            // $criteria->compare('podpisan_date',$this->podpisan_date,true);
            $criteria->compare('t.status', $this->status, true);
            $criteria->compare('t.primechaniye', $this->primechaniye, true);
            $criteria->with = array(
                'Contragents' => array('alias' => 'contragent', 'together' => true,
                    'select' => array('contragent.id', 'contragent.name',)),
                'Ispolnitels' => array('alias' => 'ispolnitel', 'together' => true,
                    'select' => array('ispolnitel.id', 'ispolnitel.name',)),

                /* 'object' => array('alias' => 'objects', 'together' => true,
                     'select' => array('objects.id', 'objects.adress',)),*/

            );

            $criteria->together = true;
            $criteria->compare('contragent.name', $this->contragent_search, true, 'OR');
            $criteria->compare('ispolnitel.name', $this->ispolnitel_search, true, 'OR');
            //   $criteria->compare('objects.adress', $this->object_search, true, 'OR');
            //$criteria->compare('podpisan_date', $this->podpisan_date, true);
            $criteria->compare('otkat', $this->otkat, true);
            if ($this->created_date)
                $criteria->compare('created_date', $this->created_date, true);
            if ($this->podpisan_date)
                $criteria->compare('podpisan_date', $this->podpisan_date, true);
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'sort' => array(
                    'defaultOrder' => 't.id DESC',
                ),


            ));


        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Dogovor the static model class
     */

    // добавляем дополниетльные атрибуты к можели
    public function AddAttributes()
    {
        //  $this->created_date = date("Y-m-d");

        $number_archive = $this->NumberGenerator();
        /* $number = substr($number_archive, -3);*/
        $number = $number_archive;
        $this->dogovor_number = $number;
        $this->dogovor_number_old = $number_archive;
        $this->srok_ispolneniya = $this->CountSrokDney();
        $this->id_author = Yii::app()->user->id;


    }

    // генерируем новый номер договора первая версия

    /* private function NumberGenerator()
     {
         $gradation = 1;
         $separator = '';
         $veduchiy_nol = '00';
         $curr_year = date('y');
         $kol_dogovorov_za_god = Yii::app()->db->createCommand(array(
             'select' => array('COUNT(id) AS cur_position'),
             'from' => 'dogovor',
             'where' => 'YEAR(created_date) = YEAR(CURDATE()) AND id_ispolnitel=' . (int)$this->id_ispolnitel,
         ))->queryRow();
         if ((int)$kol_dogovorov_za_god['cur_position'] >= 10 && (int)$kol_dogovorov_za_god['cur_position'] <= 100) {
             $veduchiy_nol = '0';
         } elseif ((int)$kol_dogovorov_za_god['cur_position'] >= 100) {
             $veduchiy_nol = '';
         }
         return $new_dogovor_number = (string)$this->id_ispolnitel . $separator . $curr_year . $separator . $veduchiy_nol . $separator . $kol_dogovorov_za_god['cur_position'] + $gradation;

     }*/


// генерируем новый номер договора
    private function NumberGenerator()
    {
        $gradation = 1;
        $separator = '';
        $veduchiy_nol = '00';
        $curr_year = date('y');
        $model_numeration = InnerDogovorNumeration::model()->find('ispolnitel_id=:ispolnitelId AND date=:Data', array(':ispolnitelId' => (int)$this->id_ispolnitel, ':Data' => !empty($this->id_ispolnitel) ? date('Y', strtotime($this->created_date)) : date("Y")));
        if ($model_numeration !== null) {
            if ((int)$model_numeration->number >= 10 && (int)$model_numeration->number <= 100) {
                $veduchiy_nol = '0';
            } elseif ((int)$model_numeration->number >= 100) {
                $veduchiy_nol = '';
            }
            (int)$model_numeration->number += $gradation;
        } else {
            $model_numeration = new InnerDogovorNumeration;
            $model_numeration->ispolnitel_id = (int)$this->id_ispolnitel;
            (int)$model_numeration->number = 1;
            $model_numeration->date = date('Y');
        }
        $number = $model_numeration->number;
        $model_numeration->save();
        return $new_dogovor_number = (string)$this->id_ispolnitel . $separator . $curr_year . $separator . $veduchiy_nol . $separator . $number;
    }

    private function CountSrokDney()
    {

        if (!empty($this->srok_dni)) {
            $srok_dni_default = (int)$this->srok_dni;
        } else {
            $srok_dni_default = 15;
        }
        // добавление дней к дате
        if (!empty($this->created_date)) {
            $date = $this->created_date;

        } else {
            $date = date("Y-m-d");
        }
        $date = strtotime(date("Y-m-d", strtotime($date)) . " +{$srok_dni_default} days");
        $date = date("Y-m-d", $date);

        $day_of_week = date('l', strtotime($date));

        if ($day_of_week == 'Friday') {
            $add_more_days = 3;
            $date = strtotime(date("Y-m-d", strtotime($date)) . " +{$add_more_days} days");
            $date = date("Y-m-d", $date);
        }
        if ($day_of_week == 'Saturday') {
            $add_more_days = 2;
            $date = strtotime(date("Y-m-d", strtotime($date)) . " +{$add_more_days} days");
            $date = date("Y-m-d", $date);
        }
        if ($day_of_week == 'Sunday') {
            $add_more_days = 1;

            $date = strtotime(date("Y-m-d", strtotime($date)) . " +{$add_more_days} days");
            $date = date("Y-m-d", $date);
        }

        return $date;


    }


    public function CheckUserIsOwner()
    {
        if ($this->block == 'Y' && $this->opened_by_id !== Yii::app()->user->id) {
            return true;
        } else {
            return false;
        }
    }


    public function CheckIfBlocked()
    {
        if ($this !== null && $this->opened_by_id == Yii::app()->user->id && $this->block == 'Y') {
            return true;
        } else {
            return false;
        }
    }


    public function BlockDogovor()
    {
        $this->opened_by_id = Yii::app()->user->id;
        $this->block = 'N'; // must be Y
        $this->update(array('opened_by_id', 'block'));
    }

    public function UnblockDogovor()
    {
        $this->opened_by_id = '';
        $this->block = 'N';
        $this->update(array('opened_by_id', 'block'));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

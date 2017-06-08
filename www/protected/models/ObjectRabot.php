<?php

/**
 * This is the model class for table "object_rabot".
 *
 * The followings are the available columns in table 'object_rabot':
 * @property integer $id
 * @property string $adress
 * @property string $plochad_rabot
 * @property integer $id_dogovor
 * @property string $archiv_number
 * @property integer $id_rayon
 * @property integer $id_avtor
 *
 * The followings are the available model relations:
 * @property ActPbsledovaniya[] $actPbsledovaniyas
 * @property EtapRaborPoObjectu[] $etapRaborPoObjectus
 * @property Users $idAvtor
 * @property Dogovor $idDogovor
 * @property SprRayony $idRayon
 * @property ZatratiPoDogovoru[] $zatratiPoDogovorus
 */
class ObjectRabot extends CActiveRecord
{
    public $mixedSearch;
    public $rayon;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'object_rabot';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(

            array('id_dogovor,archiv_number,id_avtor,id_rayon', 'numerical', 'integerOnly' => true),
            array('id_dogovor', 'compare', 'operator' => '>', 'compareValue' => 0),
            array('plochad_rabot', 'numerical'),
            array('plochad_rabot', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,4})?$/'),
            //  array('plochad_rabot', 'length', 'max' => 300),
            array('data_dopsvedeniya,ean', 'length', 'max' => 50),
            array('nomer_dopsvedeniya', 'length', 'max' => 50),
            array('archiv_number', 'numerical'),
            array('adress,id_rayon', 'required'),
            array('record_date,nomer_dopsvedeniya,data_dopsvedeniya,kadastroviy_nomer,ean', 'safe'),


            // The following rule is used by search().

            array('id, adress, plochad_rabot,nomer_dopsvedeniya,data_dopsvedeniya,
             kadastroviy_nomer, id_dogovor, archiv_number, id_rayon, id_avtor,ean',
                'safe', 'on' => 'search'),
            array('id, adress, plochad_rabot,nomer_dopsvedeniya,data_dopsvedeniya,
             kadastroviy_nomer, id_dogovor, archiv_number, id_rayon, id_avtor,ean',
                'safe', 'on' => 'ObjectByDogovor'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'actPbsledovaniyas' => array(self::HAS_MANY, 'ActPbsledovaniya', 'id_adress'),
            'etapRaborPoObjectus' => array(self::HAS_MANY, 'EtapRaborPoObjectu', 'id_objecta'),
            'avtor' => array(self::BELONGS_TO, 'User', 'id_avtor'),
            'idDogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
            'rayon' => array(self::BELONGS_TO, 'SprRayony', 'id_rayon'),
            'zatratiPoDogovorus' => array(self::HAS_MANY, 'ZatratiPoDogovoru', 'id_objecta_po_dogovoru'),
        );
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                //   $this->data_scheta = new CDbExpression('NOW()');
                $this->id_avtor = Yii::app()->user->id;
                $this->archiv_number = $this->NumberGenerator();



            }

            return true;
        } else
            return false;
    }







    private function NumberGenerator()
    {
        $kol_adresov_po_dogovoru = Yii::app()->db->createCommand(array(
            'select' => array('COUNT(id) AS cur_position'),
            'from' => 'object_rabot',
            'where' => 'id_dogovor=' . (int)$this->id_dogovor,
        ))->queryRow();
        // номер договора - это костыль
        // $dog_model = Dogovor::model()->findByPk((int)$this->id_dogovor);
        // спешил,написал как есть )
        if ((int)$kol_adresov_po_dogovoru['cur_position'] !== null) {
            ++$kol_adresov_po_dogovoru['cur_position'];
        }
        $index_number = $kol_adresov_po_dogovoru['cur_position'];
        return $index_number;

    }


    public function BarCodeGenerator()
    {

        // бля, пишу как есть бо уже заебало

        $dogovor_model=Dogovor::model()->findByPk($this->id_dogovor);


        $bar_code = '';
        $chet = [];
        $nechet = [];
        $id_raw = str_pad($dogovor_model->dogovor_number.$this->archiv_number, 12, "0");
        $id_arr = str_split($id_raw);
        if (empty($this->ean)) {

            for ($number = 0; $number < count($id_arr); $number++) {

                if ($number % 2 == 0) {
                    $chet[] = $id_arr[$number];

                } else {
                    $nechet[] = $id_arr[$number];
                }

            }

            $chet_summ = array_sum($chet) * 1;
            $nechet_summ = array_sum($nechet) * 3;
            $total_summ = $chet_summ + $nechet_summ;
            $total_summ = str_split($total_summ);
            //  $controll_summ = '';

            $controll_summ = 10 - (int)end($total_summ);

            /*switch ((int)end($total_summ)) {
                case 100:
                    $controll_summ = 0;
                    break;
                default:
                    $controll_summ = 10 - $total_summ[1];
                    break;
            }*/
            $bar_code = $id_raw . $controll_summ;
          //  $this->ean=$bar_code;
          //  $this->save(false);

        }

        return $bar_code;

    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Поряд.номер',
            'adress' => 'адреc',
            'plochad_rabot' => 'площадь работ м2',
            'id_dogovor' => 'договор',
            'archiv_number' => 'архивный номер',
            'id_rayon' => 'район',
            'id_avtor' => 'автор',
            'rayon' => 'район',
            'avtor' => 'автор',
            'kadastroviy_nomer' => 'Кадастровый номер',
            'nomer_dopsvedeniya' => 'Номер доп.сведений',
            'data_dopsvedeniya' => 'Дата доп.сведений',
            'ean'=>'штрих код',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical use case:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    /* public function search()
     {

         $criteria = new CDbCriteria;
         $criteria->compare('id', $this->id);
         $criteria->compare('adress', $this->adress, true);
         $criteria->compare('plochad_rabot', $this->plochad_rabot, true);
         $criteria->compare('id_dogovor', $this->id_dogovor);
         $criteria->compare('archiv_number', $this->archiv_number, true);
         $criteria->compare('id_rayon', $this->id_rayon);
         $criteria->compare('id_avtor', $this->id_avtor);

         return new CActiveDataProvider($this, array(
             'criteria' => $criteria,
         ));
     }*/


    public function search()
    {

        $criteria = new CDbCriteria;
        //  $criteria->compare('id', $this->id);
        //  $criteria->compare('id', $this->adress, true);
        $criteria->compare('plochad_rabot', $this->plochad_rabot, true);
        //  $criteria->compare('id_dogovor', $this->id_dogovor);
        $criteria->compare('archiv_number', $this->archiv_number, true);
      //  $criteria->compare('ean', $this->ean, true);
        //  $criteria->compare('id_rayon', $this->id_rayon);
        $criteria->compare('id_avtor', $this->id_avtor);
        $id = $_GET['id'];

        $criteria->condition = 'id_dogovor=' . $id;


        $criteria->with = array(
            'rayon' => array('alias' => 'rayon',
                'select' => array('rayon.id', 'rayon.naimenovaniye',)),
            'avtor' => array('alias' => 'avtor',
                'select' => array('avtor.id', 'avtor.username',)),
        );
        if (isset($this->mixedSearch)) {
            // $criteria->addSearchCondition('id', $this->mixedSearch);
            $criteria->addSearchCondition('adress', $this->mixedSearch, true, 'AND');
            //  $criteria->addSearchCondition('mobile_phone', $this->mixedSearch, true, 'OR');
        }


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ObjectRabot the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function ObjectByDogovor()
    {

        //  exit;
        //  $id=$_GET['id'];
        //  var_dump($_GET);
        // exit();
        $id = $_GET['id'];
        $criteria = new CDbCriteria;
        $criteria->compare('adress', $this->adress, true);
        //  $criteria->compare('id', $this->id);
        $criteria->compare('plochad_rabot', $this->plochad_rabot, true);
        $criteria->compare('id_dogovor', $this->id_dogovor, true);
        $criteria->compare('archiv_number', $this->archiv_number, true);
        $criteria->compare('id_rayon', $this->id_rayon, true);
        $criteria->compare('id_avtor', $this->id_avtor, true);
        $criteria->condition = 'id_dogovor=' . $id;

        // Silex, Guzzle

        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
        $criteria->with = array(
            'rayon' => array('alias' => 'rayon',
                'select' => array('rayon.id', 'rayon.naimenovaniye',)),
            'avtor' => array('alias' => 'avtor',
                'select' => array('avtor.id', 'avtor.username',)),
        );
        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),));
    }

}

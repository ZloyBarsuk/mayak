<?php

/**
 * This is the model class for table "vid_rabor_po_dogovoru".
 *
 * The followings are the available columns in table 'vid_rabor_po_dogovoru':
 * @property integer $id
 * @property integer $id_dogovor
 * @property integer $id_vid_rabot
 * @property integer $id_otvetstvennogo
 * @property string $comment
 * @property string $vid_dney
 * @property string $data
 * @property string $summa
 * @property string $nds_summa
 * @property string $status
 * @property string $srok_ispolneniya
 * @property string $data_nachala
 * @property string $data_okonchaniya
 * @property string $nds
 */
class VidRabotPoDogovoru extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'vid_rabor_po_dogovoru';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_otvetstvennogo,id_dogovor,id_vid_rabot', 'required'),
            array('id_dogovor, id_vid_rabot, id_otvetstvennogo', 'numerical', 'integerOnly' => true),
            array('summa', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('nds_summa', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('comment', 'length', 'max' => 255),
            //array('vid_dney', 'length', 'max'=>20),
            // array('summa, nds_summa', 'length', 'max'=>10),
            array('status', 'length', 'max' => 18),
            // array('nds', 'length', 'max'=>1),
            array('data, srok_ispolneniya, nds,vid_dney, data_nachala, block, data_okonchaniya,id_dopsoglasheniya', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_dogovor, id_vid_rabot,block, id_otvetstvennogo, comment, vid_dney, data, summa,
			 nds_summa, status, srok_ispolneniya, data_nachala, data_okonchaniya, nds', 'safe', 'on' => 'search'),
        );
    }

    static  public function FindAllByDogovor($object_dogovor)
    {
        $adress = Yii::app()->db->createCommand()
            ->select('id,adress')
            ->from('object_rabot')
            // ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('id_dogovor=:id', array(':id' => (int)$object_dogovor))
          //  ->order('record_date desc')
            // ->limit('1')
            ->queryAll();
        // $nds = $stavka_nds['stavka_nds'];
        // return (double)$nds;
        return $adress;

    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'avtor' => array(self::BELONGS_TO, 'User', 'id_otvetstvennogo'),
            'vidrabot' => array(self::BELONGS_TO, 'SprVidRabot', 'id_vid_rabot'),
            'dogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
            //	'dopsoglasheniye' => array(self::BELONGS_TO, 'DopSoglasheniye', 'id_dopsoglasheniya'),
            'dopsoglasheniye' => array(self::BELONGS_TO, 'DopSoglasheniye', 'id_dopsoglasheniya'),

        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_dogovor' => 'Договор',
            'id_vid_rabot' => 'Вид работ',
            'id_otvetstvennogo' => 'Ответственный',
            'comment' => 'Коментарий',
            'vid_dney' => 'Дни',
            'data' => 'Дата',
            'summa' => 'Сумма',
            'nds_summa' => 'Сумма с НДС',
            'status' => 'Статус',
            'srok_ispolneniya' => 'Срок',
            'data_nachala' => 'начало',
            'data_okonchaniya' => 'окончание',
            'nds' => 'НДС',
            'id_dopsoglasheniya' => 'Доп. соглашение',
        );
    }

    private function StavkaNDS()
    {

// выбор данных договора по этому счету
        $dogovor_ispolnitel = Yii::app()->db->createCommand()
            ->select('id_ispolnitel')
            ->from('dogovor')
            ->where('id=:id', array(':id' => (int)$this->id_dogovor))
            ->queryRow();
        $id_ispolnitel = $dogovor_ispolnitel['id_ispolnitel'];

// выбор ставки по договору исполнителя

        $stavka_nds = Yii::app()->db->createCommand()
            ->select('stavka.stavka_nds')
            ->from('ispolnitel_info ispolnitel')
            ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('ispolnitel.id=:id', array(':id' => (int)$id_ispolnitel))
            ->order('ispolnitel.id desc')
            ->limit('1')
            ->queryRow();
        $nds = $stavka_nds['stavka_nds'];
        return (double)$nds;

    }


    public function RaschetSumm()
    {
        $nds_stavka = $this->StavkaNDS();
        $summa_bez_nds = $this->summa;
        // расчет суммы c НДС
        if ($nds_stavka !== '0') {
            $summa_s_nds = round($summa_bez_nds * (1 + $nds_stavka / 100), 2);
            $this->nds_summa = $summa_s_nds;
            $nds = $summa_s_nds - $summa_bez_nds;
            $this->nds = $nds;
        } else {
            $this->nds_summa = '0.00';
            $this->nds = '0.00';
        }

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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_dogovor', $this->id_dogovor);
        $criteria->compare('id_vid_rabot', $this->id_vid_rabot);
        $criteria->compare('id_otvetstvennogo', $this->id_otvetstvennogo);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('vid_dney', $this->vid_dney, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('summa', $this->summa, true);
        $criteria->compare('nds_summa', $this->nds_summa, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('srok_ispolneniya', $this->srok_ispolneniya, true);
        $criteria->compare('data_nachala', $this->data_nachala, true);
        $criteria->compare('data_okonchaniya', $this->data_okonchaniya, true);
        $criteria->compare('nds', $this->nds, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VidRaborPoDogovoru the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function VidRabotByDogovor($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_dogovor=' . $id;
        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
        //$criteria->order = 'id ASC,data ASC';

        $criteria->with = array(
            'vidrabot' => array('alias' => 'vidrabot',
                'select' => array('vidrabot.id_rabot', 'vidrabot.naimenovaniye',)),
            'avtor' => array('alias' => 'avtor',
                'select' => array('avtor.id', 'avtor.username',)),
            'dogovor' => array('alias' => 'dogovor',
                'select' => array('dogovor.id', 'dogovor.dogovor_number',)),
            'dopsoglasheniye' => array('alias' => 'dopsoglasheniye',
                'select' => array('dopsoglasheniye.id', 'dopsoglasheniye.id_dogovor', 'dopsoglasheniye.number',)),
        );

        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,

            'pagination' => array(
                'pageSize' => 5,
            ),));
    }


}

<?php

/**
 * This is the model class for table "object_rabot".
 *
 * The followings are the available columns in table 'object_rabot':
 * @property integer $id
 * @property string $adress
 * @property string $plochad_rabot
 * @property string $nomer_dopsvedeniya
 * @property string $data_dopsvedeniya
 * @property integer $id_dogovor
 * @property string $archiv_number
 * @property integer $id_rayon
 * @property integer $id_avtor
 * @property string $record_date
 * @property string $kadastroviy_nomer
 *
 * The followings are the available model relations:
 * @property ActPbsledovaniya[] $actPbsledovaniyas
 * @property EtapRaborPoObjectu[] $etapRaborPoObjectus
 * @property Dogovor $idDogovor
 * @property SprRayony $idRayon
 * @property Users $idAvtor
 * @property SoprovoditelniyList[] $soprovoditelniyLists
 * @property ZatratiPoDogovoru[] $zatratiPoDogovorus
 */
class ObjectRabotAdress extends CActiveRecord
{



    public $dogovor_number_search = '';

    public $dogovor_old_number_search='';

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
            array('id_dogovor, id_rayon, id_avtor', 'numerical', 'integerOnly' => true),
            array('plochad_rabot', 'length', 'max' => 300),
            array('nomer_dopsvedeniya, archiv_number', 'length', 'max' => 50),
            array('kadastroviy_nomer', 'length', 'max' => 255),
            array('adress, data_dopsvedeniya, record_date,dogovor_number_search,dogovor_old_number_search,ean', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, adress, plochad_rabot, nomer_dopsvedeniya, data_dopsvedeniya, id_dogovor, archiv_number, id_rayon, id_avtor, record_date, kadastroviy_nomer,dogovor_number_search,dogovor_old_number_search,ean', 'safe', 'on' => 'search'),
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
            'dogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
            'Rayon' => array(self::BELONGS_TO, 'SprRayony', 'id_rayon'),
            'Avtor' => array(self::BELONGS_TO, 'Users', 'id_avtor'),
            'soprovoditelniyLists' => array(self::HAS_MANY, 'SoprovoditelniyList', 'id_objecta'),
            'zatratiPoDogovorus' => array(self::HAS_MANY, 'ZatratiPoDogovoru', 'id_objecta_po_dogovoru'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => 'ID',
            'adress' => 'Адрес работ',
            'plochad_rabot' => 'Полщадь',
            'nomer_dopsvedeniya' => '№ Доп. седения',
            'data_dopsvedeniya' => 'Дата доп.сведения',
            'id_dogovor' => 'Договор',
            'archiv_number' => '№ Архивный',
            'id_rayon' => 'Район',
            'id_avtor' => 'Автор',
            'record_date' => 'Дата записи',
            'kadastroviy_nomer' => '№ Кадастровый',
            'dogovor_number_search'=>'№ договора',
            'dogovor_old_number_search'=>'Арх. номер',
            'ean'=>'штрих код',



        );
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

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.adress', $this->adress, true);
    //    $criteria->compare('t.plochad_rabot', $this->plochad_rabot, true);
   //     $criteria->compare('t.nomer_dopsvedeniya', $this->nomer_dopsvedeniya, true);
    //    $criteria->compare('t.data_dopsvedeniya', $this->data_dopsvedeniya, true);
     //   $criteria->compare('t.id_dogovor', $this->id_dogovor);
        $criteria->compare('t.archiv_number', $this->archiv_number, true);
        $criteria->compare('t.ean', $this->ean, true, 'OR');
    //    $criteria->compare('t.id_rayon', $this->id_rayon);
    //    $criteria->compare('t.id_avtor', $this->id_avtor);
     //   $criteria->compare('t.record_date', $this->record_date, true);
        $criteria->compare('t.kadastroviy_nomer', $this->kadastroviy_nomer, true);
      //  $criteria->together = true;
        $criteria->with = array(
            'dogovor' => array('alias' => 'dogovor', //'together' => true,
                'select' => array('dogovor.id', 'dogovor.dogovor_number', 'dogovor.dogovor_number_old',)),

        );
        if ($this->dogovor_number_search)
        {
            $criteria->compare('dogovor.dogovor_number', $this->dogovor_number_search, true, 'OR');

        }
        if ($this->dogovor_old_number_search)
        {
            $criteria->compare('dogovor.dogovor_number_old', $this->dogovor_old_number_search, true, 'OR');

        }




        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 8,
            ),
        ));

    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ObjectRabotAdress the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

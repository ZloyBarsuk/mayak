<?php

/**
 * This is the model class for table "soprovoditelniy_list".
 *
 * The followings are the available columns in table 'soprovoditelniy_list':
 * @property integer $id
 * @property integer $id_objecta
 * @property integer $id_polevik_1
 * @property integer $id_polevik_2
 * @property integer $id_kameralka
 * @property integer $id_mejevoy
 * @property integer $id_proveril_pole
 * @property integer $id_proveril_mejevoy
 * @property integer $id_proveril_kameralka
 * @property string $data_vidachi_pole
 * @property string $data_sdachi_pole
 * @property string $data_sdachi_mejevoy
 * @property string $data_vidachi_kameralka
 * @property string $data_sdachii_kameralka
 *
 * The followings are the available model relations:
 * @property ObjectRabot $idObjecta
 */
class SoprovoditelniyList extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'soprovoditelniy_list';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_objecta','required'),
            array('id_objecta, id_polevik_1, id_polevik_2, id_kameralka,
            id_mejevoy, id_proveril_pole, id_proveril_mejevoy, id_proveril_kameralka',
                'numerical', 'integerOnly' => true),
            array('data_vidachi_pole, data_sdachi_pole, data_sdachi_mejevoy, data_vidachi_kameralka, data_sdachii_kameralka,status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_objecta, id_polevik_1, id_polevik_2, id_kameralka, id_mejevoy, id_proveril_pole, status, id_proveril_mejevoy, id_proveril_kameralka, data_vidachi_pole, data_sdachi_pole, data_sdachi_mejevoy, data_vidachi_kameralka, data_sdachii_kameralka', 'safe', 'on' => 'search'),
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
            //Извращение, но что поделать .. сроки ....

            'object' => array(self::BELONGS_TO, 'ObjectRabot', 'id_objecta'),
            'polevik_1' => array(self::BELONGS_TO, 'User', 'id_polevik_1'),
            'polevik_2' => array(self::BELONGS_TO, 'User', 'id_polevik_2'),
            'kameralka' => array(self::BELONGS_TO, 'User', 'id_kameralka'),
            'mejevoy' => array(self::BELONGS_TO, 'User', 'id_mejevoy'),
            'proveril_pole' => array(self::BELONGS_TO, 'User', 'id_proveril_pole'),
            'proveril_mejevoy' => array(self::BELONGS_TO, 'User', 'id_proveril_mejevoy'),
            'proveril_kameralka' => array(self::BELONGS_TO, 'User', 'id_proveril_kameralka'),


        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_objecta' => 'Адрес работ',
            'id_polevik_1' => 'Полевик 1',
            'id_polevik_2' => 'Полевик 2',
            'id_kameralka' => 'Камералка',
            'id_mejevoy' => 'Межевой',
            'id_proveril_pole' => 'Проверил поле',
            'id_proveril_mejevoy' => 'Проверил межевой',
            'id_proveril_kameralka' => 'Проверил камералку',
            'data_vidachi_pole' => 'Дата выдачи ',
            'data_sdachi_pole' => 'Дата сдачи ',
            'data_sdachi_mejevoy' => 'Дата сдачи ',
            'data_vidachi_kameralka' => 'Дата выдачи ',
            'data_sdachii_kameralka' => 'Дата сдачи',
            'status' => 'Статус',


        );
    }


    public function PoleByObjectu($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_objecta=' . $id;
        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
      /*
       $criteria->with = array(



            'polevik_1' => array('alias' => 'polevik_1',
                'select' => array('polevik_1.id', 'polevik_1.username',)),
            'polevik_2' => array('alias' => 'polevik_2',
                'select' => array('polevik_2.id', 'polevik_2.username',)),
            'kameralka' => array('alias' => 'kameralka',
                'select' => array('kameralka.id', 'kameralka.username',)),
            'mejevoy' => array('alias' => 'mejevoy',
                'select' => array('mejevoy.id', 'mejevoy.username',)),
            'proveril_pole' => array('alias' => 'proveril_pole',
                'select' => array('proveril_pole.id', 'proveril_pole.username',)),
            'proveril_mejevoy' => array('alias' => 'proveril_mejevoy',
                'select' => array('proveril_mejevoy.id', 'proveril_mejevoy.username',)),
            'proveril_kameralka' => array('alias' => 'proveril_kameralka',
                'select' => array('proveril_kameralka.id', 'proveril_kameralka.username',)),

        );
      */
        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),));
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
        $criteria->compare('id_objecta', $this->id_objecta);
        $criteria->compare('id_polevik_1', $this->id_polevik_1);
        $criteria->compare('id_polevik_2', $this->id_polevik_2);
        $criteria->compare('id_kameralka', $this->id_kameralka);
        $criteria->compare('id_mejevoy', $this->id_mejevoy);
        $criteria->compare('id_proveril_pole', $this->id_proveril_pole);
        $criteria->compare('id_proveril_mejevoy', $this->id_proveril_mejevoy);
        $criteria->compare('id_proveril_kameralka', $this->id_proveril_kameralka);
        $criteria->compare('data_vidachi_pole', $this->data_vidachi_pole, true);
        $criteria->compare('data_sdachi_pole', $this->data_sdachi_pole, true);
        $criteria->compare('data_sdachi_mejevoy', $this->data_sdachi_mejevoy, true);
        $criteria->compare('data_vidachi_kameralka', $this->data_vidachi_kameralka, true);
        $criteria->compare('data_sdachii_kameralka', $this->data_sdachii_kameralka, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SoprovoditelniyList the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

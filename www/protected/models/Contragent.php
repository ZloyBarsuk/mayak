<?php

/**
 * This is the model class for table "firma".
 *
 * The followings are the available columns in table 'firma':
 * @property integer $id
 * @property string $name
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Dogovor[] $dogovors
 * @property Dogovor[] $dogovors1
 * @property FirmaInfo[] $firmaInfos
 */
class Contragent extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */


    public function tableName()
    {
        return 'contragent';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,type', 'required'),
            array('name', 'unique', 'message' => 'Имя контрагента не уникально!'),
            array('name', 'length', 'max' => 255),
            array('type', 'length', 'max' => 7),
            // array('id','safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, type', 'safe', 'on' => 'search'),
        );
    }




    public static function GetAllContragents()
    {

        $data = Contragent::model()->findAll();
        $res = array();

        foreach ($data as $cat) {
            $res[$cat->id] = $cat->name;
        }
        return $res;
    }


    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'dogovors' => array(self::HAS_MANY, 'Dogovor', 'id_contragent'),
            'dogovors1' => array(self::HAS_MANY, 'Dogovor', 'id_firma'),
            'contragent_info' => array(self::HAS_MANY, 'ContragentInfo', 'id_firma'),
            'banks' => array(self::MANY_MANY, 'Bank',
                'contragent_bank(post_id, category_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название контрагента',
            'type' => 'Тип',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Contragent the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

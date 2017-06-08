<?php

/**
 * This is the model class for table "etap_rabor_po_objectu".
 *
 * The followings are the available columns in table 'etap_rabor_po_objectu':
 * @property integer $id
 * @property integer $id_objecta
 * @property integer $id_spr_etap_rabot
 * @property integer $id_otvetstvennogo
 * @property string $data_nachala_rabot
 * @property string $data_okonchaniya_rabot
 * @property string $document_number
 * @property string $srok_dney
 * @property string $comment
 * @property string $status
 *
 * The followings are the available model relations:
 * @property ObjectRabot $idObjecta
 * @property SprEtapRabot $idSprEtapRabot
 * @property Users $idOtvetstvennogo
 */
class EtapRabotPoObjectu extends CActiveRecord
{
   public $contract_number;
    public $objects;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'etap_rabor_po_objectu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_objecta, id_spr_etap_rabot, id_otvetstvennogo', 'required'),
            array('id_objecta, id_spr_etap_rabot, id_otvetstvennogo, id_avtor', 'numerical', 'integerOnly'=>true),
            array('document_number, srok_dney', 'length', 'max'=>255),
            array('status', 'length', 'max'=>24),
            array('data_nachala_rabot, comment,data_okonchaniya_rabot', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_objecta, id_spr_etap_rabot, id_otvetstvennogo, id_avtor, data_nachala_rabot, data_okonchaniya_rabot, document_number, srok_dney, comment, status', 'safe', 'on'=>'search'),
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
            'object_rabot' => array(self::BELONGS_TO, 'ObjectRabot', 'id_objecta'),
            'spr_etap_rabot' => array(self::BELONGS_TO, 'SprEtapRabot', 'id_spr_etap_rabot'),
            'otvetstvenniy' => array(self::BELONGS_TO, 'User', 'id_otvetstvennogo'),
            'avtor' => array(self::BELONGS_TO, 'User', 'id_avtor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'contract_number' => 'Договор',
            'objects' => 'Арх. № объекта',


            'id_objecta' => 'Адрес обьекта',
            'id_spr_etap_rabot' => 'Наименование',
            'id_otvetstvennogo' => 'Отв. лицо',
            'data_nachala_rabot' => 'Дата внесения',
            'data_okonchaniya_rabot' => 'Дата документа',
            'document_number' => 'Док.№',
            'srok_dney' => 'Срок исполн.',
            'comment' => 'Комм.',
            'status' => 'Статус',
        );
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_objecta', $this->id_objecta);
        $criteria->compare('id_spr_etap_rabot', $this->id_spr_etap_rabot);
        $criteria->compare('id_otvetstvennogo', $this->id_otvetstvennogo);
        $criteria->compare('data_nachala_rabot', $this->data_nachala_rabot, true);
        $criteria->compare('data_okonchaniya_rabot', $this->data_okonchaniya_rabot, true);
        $criteria->compare('document_number', $this->document_number, true);
        $criteria->compare('srok_dney', $this->srok_dney, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function SearchByNumber()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_objecta', $this->id_objecta);
        $criteria->compare('id_spr_etap_rabot', $this->id_spr_etap_rabot);
        $criteria->compare('id_otvetstvennogo', $this->id_otvetstvennogo);
        $criteria->compare('data_nachala_rabot', $this->data_nachala_rabot, true);
        $criteria->compare('data_okonchaniya_rabot', $this->data_okonchaniya_rabot, true);
        $criteria->compare('document_number', $this->document_number, true);
        $criteria->compare('srok_dney', $this->srok_dney, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public function EtapRabotByObjectu($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_objecta=' . $id;
        $criteria->order = 't.data_nachala_rabot DESC';

        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
        $criteria->with = array(
            /*'object_rabot' => array('alias' => 'object_rabot',
                'select' => array('object_rabot.id', 'object_rabot.naimenovaniye',)),*/

            'spr_etap_rabot' => array('alias' => 'spr_etap_rabot',
                'select' => array('spr_etap_rabot.id', 'spr_etap_rabot.etap_rabot',)),

            'otvetstvenniy' => array('alias' => 'otvetstvenniy',
                'select' => array('otvetstvenniy.id', 'otvetstvenniy.username',)),
            /* 'avtor' => array('alias' => 'avtor',
                 'select' => array('avtor.id', 'avtor.username')),*/
        );
        //  $criteria->together = true;
        return new CActiveDataProvider($this,


            array(
                'criteria' => $criteria,

            'pagination' => array(
                'pageSize' => 5,
            ),));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EtapRabotPoObjectu the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

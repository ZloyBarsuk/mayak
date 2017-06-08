<?php

/**
 * This is the model class for table "zatrati_po_dogovoru".
 *
 * The followings are the available columns in table 'zatrati_po_dogovoru':
 * @property integer $id
 * @property integer $id_dogovor
 * @property integer $id_objecta_po_dogovoru
 * @property integer $id_zatrat
 * @property integer $id_author
 * @property string $summa
 * @property string $data
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Users $idAuthor
 * @property SprZatrat $idZatrat
 * @property ObjectRabot $idObjectaPoDogovoru
 * @property Dogovor $idDogovor
 */
class ZatratiPoDogovoru extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'zatrati_po_dogovoru';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_dogovor, id_objecta_po_dogovoru, id_author', 'numerical', 'integerOnly' => true),
            array('summa', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),

            array('comment', 'length', 'max' => 255),
            array('zatrata', 'length', 'max' => 255),
            array('zatrata', 'required'),
            array('data', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_dogovor, id_objecta_po_dogovoru, zatrata, id_author, summa, data, comment', 'safe', 'on' => 'search'),
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
            'idAuthor' => array(self::BELONGS_TO, 'Users', 'id_author'),
          //  'spr_zatrati' => array(self::BELONGS_TO, 'SprZatrat', 'id_zatrat'),
            'adress_rabot' => array(self::BELONGS_TO, 'ObjectRabot', 'id_objecta_po_dogovoru'),
            'idDogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_dogovor' => 'Договор',
            'id_objecta_po_dogovoru' => 'Адрес работ',
            'zatrata' => 'Затрата наименование',
            'id_author' => 'Автор',
            'summa' => 'сумма',
            'data' => 'дата',
            'comment' => 'комментарий',
        );
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_dogovor', $this->id_dogovor);
        $criteria->compare('id_objecta_po_dogovoru', $this->id_objecta_po_dogovoru);
        $criteria->compare('zatrata', $this->zatrata);
        $criteria->compare('id_author', $this->id_author);
        $criteria->compare('summa', $this->summa, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('comment', $this->comment, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ZatratiPoDogovoru the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function ZatratiPoDogovoruList($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_dogovor=' . $id;
        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
        $criteria->with = array(
            /*'spr_zatrati' => array('alias' => 'spr_zatrati',
                'select' => array('spr_zatrati.id', 'spr_zatrati.naimenovaniye',)),*/
            'adress_rabot' => array('alias' => 'adress_rabot',
                'select' => array('adress_rabot.id', 'adress_rabot.adress',)),

        );

        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,

            'pagination' => array(
                'pageSize' => 5,
            ),));
    }



    public function GetZatratiByPeriod($data)
    {


        $zatrati= Yii::app()->db->createCommand()
            ->select('CONCAT(MONTHNAME(data),YEAR(data)) AS year,
            SUM(summa) AS zatrati_summa')
            ->from('zatrati_po_dogovoru')
            //  ->where('created_date>='2010-06-17' AND closed_date<='2016-04-18' AND status='на подписании' AND YEAR(created_date)=2016')
            ->where('YEAR(data)=:year', array(':year' => $data->years_from_base))
            //  ->order('years desc')
            ->group('MONTH(data)')
            ->queryAll();

        return $zatrati;
    }



}

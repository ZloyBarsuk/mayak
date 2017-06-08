<?php

/**
 * This is the model class for table "ispolnitel".
 *
 * The followings are the available columns in table 'ispolnitel':
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property string $type
 *
 * The followings are the available model relations:
 * @property ActPbsledovaniya[] $actPbsledovaniyas
 * @property Dogovor[] $dogovors
 * @property IspolnitelInfo[] $ispolnitelInfos
 * @property Users[] $users
 */
class Ispolnitel extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */


    public function tableName()
    {
        return 'ispolnitel';
    }


    /*public function scopes()
    {
        return array(

            'с' => array(
                'select' => 'nds,id_bank',

            ),

        );
    }*/


    /**
     * @return array validation rules for model attributes.
     */




    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(

            array('name', 'length', 'max' => 500),
            array('comment', 'length', 'max' => 1000),
            array('type', 'length', 'max' => 7),
            array('id, name, comment, type,signature_path,active', 'safe', 'on' => 'search'),
            array('name, type', 'required'),
            array('id, name, comment, type,signature_path,id_ispolnitel,id_contragent,dogovor_number,', 'safe', 'on' => 'showAllDogovors'),

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
            //	'actPbsledovaniyas' => array(self::HAS_MANY, 'ActPbsledovaniya', 'id_firma'),
            //	'dogovors' => array(self::HAS_MANY, 'Dogovor',array('id_ispolnitel'=>'id')), // рабочая хуйня
            'dogovorsCount' => array(self::STAT, 'Dogovor', 'id_ispolnitel'),
            'dog_by_ispolnitel' => array(self::HAS_MANY, 'Dogovor', 'id_ispolnitel'), // тоже рабочая хуета
            //	'ispolnitelInfos' => array(self::HAS_MANY, 'IspolnitelInfo', 'id_ispolnitel'),
            'users' => array(self::HAS_MANY, 'Users', 'id_firma'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(


            'id' => 'ID',
            'name' => 'Наименовнаие',
            'comment' => 'Комментарий',
            'type' => 'Форма собств.',
            'dog_kvo' => 'Кол. договоров',
            'signature_path' => 'Подпись',
            'active' => 'Активность',



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
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('type', $this->type, true);
        $criteria->with = array('dogovorsCount');
        //	$criteria->together=true;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDogovora($id_isp)
    {


        $command = Yii::app()->db->createCommand()
            ->select('ispolnitel.name,contragent.name AS contragent_name,
                      dogovor.summa_dogovora_nachalnaya,dogovor.dogovor_number,
                      dogovor.dogovor_number_old,dogovor.created_date,dogovor.id_contragent')
            ->from('ispolnitel')
            ->join('dogovor', 'ispolnitel.id=dogovor.id_ispolnitel')
            ->where('ispolnitel.id=:id', array(':id' => $id_isp))
            ->join('contragent', 'contragent.id=dogovor.id_contragent')
            ->order('')
            ->group('')
            ->queryAll();


        /*
                $command = Yii::app()->db->createCommand()
                    ->select('id,dogovor_number,dogovor.created_date,dogovor.id_contragent')
                    ->from('dogovor')
                   ->where('id_ispolnitel=1')
                                ->queryAll();*/

        return $command;


    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ispolnitel the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


}

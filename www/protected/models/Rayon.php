<?php

/**
 * This is the model class for table "spr_rayony".
 *
 * The followings are the available columns in table 'spr_rayony':
 * @property integer $id
 * @property string $naimenovaniye
 *
 * The followings are the available model relations:
 * @property AdressRabot[] $adressRabots
 * @property SprGosOrgan[] $sprGosOrgans
 */
class Rayon extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spr_rayony';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naimenovaniye', 'required'),
			array('naimenovaniye', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, naimenovaniye', 'safe', 'on'=>'search'),
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
			'adressRabots' => array(self::HAS_MANY, 'AdressRabot', 'id_rayon'),
			'sprGosOrgans' => array(self::HAS_MANY, 'SprGosOrgan', 'id_rayon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Фйди',
			'naimenovaniye' => 'название',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('naimenovaniye',$this->naimenovaniye,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rayon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

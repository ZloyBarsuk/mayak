<?php

/**
 * This is the model class for table "spr_vid_rabot".
 *
 * The followings are the available columns in table 'spr_vid_rabot':
 * @property integer $id_rabot
 * @property string $naimenovaniye
 * @property string $procent_ot_summi
 * @property integer $actualnost
 *
 * The followings are the available model relations:
 * @property DopsoglasheniyeToVidrabot[] $dopsoglasheniyeToVidrabots
 */
class SprVidRabot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spr_vid_rabot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actualnost', 'numerical', 'integerOnly'=>true),
			array('naimenovaniye', 'length', 'max'=>300),
			array('procent_ot_summi', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rabot, naimenovaniye, procent_ot_summi, actualnost', 'safe', 'on'=>'search'),
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
			'dopsoglasheniyeToVidrabots' => array(self::HAS_MANY, 'DopsoglasheniyeToVidrabot', 'id_vidrabot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rabot' => 'Id',
			'naimenovaniye' => 'Наименование',
			'procent_ot_summi' => '% от суммы',
			'actualnost' => 'актуальность',
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

		$criteria->compare('id_rabot',$this->id_rabot);
		$criteria->compare('naimenovaniye',$this->naimenovaniye,true);
		$criteria->compare('procent_ot_summi',$this->procent_ot_summi,true);
		$criteria->compare('actualnost',$this->actualnost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SprVidRabot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

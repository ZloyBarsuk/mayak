<?php

/**
 * This is the model class for table "spr_nds_info".
 *
 * The followings are the available columns in table 'spr_nds_info':
 * @property integer $id
 * @property string $stavka_nds
 * @property string $record_date
 *
 * The followings are the available model relations:
 * @property ContragentInfo[] $contragentInfos
 * @property IspolnitelInfo[] $ispolnitelInfos
 */
class SprNdsInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spr_nds_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stavka_nds', 'length', 'max'=>10),
			array('record_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stavka_nds, record_date', 'safe', 'on'=>'search'),
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
			'contragentInfos' => array(self::HAS_MANY, 'ContragentInfo', 'nds'),
			'ispolnitelInfos' => array(self::HAS_MANY, 'IspolnitelInfo', 'nds'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stavka_nds' => 'Stavka Nds',
			'record_date' => 'Record Date',
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
		$criteria->compare('stavka_nds',$this->stavka_nds,true);
		$criteria->compare('record_date',$this->record_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SprNdsInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

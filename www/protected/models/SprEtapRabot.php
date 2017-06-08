<?php

/**
 * This is the model class for table "spr_etap_rabot".
 *
 * The followings are the available columns in table 'spr_etap_rabot':
 * @property integer $id
 * @property string $etap_rabot
 * @property string $comment
 * @property integer $actualnost
 *
 * The followings are the available model relations:
 * @property EtapRaborPoObjectu[] $etapRaborPoObjectus
 */
class SprEtapRabot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spr_etap_rabot';
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
			array('etap_rabot, comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, etap_rabot, comment, actualnost', 'safe', 'on'=>'search'),
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
			'etapRaborPoObjectus' => array(self::HAS_MANY, 'EtapRaborPoObjectu', 'id_spr_etap_rabot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'etap_rabot' => 'Etap Rabot',
			'comment' => 'Comment',
			'actualnost' => 'Actualnost',
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
		$criteria->compare('etap_rabot',$this->etap_rabot,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('actualnost',$this->actualnost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SprEtapRabot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

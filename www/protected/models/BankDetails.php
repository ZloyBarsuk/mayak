<?php

/**
 * This is the model class for table "bank_details".
 *
 * The followings are the available columns in table 'bank_details':
 * @property integer $id
 * @property integer $id_bank
 * @property string $inn
 * @property integer $id_author
 * @property string $kpp
 * @property string $yur_address
 * @property string $fiz_address
 * @property string $ogrm
 * @property string $r_s
 * @property string $k_s
 * @property string $bic
 * @property string $swift
 * @property string $account_type
 * @property string $record_date
 *
 * The followings are the available model relations:
 * @property Users $idAuthor
 * @property Bank $idBank
 */
class BankDetails extends CActiveRecord
{
public $update_or_insert='';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bank, id_author, account_type, ', 'required'),
			array('id_bank, id_author', 'numerical', 'integerOnly'=>true),
			array('inn', 'length', 'max'=>12),
			array('kpp, bic, swift', 'length', 'max'=>9),
			array('yur_address, fiz_address', 'length', 'max'=>200),
			array('ogrm', 'length', 'max'=>13),
			array('r_s, k_s', 'length', 'max'=>20),
			array('account_type', 'length', 'max'=>3),
			array('record_date','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_bank, inn, id_author, kpp, yur_address, fiz_address, ogrm, r_s, k_s, bic, swift, account_type, record_date', 'safe', 'on'=>'search'),
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
			'idBank' => array(self::BELONGS_TO, 'Bank', 'id_bank'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_bank' => 'Id Bank',
			'inn' => 'ИНН',
			'id_author' => 'автор',
			'kpp' => 'КПП',
			'yur_address' => 'Юр. адрес',
			'fiz_address' => 'Физ. адрес',
			'ogrm' => 'ОГРН',
			'r_s' => 'Р/С',
			'k_s' => 'К/С',
			'bic' => 'БИК',
			'swift' => 'Swift',
			'account_type' => 'Валюта',
			'record_date' => 'Дата записи',
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
		$criteria->compare('id_bank',$this->id_bank);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('id_author',$this->id_author);
		$criteria->compare('kpp',$this->kpp,true);
		$criteria->compare('yur_address',$this->yur_address,true);
		$criteria->compare('fiz_address',$this->fiz_address,true);
		$criteria->compare('ogrm',$this->ogrm,true);
		$criteria->compare('r_s',$this->r_s,true);
		$criteria->compare('k_s',$this->k_s,true);
		$criteria->compare('bic',$this->bic,true);
		$criteria->compare('swift',$this->swift,true);
		$criteria->compare('account_type',$this->account_type,true);
		$criteria->compare('record_date',$this->record_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BankDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

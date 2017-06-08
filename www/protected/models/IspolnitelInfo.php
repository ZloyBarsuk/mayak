<?php

/**
 * This is the model class for table "ispolnitel_info".
 *
 * The followings are the available columns in table 'ispolnitel_info':
 * @property integer $id
 * @property integer $id_ispolnitel
 * @property integer $id_author
 * @property integer $nds
 * @property integer $id_bank
 * @property string $comments
 * @property string $pasport
 * @property string $inn
 * @property string $kpp
 * @property string $okpo
 * @property string $ogrn
 * @property string $ogrnip
 * @property string $phone
 * @property string $fax
 * @property string $site
 * @property string $yur_address
 * @property string $fiz_address
 * @property string $director
 * @property string $zamestitel
 * @property string $email
 * @property string $logo_path
 * @property string $osnovaniye_dogovora
 * @property string $data_from_csv
 * @property string $record_date
 *
 * The followings are the available model relations:
 * @property Users $idAuthor
 * @property Bank $idBank
 * @property Ispolnitel $idIspolnitel
 * @property ContragentNdsInfo $nds0
 */
class IspolnitelInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ispolnitel_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_ispolnitel', 'required'),
			array('id_ispolnitel, id_author, nds, id_bank', 'numerical', 'integerOnly'=>true),
			array('pasport', 'length', 'max'=>500),
			array('inn', 'length', 'max'=>12),
			array('kpp', 'length', 'max'=>9),
			array('okpo', 'length', 'max'=>11),
			array('ogrn', 'length', 'max'=>13),
			array('ogrnip', 'length', 'max'=>15),
			array('phone, fax, email', 'length', 'max'=>255),
			array('site, director, zamestitel', 'length', 'max'=>100),
			array('logo_path, osnovaniye_dogovora', 'length', 'max'=>50),
			array('comments, yur_address, fiz_address, data_from_csv, record_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_ispolnitel, id_author, nds, id_bank, comments, pasport, inn, kpp, okpo, ogrn, ogrnip, phone, fax, site, yur_address, fiz_address, director, zamestitel, email, logo_path, osnovaniye_dogovora, data_from_csv, record_date', 'safe', 'on'=>'search'),
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
			'Ispolnitel' => array(self::BELONGS_TO, 'Ispolnitel', 'id'),
			'nds0' => array(self::BELONGS_TO, 'ContragentNdsInfo', 'nds'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_ispolnitel' => 'Исполнитель',
			'id_author' => 'Автор',
			'nds' => 'НДС',
			'id_bank' => 'Банк',
			'comments' => 'Комментарий',
			'pasport' => 'Паспорт',
			'inn' => 'ИНН',
			'kpp' => 'КПП',
			'okpo' => 'ОКПО',
			'ogrn' => 'ОГРН',
			'ogrnip' => 'ОГРНИП',
			'phone' => 'Телефон',
			'fax' => 'Факс',
			'site' => 'Сайт',
			'yur_address' => 'Юр. адрес',
			'fiz_address' => 'Почт. адрес',
			'director' => 'Директор',
			'zamestitel' => 'Заместитель',
			'email' => 'Email',
			'logo_path' => 'Логотип',
			'osnovaniye_dogovora' => 'Основание договора',
			'data_from_csv' => 'Данные базы Csv',
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
		$criteria->compare('id_ispolnitel',$this->id_ispolnitel);
		$criteria->compare('id_author',$this->id_author);
		$criteria->compare('nds',$this->nds);
		$criteria->compare('id_bank',$this->id_bank);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('pasport',$this->pasport,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('kpp',$this->kpp,true);
		$criteria->compare('okpo',$this->okpo,true);
		$criteria->compare('ogrn',$this->ogrn,true);
		$criteria->compare('ogrnip',$this->ogrnip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('yur_address',$this->yur_address,true);
		$criteria->compare('fiz_address',$this->fiz_address,true);
		$criteria->compare('director',$this->director,true);
		$criteria->compare('zamestitel',$this->zamestitel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('logo_path',$this->logo_path,true);
		$criteria->compare('osnovaniye_dogovora',$this->osnovaniye_dogovora,true);
		$criteria->compare('data_from_csv',$this->data_from_csv,true);
		$criteria->compare('record_date',$this->record_date,true);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IspolnitelInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

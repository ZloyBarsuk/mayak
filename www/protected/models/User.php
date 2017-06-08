<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $otchestvo
 * @property string $familiya
 * @property integer $id_group
 * @property string $email
 * @property string $doljnost
 * @property string $phone_cell
 * @property string $phone_home
 * @property string $skype
 * @property integer $id_firma
 * @property string $password
 * @property string $pol
 * @property string $birth_date
 * @property string $passport
 * @property string $acronym
 * @property integer $actualnost
 * @property string $folder_documents
 *
 * The followings are the available model relations:
 * @property BankDetails[] $bankDetails
 * @property Dogovor[] $dogovors
 * @property DogovorResponsibleTransfer[] $dogovorResponsibleTransfers
 * @property DogovorResponsibleTransfer[] $dogovorResponsibleTransfers1
 * @property EtapRabotPoAdresy[] $etapRabotPoAdresies
 * @property EtapRabotPoAdresy[] $etapRabotPoAdresies1
 * @property FirmaInfo[] $firmaInfos
 * @property VidRaborPoDogovoru[] $vidRaborPoDogovorus
 * @property ZatratiPoDogovoru[] $zatratiPoDogovorus
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, otchestvo, familiya, id_group', 'required'),
			array('id_group, id_firma, actualnost', 'numerical', 'integerOnly'=>true),
			array('name, otchestvo, familiya, email, doljnost, phone_cell, phone_home, skype', 'length', 'max'=>50),
			array('password', 'length', 'max'=>100),
			array('pol', 'length', 'max'=>2),
			array('passport', 'length', 'max'=>200),
			array('acronym', 'length', 'max'=>3),
			array('folder_documents', 'length', 'max'=>500),
			array('birth_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, otchestvo, familiya, id_group, email, doljnost, phone_cell, phone_home, skype, id_firma, password, pol, birth_date, passport, acronym, actualnost, folder_documents', 'safe', 'on'=>'search'),
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
			'bankDetails' => array(self::HAS_MANY, 'BankDetails', 'id_author'),
			'dogovors' => array(self::HAS_MANY, 'Dogovor', 'id_author'),
			'dogovorResponsibleTransfers' => array(self::HAS_MANY, 'DogovorResponsibleTransfer', 'id_from'),
			'dogovorResponsibleTransfers1' => array(self::HAS_MANY, 'DogovorResponsibleTransfer', 'id_to'),
			'etapRabotPoAdresies' => array(self::HAS_MANY, 'EtapRabotPoAdresy', 'id_otvetstvennogo'),
			'etapRabotPoAdresies1' => array(self::HAS_MANY, 'EtapRabotPoAdresy', 'id_author'),
			'firmaInfos' => array(self::HAS_MANY, 'FirmaInfo', 'id_author'),
			'vidRaborPoDogovorus' => array(self::HAS_MANY, 'VidRaborPoDogovoru', 'id_otvetstvennogo'),
			'zatratiPoDogovorus' => array(self::HAS_MANY, 'ZatratiPoDogovoru', 'id_author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'otchestvo' => 'Otchestvo',
			'familiya' => 'Фамилия',
			'id_group' => 'Id Group',
			'email' => 'Email',
			'doljnost' => 'Doljnost',
			'phone_cell' => 'Phone Cell',
			'phone_home' => 'Phone Home',
			'skype' => 'Skype',
			'id_firma' => 'Id Firma',
			'password' => 'Password',
			'pol' => 'Pol',
			'birth_date' => 'Birth Date',
			'passport' => 'Passport',
			'acronym' => 'Acronym',
			'actualnost' => 'Actualnost',
			'folder_documents' => 'Folder Documents',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('otchestvo',$this->otchestvo,true);
		$criteria->compare('familiya',$this->familiya,true);
		$criteria->compare('id_group',$this->id_group);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('doljnost',$this->doljnost,true);
		$criteria->compare('phone_cell',$this->phone_cell,true);
		$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('id_firma',$this->id_firma);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('pol',$this->pol,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('acronym',$this->acronym,true);
		$criteria->compare('actualnost',$this->actualnost);
		$criteria->compare('folder_documents',$this->folder_documents,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

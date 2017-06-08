<?php

/**
 * This is the model class for table "spr_gos_organ".
 *
 * The followings are the available columns in table 'spr_gos_organ':
 * @property integer $id
 * @property integer $id_rayon
 * @property string $uchreghdenie
 * @property string $fio_nachalnik_otdela
 * @property string $adress
 * @property string $cell_phone
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property SprRayony $idRayon
 */
class SprGosOrgan extends CActiveRecord
{

	public $rayon_search = '';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spr_gos_organ';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rayon, fio_nachalnik_otdela, adress, phone,pol', 'required'),
			array('id_rayon', 'numerical', 'integerOnly'=>true),
			array('uchreghdenie, adress, cell_phone, phone', 'length', 'max'=>255),
			array('fio_nachalnik_otdela', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.

			array('id, id_rayon, uchreghdenie, pol,fio_nachalnik_otdela, adress, cell_phone, phone,rayon_search', 'safe', 'on'=>'search'),
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
			'Rayon' => array(self::BELONGS_TO, 'SprRayony', 'id_rayon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_rayon' => 'район',
			'uchreghdenie' => 'учереждение',
			'fio_nachalnik_otdela' => 'ФИО начальника отдела',
			'adress' => 'адрес',
			'cell_phone' => 'моб. телефон',
			'phone' => 'раб. телефон',
			'pol' => 'пол',
			'rayon_search' => 'Район',


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
		$criteria->compare('id_rayon',$this->id_rayon);
		$criteria->compare('uchreghdenie',$this->uchreghdenie,true);
		$criteria->compare('fio_nachalnik_otdela',$this->fio_nachalnik_otdela,true);
		$criteria->compare('adress',$this->adress,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('phone',$this->phone,true);

		$criteria->with = array(
			'Rayon' => array('alias' => 'rayon', //'together' => true,
				'select' => array('id', 'rayon.naimenovaniye',)),


		);
		$criteria->compare('rayon.naimenovaniye', $this->rayon_search, true, 'OR');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SprGosOrgan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

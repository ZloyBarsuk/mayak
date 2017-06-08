<?php

/**
 * This is the model class for table "object_rabot".
 *
 * The followings are the available columns in table 'object_rabot':
 * @property integer $id
 * @property string $adress
 * @property string $plochad_rabot
 * @property string $nomer_dopsvedeniya
 * @property string $data_dopsvedeniya
 * @property integer $id_dogovor
 * @property string $archiv_number
 * @property integer $id_rayon
 * @property integer $id_avtor
 * @property string $record_date
 * @property string $kadastroviy_nomer
 * @property string $comment
 * @property string $ean
 *
 * The followings are the available model relations:
 * @property ActPbsledovaniya[] $actPbsledovaniyas
 * @property EtapRaborPoObjectu[] $etapRaborPoObjectus
 * @property Dogovor $idDogovor
 * @property SprRayony $idRayon
 * @property Users $idAvtor
 * @property SoprovoditelniyList[] $soprovoditelniyLists
 * @property ZatratiPoDogovoru[] $zatratiPoDogovorus
 */
class ObjectRabot2 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'object_rabot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dogovor, id_rayon, id_avtor', 'numerical', 'integerOnly'=>true),
			array('plochad_rabot', 'length', 'max'=>300),
			array('nomer_dopsvedeniya, archiv_number', 'length', 'max'=>50),
			array('kadastroviy_nomer, comment, ean', 'length', 'max'=>255),
			array('adress, data_dopsvedeniya, record_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, adress, plochad_rabot, nomer_dopsvedeniya, data_dopsvedeniya, id_dogovor, archiv_number, id_rayon, id_avtor, record_date, kadastroviy_nomer, comment, ean', 'safe', 'on'=>'search'),
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
			'actPbsledovaniyas' => array(self::HAS_MANY, 'ActPbsledovaniya', 'id_adress'),
			'etapRaborPoObjectus' => array(self::HAS_MANY, 'EtapRaborPoObjectu', 'id_objecta'),
			'idDogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
			'idRayon' => array(self::BELONGS_TO, 'SprRayony', 'id_rayon'),
			'idAvtor' => array(self::BELONGS_TO, 'Users', 'id_avtor'),
			'soprovoditelniyLists' => array(self::HAS_MANY, 'SoprovoditelniyList', 'id_objecta'),
			'zatratiPoDogovorus' => array(self::HAS_MANY, 'ZatratiPoDogovoru', 'id_objecta_po_dogovoru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'adress' => 'Adress',
			'plochad_rabot' => 'Plochad Rabot',
			'nomer_dopsvedeniya' => 'Nomer Dopsvedeniya',
			'data_dopsvedeniya' => 'Data Dopsvedeniya',
			'id_dogovor' => 'Id Dogovor',
			'archiv_number' => 'Archiv Number',
			'id_rayon' => 'Id Rayon',
			'id_avtor' => 'Id Avtor',
			'record_date' => 'Record Date',
			'kadastroviy_nomer' => 'Kadastroviy Nomer',
			'comment' => 'Comment',
			'ean' => 'Ean',
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
		$criteria->compare('adress',$this->adress,true);
		$criteria->compare('plochad_rabot',$this->plochad_rabot,true);
		$criteria->compare('nomer_dopsvedeniya',$this->nomer_dopsvedeniya,true);
		$criteria->compare('data_dopsvedeniya',$this->data_dopsvedeniya,true);
		$criteria->compare('id_dogovor',$this->id_dogovor);
		$criteria->compare('archiv_number',$this->archiv_number,true);
		$criteria->compare('id_rayon',$this->id_rayon);
		$criteria->compare('id_avtor',$this->id_avtor);
		$criteria->compare('record_date',$this->record_date,true);
		$criteria->compare('kadastroviy_nomer',$this->kadastroviy_nomer,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('ean',$this->ean,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectRabot2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

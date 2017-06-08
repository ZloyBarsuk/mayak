<?php

/**
 * This is the model class for table "etap_rabor_po_objectu".
 *
 * The followings are the available columns in table 'etap_rabor_po_objectu':
 * @property integer $id
 * @property integer $id_objecta
 * @property integer $id_spr_etap_rabot
 * @property integer $id_otvetstvennogo
 * @property integer $id_avtor
 * @property string $data_nachala_rabot
 * @property string $data_okonchaniya_rabot
 * @property string $document_number
 * @property string $srok_dney
 * @property string $comment
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Users $idAvtor
 * @property ObjectRabot $idObjecta
 * @property Users $idOtvetstvennogo
 */
class EtapRaborPoObjectu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'etap_rabor_po_objectu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_objecta, id_spr_etap_rabot, id_otvetstvennogo, data_okonchaniya_rabot', 'required'),
			array('id_objecta, id_spr_etap_rabot, id_otvetstvennogo, id_avtor', 'numerical', 'integerOnly'=>true),
			array('document_number, srok_dney', 'length', 'max'=>255),
			array('status', 'length', 'max'=>24),
			array('data_nachala_rabot, comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_objecta, id_spr_etap_rabot, id_otvetstvennogo, id_avtor, data_nachala_rabot, data_okonchaniya_rabot, document_number, srok_dney, comment, status', 'safe', 'on'=>'search'),
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
			'idAvtor' => array(self::BELONGS_TO, 'Users', 'id_avtor'),
			'idObjecta' => array(self::BELONGS_TO, 'ObjectRabot', 'id_objecta'),
			'idOtvetstvennogo' => array(self::BELONGS_TO, 'Users', 'id_otvetstvennogo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_objecta' => 'Id Objecta',
			'id_spr_etap_rabot' => 'Id Spr Etap Rabot',
			'id_otvetstvennogo' => 'Id Otvetstvennogo',
			'id_avtor' => 'Id Avtor',
			'data_nachala_rabot' => 'Data Nachala Rabot',
			'data_okonchaniya_rabot' => 'Data Okonchaniya Rabot',
			'document_number' => 'Document Number',
			'srok_dney' => 'Srok Dney',
			'comment' => 'Comment',
			'status' => 'Status',
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
		$criteria->compare('id_objecta',$this->id_objecta);
		$criteria->compare('id_spr_etap_rabot',$this->id_spr_etap_rabot);
		$criteria->compare('id_otvetstvennogo',$this->id_otvetstvennogo);
		$criteria->compare('id_avtor',$this->id_avtor);
		$criteria->compare('data_nachala_rabot',$this->data_nachala_rabot,true);
		$criteria->compare('data_okonchaniya_rabot',$this->data_okonchaniya_rabot,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('srok_dney',$this->srok_dney,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EtapRaborPoObjectu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

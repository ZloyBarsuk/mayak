<?php

/**
 * This is the model class for table "event_fullcalendar".
 *
 * The followings are the available columns in table 'event_fullcalendar':
 * @property integer $id
 * @property string $title
 * @property string $event
 * @property string $date_start
 * @property integer $responsible
 * @property string $date_end
 * @property integer $author
 * @property integer $status
 * @property string $record_date
 */
class EventFullcalendar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event_fullcalendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_start,title, date_end,event, record_date', 'required'),
			array('responsible, author, status', 'numerical', 'integerOnly'=>true),
			// array('title', 'length', 'max'=>50),
			// array('event', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, event, date_start, responsible, date_end, author, status, record_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(


            'id' => 'ID',
            'title' => 'Заголовок',
            'event' => 'Описание задачи',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'author' => 'Автор задания',
            'status' => 'Статус',
            'record_date' => 'Дата записи',
            'responsible'=> 'Ответственный',

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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('event',$this->event,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('responsible',$this->responsible);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('status',$this->status);
		$criteria->compare('record_date',$this->record_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventFullcalendar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

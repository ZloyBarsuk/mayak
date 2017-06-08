<?php

/**
 * This is the model class for table "contragent_info".
 *
 * The followings are the available columns in table 'contragent_info':
 * @property integer $id
 * @property integer $id_contragent
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
 * @property string $doljnost
 * @property string $zamestitel
 * @property string $email
 * @property string $logo_path
 * @property string $osnovaniye_dogovora
 * @property string $record_date
 * @property string $data_from_csv_dla_pravki
 *
 * The followings are the available model relations:
 * @property Users $idAuthor
 * @property Bank $idBank
 * @property Contragent $idContragent
 * @property ContragentNdsInfo $nds0
 */
class ContragentInfo extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'contragent_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_contragent, id_author, nds', 'numerical', 'integerOnly' => true),
            array('id_contragent,nds', 'required'),
            array('pasport', 'length', 'max' => 500),
            array('inn', 'length', 'max' => 12),
            array('kpp', 'length', 'max' => 9),
            array('okpo', 'length', 'max' => 11),
            array('ogrn', 'length', 'max' => 13),
            array('ogrnip', 'length', 'max' => 15),
            array('phone, fax, site, logo_path', 'length', 'max' => 50),
            array('director, doljnost, zamestitel', 'length', 'max' => 100),
            array('email, osnovaniye_dogovora', 'length', 'max' => 255),
            array('comments, yur_address, fiz_address, record_date, data_from_csv_dla_pravki', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_contragent, id_author, nds, comments, pasport, inn, kpp, okpo, ogrn, ogrnip, phone, fax, site, yur_address, fiz_address, director, doljnost, zamestitel, email, logo_path, osnovaniye_dogovora, record_date, data_from_csv_dla_pravki', 'safe', 'on' => 'search'),
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
            'idContragent' => array(self::BELONGS_TO, 'Contragent', 'id_contragent'),
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
            'id_contragent' => 'Id Contragent',
            'id_author' => 'Автор',
            'nds' => 'НДС',

            'comments' => 'Комментарий',
            'pasport' => 'Паспортные данные',
            'inn' => 'Инн',
            'kpp' => 'КПП',
            'okpo' => 'ОКПО',
            'ogrn' => 'ОГРН',
            'ogrnip' => 'ОГРНИП',
            'phone' => 'телефон',
            'fax' => 'факс',
            'site' => 'сайт',
            'yur_address' => 'Юр. адрес',
            'fiz_address' => 'Почт. адрес',
            'director' => 'ФИО руководителя',
            'doljnost' => 'должность руководителя',
            'zamestitel' => 'ФИО зама ',
            'email' => 'еmail',
            'logo_path' => 'путь к папке с документами',
            'osnovaniye_dogovora' => 'основание договора',
            'record_date' => 'дата создания',
            'data_from_csv_dla_pravki' => 'Данные из старой базы',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_contragent', $this->id_contragent);
        $criteria->compare('id_author', $this->id_author);
        $criteria->compare('nds', $this->nds);

        $criteria->compare('comments', $this->comments, true);
        $criteria->compare('pasport', $this->pasport, true);
        $criteria->compare('inn', $this->inn, true);
        $criteria->compare('kpp', $this->kpp, true);
        $criteria->compare('okpo', $this->okpo, true);
        $criteria->compare('ogrn', $this->ogrn, true);
        $criteria->compare('ogrnip', $this->ogrnip, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('site', $this->site, true);
        $criteria->compare('yur_address', $this->yur_address, true);
        $criteria->compare('fiz_address', $this->fiz_address, true);
        $criteria->compare('director', $this->director, true);
        $criteria->compare('doljnost', $this->doljnost, true);
        $criteria->compare('zamestitel', $this->zamestitel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('logo_path', $this->logo_path, true);
        $criteria->compare('osnovaniye_dogovora', $this->osnovaniye_dogovora, true);
        $criteria->compare('record_date', $this->record_date, true);
        $criteria->compare('data_from_csv_dla_pravki', $this->data_from_csv_dla_pravki, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ContragentInfo the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

<?php

/**
 * This is the model class for table "dop_soglasheniye".
 *
 * The followings are the available columns in table 'dop_soglasheniye':
 * @property integer $id
 * @property integer $id_dogovor
 * @property string $number
 * @property string $comment
 * @property string $name
 * @property integer $author_id
 * @property string $data_podpisaniya
 * @property string $data_vneseniya
 * @property string $summa
 * @property string $nds
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Users $author
 * @property Dogovor $idDogovor
 * @property DopsoglasheniyePunktDogovora[] $dopsoglasheniyePunktDogovoras
 * @property DopsoglasheniyeToVidrabot[] $dopsoglasheniyeToVidrabots
 * @property Schet[] $schets
 * @property VidRaborPoDogovoru[] $vidRaborPoDogovorus
 */
class DopSoglasheniye extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'dop_soglasheniye';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_dogovor,id_template,name,type,status', 'required'),
            array('id_dogovor, author_id', 'numerical', 'integerOnly' => true),
            array('number', 'length', 'max' => 50),
            array('comment', 'length', 'max' => 255),
            //   array('summa, nds', 'length', 'max' => 10),
            array('summa', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            // array('type', 'length', 'max' => 24),
            array('data_podpisaniya,srok_ispolneniya,data,tip_dney,data_vneseniya,avans_procent,summa_avansa,summa_nds', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_dogovor, number, comment,id_template,tip_dney,avans_procent,summa_avansa,summa_nds,srok_ispolneniya, name,number author_id,data, data_podpisaniya, data_vneseniya, summa, nds, type', 'safe', 'on' => 'search'),
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
            'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
            'idDogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
            'dopsoglasheniyePunktDogovoras' => array(self::HAS_MANY, 'DopsoglasheniyePunktDogovora', 'id_dopsoglasheniye'),
            'dopsoglasheniyeToVidrabots' => array(self::HAS_MANY, 'DopsoglasheniyeToVidrabot', 'id_dopsoglasheniye'),
            'schets' => array(self::HAS_MANY, 'Schet', 'id_dopsoglasheniya'),
            'vidRaborPoDogovoru' => array(self::HAS_MANY, 'VidRaborPoDogovoru', 'id_dopsoglasheniya'),
        );

    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {

        return array(

            'id' => 'ID',
            'id_dogovor' => 'Номер договора',
            'number' => 'Номер',
            'comment' => 'Комментарий',
            'name' => 'Основание доп. соглашения',
            'author_id' => 'Автор',
            'data_podpisaniya' => 'Подписан',
            'data_vneseniya' => 'Внесен в базу',
            'summa' => 'Сумма',
            'nds' => 'НДС',
            'type' => 'Тип',
            'data' => 'дата запсии',
            'status' => 'Статус',
            'srok_ispolneniya' => 'срок исполнения',
            'tip_dney' => 'Вид дней',
            'id_template' => 'Шаблон',
            'summa_avansa' => 'Аванс руб.',
            'summa_nds' => 'Сумма с НДС',
            'avans_procent' => 'Аванс %',

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
        $criteria->compare('id_dogovor', $this->id_dogovor);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('data_podpisaniya', $this->data_podpisaniya, true);
        $criteria->compare('data_vneseniya', $this->data_vneseniya, true);
        $criteria->compare('summa', $this->summa, true);
        $criteria->compare('nds', $this->nds, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DopSoglasheniye the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                //   $this->data_scheta = new CDbExpression('NOW()');
                $this->author_id = Yii::app()->user->id;
                $this->data = new CDbExpression('CURDATE()');
                $this->number = $this->NumberGenerator();

            }

            return true;
        } else
            return false;
    }


    private function StavkaNDS()
    {

// выбор данных договора по этому счету
        $dogovor_ispolnitel = Yii::app()->db->createCommand()
            ->select('id_ispolnitel')
            ->from('dogovor')
            ->where('id=:id', array(':id' => (int)$this->id_dogovor))
            ->queryRow();
        $id_ispolnitel = $dogovor_ispolnitel['id_ispolnitel'];

// выбор ставки по договору исполнителя

        $stavka_nds = Yii::app()->db->createCommand()
            ->select('stavka.stavka_nds')
            ->from('ispolnitel_info ispolnitel')
            ->join('spr_nds_info stavka', 'ispolnitel.nds=stavka.id')
            ->where('ispolnitel.id=:id', array(':id' => (int)$id_ispolnitel))
            ->order('ispolnitel.id desc')
            ->limit('1')
            ->queryRow();
        $nds = $stavka_nds['stavka_nds'];
        return (double)$nds;

    }

    // расчет сумм дополнительного соглашения

    public function RaschetSumm()
    {

        /* avans_procent
 summa_avansa
 summa_nds
 summa
 nds*/

        $nds_stavka = $this->StavkaNDS();
        $summa_bez_nds = $this->summa;
        // $summa_s_nds = $this->summa_nds;
        $avans_procent = $this->avans_procent;
        $avans_rub = $this->summa_avansa;


        // расчет суммы c НДС

        if (!empty($nds_stavka)) {
            $summa_s_nds = round($summa_bez_nds * (1 + $nds_stavka / 100), 2);
            $this->summa_nds = $summa_s_nds;
            $nds = $summa_s_nds - $summa_bez_nds;
            $this->nds = $nds;
            if (!empty($avans_rub)) {
                $avans_rub = round($avans_rub * (1 + $nds_stavka / 100), 2);
                $this->summa_avansa = $avans_rub;
                $this->avans_procent = round($avans_rub / $summa_s_nds * 100, 2);
            } else {
                $avans_rub = round($summa_s_nds / 100 * $avans_procent, 2);
                $this->summa_avansa = $avans_rub;
            }
        } else {
            $this->summa_nds = '0.00';
            $this->nds = '0.00';
            if (!empty($avans_rub)) {
                $this->summa_avansa = $avans_rub;
                $this->avans_procent = round($avans_rub / $summa_bez_nds * 100, 2);
            } else {
                $avans_rub = round($summa_bez_nds / 100 * $avans_procent, 2);
                $this->summa_avansa = $avans_rub;
            }

        }


    }

    public function CreateSchet()
    {
        // создание счета
        $schet = new Schet;
        $schet->id_dogovor = $this->id_dogovor;
        $schet->author_id = $this->author_id;
        // $schet->summa = $this->summa_avansa;

        // если есть у фирмы-исполниетля ставка НДС

        if ($this->nds !== '0.00') {

            // если сумма аванса указана, а проценты аванса нет
            if (!empty($this->summa_avansa)) {
                $schet->summa_s_nds = (double)$this->summa_avansa;
                $schet->nds = (double)$this->summa_avansa - (round($this->summa_avansa / (1 + $this->StavkaNDS() / 100), 2));
                $schet->summa_bez_nds = $schet->summa_s_nds - $schet->nds;
            } // если аванс равен 0,а процент есть
            elseif (empty($this->summa_avansa)) {
                /* $schet->summa_s_nds = $this->summa_nds;
                 $schet->nds = (double)round($schet->summa_s_nds - ($schet->summa_s_nds / (1 + $this->StavkaNDS() / 100)), 2);
                 $schet->summa_bez_nds = $schet->summa_s_nds - $schet->nds;*/


                $schet->summa_s_nds = $this->summa_nds;
                $schet->nds = $this->nds;
                $schet->summa_bez_nds = $this->summa;

            }


        } else {
            // если сумма аванса указана, а проценты аванса нет
            if (!empty($this->summa_avansa)) {
                $schet->summa_s_nds = '0.00';
                $schet->nds = '0.00';
                $schet->summa_bez_nds = $this->summa_avansa;
            } elseif (empty($this->summa_avansa)) {
                $schet->summa_s_nds = '0.00';
                $schet->nds = '0.00';
                $schet->summa_bez_nds = $this->summa;


            }


        }



        $schet->data_scheta = date("Y-m-d");
        $schet->schet_tip = 4;
        $schet->status = 'не оплачен';

        $schet->id_dopsoglasheniya = $this->id;

        //  $schet->schet_number=$schet->NumberGenerator();
        $schet->tip_oplati = 'безнал';

        //    $schet->summa_s_nds='1.00';
        //   $schet->summa_bez_nds= '1.00';
        //   $schet->nds = '1.00';
        //  $schet->id_dopsoglasheniya = null;


        // $schet->schet_number='123';
        // $schet->save();
        if (!$schet->save())
            $sdf = $schet->getErrors();
        // $sdfdsf=1;
        //  print_r($schet->getErrors());
    }


    private function NumberGenerator()
    {

        $kol_soglasheniy_za_god = Yii::app()->db->createCommand(array(
            'select' => array('COUNT(id) AS cur_position'),
            'from' => 'dop_soglasheniye',
            'where' => 'id_dogovor=' . (int)$this->id_dogovor,
        ))->queryRow();
        // спешил,написал как есть )
        if ((int)$kol_soglasheniy_za_god['cur_position'] !== null) {
            ++$kol_soglasheniy_za_god['cur_position'];
        }
        $index_number = $kol_soglasheniy_za_god['cur_position'];

        $model_dogovor = Dogovor::model()->findByPk((int)$this->id_dogovor);


        $new_number =/* $model_dogovor->dogovor_number .*/ (string)$index_number;
        return $new_number;

    }

    public function DopSoglasheniyeByDogovor($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_dogovor=' . $id;
        /*$criteria->with = array(
            'vidrabot' => array('alias' => 'vidrabot',
                'select' => array('vidrabot.id_rabot', 'vidrabot.naimenovaniye',)),
            'avtor' => array('alias' => 'avtor',
                'select' => array('avtor.id', 'avtor.username',)),
            'dogovor' => array('alias' => 'dogovor',
                'select' => array('dogovor.id', 'dogovor.dogovor_number',)),
            'dopsoglasheniye' => array('alias' => 'dopsoglasheniye',
                'select' => array('dopsoglasheniye.id', 'dopsoglasheniye.id_dogovor','dopsoglasheniye.number',)),
        );*/

        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,

            'pagination' => array(
                'pageSize' => 5,
            ),));
    }

}

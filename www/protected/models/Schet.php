<?php

/**
 * This is the model class for table "schet".
 *
 * The followings are the available columns in table 'schet':
 * @property integer $id
 * @property integer $id_dogovor
 * @property integer $author_id
 * @property integer $id_dopsoglasheniya
 * @property string $tip_oplati
 * @property string $summa
 * @property string $nds
 * @property string $status
 * @property string $data_scheta
 * @property string $data_oplati
 * @property integer $schet_tip
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Users $author
 * @property Dogovor $idDogovor
 * @property DopSoglasheniye $idDopsoglasheniya
 * @property TipScheta $schetTip
 */
class Schet extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'schet';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('summa_bez_nds, status, tip_oplati,data_scheta', 'required'),
            array('id_dogovor, author_id, schet_tip', 'numerical', 'integerOnly' => true),
            array('id_dogovor', 'compare', 'operator' => '>', 'compareValue' => 0),
            array('tip_oplati', 'length', 'max' => 12),
            array('summa_bez_nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('summa_s_nds', 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/'),
            array('status', 'length', 'max' => 19),
            array('comment', 'length', 'max' => 255),
            array('data_oplati,schet_number,id_dopsoglasheniya,summa_s_nds , nds', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_dogovor, author_id, id_dopsoglasheniya, tip_oplati, summa_bez_nds,summa_s_nds, nds, status, data_scheta, data_oplati, schet_tip, comment', 'safe', 'on' => 'search'),
        );
    }


    /**
     * @return array relational rules.
     */
    public function relations()
    {


        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'dogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
            'dopsoglasheniye' => array(self::BELONGS_TO, 'DopSoglasheniye', 'id_dopsoglasheniya'),
            'tip_scheta' => array(self::BELONGS_TO, 'TipScheta', 'schet_tip'),
        );



    }

    /**
     * @return array customized attribute labels (name=>label)
     */

    public function GetSchetByPeriod($data)
    {


        $scheta = Yii::app()->db->createCommand()
            ->select('CONCAT(MONTHNAME(data_oplati),YEAR(data_oplati)) AS year,SUM(summa_bez_nds) AS schet_summa_bez_nds,SUM(summa_s_nds) AS schet_summa_s_nds,SUM(nds) AS schet_summa_nds')
            ->from('schet')
            //  ->where('created_date>='2010-06-17' AND closed_date<='2016-04-18' AND status='на подписании' AND YEAR(created_date)=2016')
            ->where('status=:stat AND YEAR(data_oplati)=:year', array(':stat' => 'оплачен', ':year' => $data->years_from_base))
            //  ->order('years desc')
            ->group('MONTH(data_oplati)')
            ->queryAll();

        return $scheta;
    }


    public function attributeLabels()
    {

        return array(
            'id' => '№',
            'id_dogovor' => 'договор',
            'author_id' => 'автор',
            'id_dopsoglasheniya' => 'доп.согл.',
            'tip_oplati' => 'оплата',
            'summa_bez_nds' => 'Сумма без НДС',
            'summa_s_nds' => 'Сумма с НДС',
            'nds' => 'ндс',
            'status' => 'статус',
            'data_scheta' => 'создан',
            'data_oplati' => 'оплачен',
            'schet_tip' => 'тип',
            'comment' => 'комментарий',
            'schet_number' => 'номер счета',

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
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('id_dopsoglasheniya', $this->id_dopsoglasheniya);
        $criteria->compare('tip_oplati', $this->tip_oplati, true);
        $criteria->compare('summa_bez_nds', $this->summa_bez_nds, true);
        $criteria->compare('nds', $this->nds, true);
        $criteria->compare('summa_s_nds', $this->summa_s_nds, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('data_scheta', $this->data_scheta, true);
        $criteria->compare('data_oplati', $this->data_oplati, true);
        $criteria->compare('schet_tip', $this->schet_tip);
        $criteria->compare('comment', $this->comment, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function SchetByDogovor($id)
    {


        $criteria = new CDbCriteria;
        $criteria->condition = 't.id_dogovor=' . $id;
        $criteria->select = '*';
        // $criteria->select = 't.id,t.adress,t.plochad_rabot,t.archiv_number';
        //  $criteria->with = array('Rayon' => array('alias' => 'Rayon', 'together' => true, 'select' => array('Rayon.id', 'Rayon.naimenovaniye',)));
        //  $criteria->with = array("Rayon"=>array("select"=>"id,naimenovaniye"));
        $criteria->with = array(

            'author' => array('alias' => 'author',
                'select' => array('author.id', 'author.username',)),
            /* 'dogovor' => array('alias' => 'dogovor',
                 'select' => array('dogovor.id', 'dogovor.dogovor_number',)),*/
            'dopsoglasheniye' => array('alias' => 'dopsoglasheniye',
                'select' => array('dopsoglasheniye.id', 'dopsoglasheniye.id_dogovor', 'dopsoglasheniye.number',)),
            'tip_scheta' => array('alias' => 'tip_scheta',
                'select' => array('tip_scheta.id', 'tip_scheta.naimenovanie',)),
        );

        //  $criteria->together = true;
        return new CActiveDataProvider($this, array('criteria' => $criteria,

            'pagination' => array(
                'pageSize' => 5,
            ),));

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


    public function RaschetSumm()
    {
        $nds_stavka = $this->StavkaNDS();
        $summa_bez_nds = $this->summa_bez_nds;
        // расчет суммы c НДС
        if (!empty($nds_stavka)) {
            $summa_s_nds = round($summa_bez_nds * (1 + $nds_stavka / 100), 2);
            $this->summa_s_nds = $summa_s_nds;
            $nds = $summa_s_nds - $summa_bez_nds;
            $this->nds = $nds;
        } else {
            $this->summa_s_nds = '0.00';
            $this->nds = '0.00';
        }

    }


    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                //   $this->data_scheta = new CDbExpression('NOW()');
                $this->author_id = Yii::app()->user->id;
                $this->schet_number = $this->NumberGenerator();

            }

            return true;
        } else
            return false;
    }


    public function RaschetOstatkaDogovora()
    {

        // вбор договора по счету
        $dogovor_model = Dogovor::model()->findByPk($this->id_dogovor);
        // выбор доп. соглашения по счету
        $dop_soglasheniye_model = Yii::app()->db->createCommand(array(
            'select' => array('SUM(summa) AS summa'),
            'from' => 'dop_soglasheniye',
            'where' => 'id_dogovor =' . (int)$this->id_dogovor,
        ))->queryRow();

        $schet_model = Yii::app()->db->createCommand(array(
            'select' => array('SUM(summa_bez_nds) AS summa_bez_nds'),
            'from' => 'schet',
            'where' => 'id_dogovor =' . (int)$this->id_dogovor,
        ))->queryRow();

        // расчет разницы суммы догвора+ доп.соглашения и сумм выписанных счетов по ним
        $summa_dogovora = $dogovor_model->summa_dogovora_nachalnaya + $dop_soglasheniye_model['summa'];
        $summa_po_vsem_schetam = $schet_model['summa_bez_nds'];
        $ostatok = $summa_dogovora - $summa_po_vsem_schetam;
        if($ostatok)
        {
            $this->summa_bez_nds = (double)$ostatok;

        }
        else{
            $this->summa_bez_nds ='0.00';
        }



    }


    private function NumberGenerator()
    {
        $kol_schetov_po_dogovoru = Yii::app()->db->createCommand(array(
            'select' => array('COUNT(id) AS cur_position'),
            'from' => 'schet',
            'where' => 'id_dogovor=' . (int)$this->id_dogovor,
        ))->queryRow();
        // номер договора - это костыль
        $dog_model = Dogovor::model()->findByPk((int)$this->id_dogovor);
        // спешил,написал как есть )
        if ((int)$kol_schetov_po_dogovoru['cur_position'] !== null) {
            ++$kol_schetov_po_dogovoru['cur_position'];
        }
        $index_number = $dog_model->dogovor_number . "-" . $kol_schetov_po_dogovoru['cur_position'];
        return $index_number;

    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Schet the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

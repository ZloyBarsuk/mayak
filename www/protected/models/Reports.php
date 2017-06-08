<?php

/**
 * This is the model class for table "spr_rayony".
 *
 * The followings are the available columns in table 'spr_rayony':
 * @property integer $id
 * @property string $naimenovaniye
 *
 * The followings are the available model relations:
 * @property AdressRabot[] $adressRabots
 * @property SprGosOrgan[] $sprGosOrgans
 */
class Reports extends CFormModel
{

 //   public $period = array('month' => 'По месяцам');
  //  public $date_from;
  //  public $date_to;
  //  public $years_from_base = array('Выбор года');
    public $dog_number;
  //  public $id_ispolnitel;
  //  public $status = array();


    public function rules()
    {

        $rules[] = array('dog_number', 'safe');
        $rules[] = array('dog_number', 'required');
        return $rules;
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'dog_number' => 'Номер договора',


        );
    }


    public function GetOborotDogovor()
    {
        $model_dogovor = new Dogovor;
        $dogovor_data = $model_dogovor->GetDogovorsByPeriod($this);

        return $dogovor_data;
    }


    public function GetOborotSchet()
    {
        $model_schet = new Schet;
        $schet_data = $model_schet->GetSchetByPeriod($this);
        return $schet_data;
    }

    public function GetOborotZatrati()
    {

        $model_zatrat = new ZatratiPoDogovoru();
        $zatrata_data = $model_zatrat->GetZatratiByPeriod($this);
        return $zatrata_data;

    }


    public function GetDogovorYears()
    {
        $years = Yii::app()->db->createCommand()
            ->select('YEAR(created_date) AS years')
            ->from('dogovor')
            ->where('YEAR(created_date)<=YEAR(CURDATE())')
            ->order('years desc')
            ->group('years')
            ->queryAll();

        return $years;

    }


}

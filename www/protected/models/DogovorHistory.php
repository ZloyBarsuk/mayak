<?php

/**
 * This is the model class for table "dogovor_history".
 *
 * The followings are the available columns in table 'dogovor_history':
 * @property integer $id
 * @property integer $id_dogovor
 * @property string $old_info
 * @property string $new_info
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property Dogovor $idDogovor
 */
class DogovorHistory extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'dogovor_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_dogovor, date_modified', 'required'),
            array('id_dogovor', 'numerical', 'integerOnly' => true),
            array('old_info, new_info', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_dogovor, old_info, new_info, date_modified', 'safe', 'on' => 'search'),
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
            'idDogovor' => array(self::BELONGS_TO, 'Dogovor', 'id_dogovor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_dogovor' => 'Id Dogovor',
            'old_info' => 'Old Info',
            'new_info' => 'Измененная инфа',
            'date_modified' => 'Date Modified',
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
        $criteria->compare('old_info', $this->old_info, true);
        $criteria->compare('new_info', $this->new_info, true);
        $criteria->compare('date_modified', $this->date_modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    public function LoggByDogovor($id)
    {
    $field_names=array(


 /* Наименование полей , чтобы не создавать объекты других моделей , потому как нах надо такое делать )))ЫЫЫЫ*/

        "id" =>"ID",
        "id_ispolnitel"=>"Исполнитель",
        "id_bank_contragenta"=>"Банк заказчика",
        "id_contragent" =>"Заказчик",
        "id_author" =>"Автор договора",
        "opened_by_id" =>"Был открыт",
        "dogovor_number" =>"№",
        "dogovor_number_old" =>"№ архивный",
        "srok_dni"=>"Срок дней ",
        "primechaniye" =>"Комментарий",
        "avans_procent" =>"Аванс %",
        "summa_avansa" =>"Аванс сумма",
        "summa_dogovora_nachalnaya" =>"Сумма ",
        "nds" =>"НДС %",
        "summa_nds" =>"НДС",
        "created_date"=>"Создан",
        "closed_date"=>"Закрыт",
        "srok_ispolneniya"=>"Срок выполнения",
        "podpisan_date" =>"Подписан",
        "updated_date" =>"Изменен",
        "status" =>"Статус",
        "tip_dney" =>"Вид дней",
        "otkat" =>"Разное",
        "block"=>"Заблокирован кем",
        "id_template"=>"Шаблон",
        "id_contact" =>"Контакт",
        "folder_path"=>"Путь к папке",


);
        $dogovors_history = Yii::app()->db->createCommand()
            ->select('*')
            ->from('dogovor_history')
            //  ->where('created_date>='2010-06-17' AND closed_date<='2016-04-18' AND status='на подписании' AND YEAR(created_date)=2016')
            ->where('id_dogovor=:id_', array(':id_' => $id))
            //  ->order('years desc')
            ->order('id ASC')
            ->queryAll();

        $json_difference = array();


       /* for ($i = 0, $j = count($dogovors_history) - 1; $i < count($dogovors_history); $i++, $j--) {
           $changes = array_diff_assoc(get_object_vars(json_decode($dogovors_history[$j]['new_info'])),get_object_vars(json_decode($dogovors_history[$i]['new_info'])));
            if (!empty($changes)) {
                $json_difference[] = $changes;
            }
        }*/
        $rows_quantity=count($dogovors_history);
        // load raw data on creation
        $json_difference[] = get_object_vars(json_decode($dogovors_history[0]['new_info']));
      //  print_r(get_object_vars(json_decode($dogovors_history[0]['new_info'])));
       // exit();
        for ($i = 1, $j = $i-1; $i < $rows_quantity,$j<$rows_quantity-1; $i++, $j++) {
          //  print_r(get_object_vars(json_decode($dogovors_history[$j]['new_info'])));
          //  exit();
           // $changes = array_diff_assoc(get_object_vars(json_decode($dogovors_history[$j]['new_info'])),get_object_vars(json_decode($dogovors_history[$i]['new_info'])));
            $changes = array_diff_assoc(get_object_vars(json_decode($dogovors_history[$i]['new_info'])),get_object_vars(json_decode($dogovors_history[$j]['new_info'])));

        //    echo "i===$i"."<br>";
         //   echo "j===$j"."<br>";
            if (!empty($changes)) {
                $json_difference[] = $changes;
            }
        }

      //  exit();
        for ($i = 0; $i < count($json_difference); $i++) {
            foreach ($json_difference[$i] as $key => $value) {
                // echo $key."=>".$value."<br>";
               // unset($json_difference[$i][$key]) ;
             //   $json_difference[$i]['id_ispolnitel']=Ispolnitel::model()->findByPk($value)->name;
            //    var_dump($json_difference[$i]) ;
            //    exit();
                //  $json_difference[$i][$key]=;
                switch ($key) {
                    // для сторонних моделей
                    case 'id_ispolnitel':
                        $json_difference[$i][$field_names[$key]]=Ispolnitel::model()->findByPk($value)->name;
                        unset($json_difference[$i][$key]) ;
                        break;
                    case 'id_bank_contragenta':
                        $json_difference[$i][$field_names[$key]]=Bank::model()->findByPk($value)->name;
                        unset($json_difference[$i][$key]) ;
                        break;
                    case 'id_contragent':
                        $json_difference[$i][$field_names[$key]]=Contragent::model()->findByPk($value)->name;
                        unset($json_difference[$i][$key]) ;
                        break;
                    case 'id_author':
                        $json_difference[$i][$field_names[$key]]=User::model()->findByPk($value)->username;
                        unset($json_difference[$i][$key]) ;
                        break;
                    case 'id_template':
                        $json_difference[$i][$field_names[$key]]=DocumentTemplates::model()->findByPk($value)->title;
                        unset($json_difference[$i][$key]) ;
                        break;


                    default:$json_difference[$i][$field_names[$key]]=$json_difference[$i][$key];unset($json_difference[$i][$key]) ;break;

                        // для мождели договора

                }

            }
            // echo $json_difference[$i]['id_ispolnitel'];
            // echo $json_difference[$i];
        }
     //  print_r($json_difference);
      //  exit();
        return $json_difference;
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DogovorHistory the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

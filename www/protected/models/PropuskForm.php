<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PropuskForm extends CFormModel
{
    public $users = array();
    public $date_from;
    public $date_to;
    public $out_number;
    public $out_date;



    public function rules()
    {
        return array(
            // username and password are required
            array('users,date_from,date_to,out_number,out_date', 'required'),
            // rememberMe needs to be a boolean
            // array('rememberMe', 'boolean'),
            // password needs to be authenticated
            // array('password', 'authenticate'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'users' => 'Сотрудники',
            'date_from' => 'Дата с: ',
            'date_to' => 'Дата по:',
            'out_number' => 'Исходящий номер',
            'out_date' => 'Исходящая дата',
        );
    }



}

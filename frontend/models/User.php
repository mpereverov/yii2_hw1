<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class User extends Model
{
    public $firstName;
    public $lastName;
    protected $login;
    public $email;
    protected $group;
    protected $password;

    public function attributeLabels()
    {
        return [
            'firstName' => \Yii::t('app', 'Name'),
            'lastName' => \Yii::t('app', 'Surname'),

        ];
    }

    public function rules()
    {
        return [
            [['login', 'email', 'password'], 'required', 'message' => 'Field can not be blank!'],
            ['email', 'email', 'message' => 'Wrong email format.'],
            [['firstName','lastName','login', 'group'], 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Not allowed characters contains.'],

        ];
    }



}

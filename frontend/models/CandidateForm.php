<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class CandidateForm extends Model
{
    public $firstName;
    public $lastName;
    public $gender;
    public $age;
    public $maritalStatus;
    public $speciality;
    public $education;
    public $specialSkill;
    public $experience;
    public $recommendations;
    public $photo;

    public function attributeLabels()
    {
        return [
            'firstName' => 'Name',
            'lastName' => 'Surname',
            'gender' => 'Gender',
            'age' => 'Age',
            'maritalStatus' => 'Marital status',
            'speciality' => 'Speciality',
            'education' => 'Education',
            'specialSkill' => 'Special skills',
            'experience' => 'Experience',
            'recommendations' => 'Recommendations',
            'photo' => 'Your photo',
            'email' => 'E-mail',
        ];
    }

    public function rules()
    {
        return [
            [['firstName',
                'lastName',
                'gender',
                'age',
                'maritalStatus',
                'speciality',
                'education',
                'experience',
                'photo',
                'email',

             ],
                'required', 'message' => 'Field can not be blank!'],
            ['email', 'email', 'message' => 'Wrong email format.'],
            [['firstName','lastName', 'experience'], 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Not allowed characters contains.'],
            [],

        ];
    }

    public function save()
    {

    }

}

<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "candidate".
 *
 * @property integer $id
 * @property string  $firstname
 * @property string  $lastname
 * @property integer $gender
 * @property integer $age
 * @property integer $marital_status
 * @property integer $speciality
 * @property integer $education
 * @property string  $special_skill
 * @property integer $experience
 * @property integer $recommendations
 * @property string  $photo
 * @property string  $$email
 */

class CandidateForm extends ActiveRecord
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
    public $email;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'candidate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname',
                'lastname',
                'gender',
                'age',
                'marital_status',
                'speciality',
                'education',
                'experience',
                'recommendations',
                'photo',
                'email'], 'required', 'message' => 'Field can not be blank!'],
            [['gender',
                'age',
                'marital_status',
                'speciality',
                'education',
                'experience',
                'recommendations'], 'integer'],
            [['firstname',
                'lastname',
                'special_skill',
                'photo',
                'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['email'], 'email', 'message' => 'Wrong email format.'],
            [['firstname','lastname'],
                'match',
                'pattern' => '/^[a-z]\w*$/i',
                'message' => 'Not allowed characters contain!'
            ],
            ['age', 'integer', 'min' => 18, 'max' => 65],
            ['photo', 'file', 'skipOnEmpty' => 'false', 'extensions' => 'jpg',
            //    'maxSize' => 1024*1024
            ],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'firstname' => 'Name',
            'lastname' => 'Surname',
            'gender' => 'Gender',
            'age' => 'Age',
            'marital_status' => 'Marital status',
            'speciality' => 'Speciality',
            'education' => 'Education',
            'special_skill' => 'Special skills',
            'experience' => 'Experience',
            'recommendations' => 'Recommendations',
            'photo' => 'Your photo',
            'email' => 'E-mail',
        ];
    }

//    public function rules()
//    {
//        return [
//            [['firstName',
//                'lastName',
//                'gender',
//                'age',
//                'maritalStatus',
//                'speciality',
//                'education',
//                'experience',
//                'photo',
//                'email', ], 'required', 'message' => 'Field can not be blank!'
//            ],
//            ['email', 'email', 'message' => 'Wrong email format.'],
//            [['firstName','lastName'],
//                'match',
//                'pattern' => '/^[a-z]\w*$/i',
//                'message' => 'Not allowed characters contains.'
//            ],
//            ['age', 'integer', 'min' => 18, 'max' => 75],
//            ['photo', 'file', 'skipOnEmpty' => 'false', 'extensions' => 'jpg', 'maxSize' => 1024*1024],
//
//        ];
//    }

    /**
     * @var UploadedFile
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->photo->saveAs('uploads/' . $this->photo->baseName . '.' . $this->photo->extension);
            return true;
        } else {
            return false;
        }
    }

//    public function save()
//    {
//
//    }

}

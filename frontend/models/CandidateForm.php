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
 * @property string $firstname
 * @property string $lastname
 * @property integer $gender
 * @property integer $age
 * @property integer $marital_status
 * @property integer $speciality
 * @property integer $education
 * @property string $special_skill
 * @property integer $experience
 * @property integer $recommendations
 * @property string $image
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
    public $image;
    public $email;

    /** @var  UploadedFile */
    public $imageFile;

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
                'image',
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
                'image',
                'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['email'], 'email', 'message' => 'Wrong email format.'],
            [['firstname', 'lastname'],
                'match',
                'pattern' => '/^[a-z]\w*$/i',
                'message' => 'Not allowed characters contain!'
            ],
            ['age', 'integer', 'min' => 18, 'max' => 65],
            ['image', 'file', 'skipOnEmpty' => 'false', 'extensions' => 'jpg',
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
            'image' => 'Your photo',
            'email' => 'E-mail',
        ];
    }

    public function load($data, $formName = null)
    {
        if (!parent::load($data, $formName)) {
            return false;
        }
//Где определено $this->imageFile?
        $this->imageFile = UploadedFile::getInstance($this, 'image');
    }

    public function beforeSave($insert)
    {
        if($this->imageFile){
            $this->image = $this->imageFile->name . '.' . $this->imageFile->extension;
        }

        return parent::beforeSave($insert);

    }
    public function getImageUrl(){
        return '/uploads/'.$this->image;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->saveImage();
    }

    public function saveImage()
    {
        $this->imageFile->saveAs( __DIR__.'/../web/uploads/'.$this->image);
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
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
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

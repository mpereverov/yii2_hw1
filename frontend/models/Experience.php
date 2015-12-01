<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property string $experience
 */
class Experience extends ActiveRecord
{
    public $experience;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['experience'], 'required'],
            [['experience'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'experience' => 'Experience',
        ];
    }
}

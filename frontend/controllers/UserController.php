<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
//use frontend\models\User;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionViewuserattr()
    {
        return $this->render('viewUserAttr');
    }

    /**}
     *
     */
//    public function actionViewUserAttributes()
//    {
//        $model = new User();

////        foreach ($model as $name => $value) {
////            echo "$name: $value\n";
//        }

//        return $this->render('viewUserAttributes', [
//            'model' => $model
//        ]);
//    }
}

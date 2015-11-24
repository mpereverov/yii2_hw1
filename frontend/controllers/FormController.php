<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CandidateForm;

/**
 * Class UserController
 * @package app\controllers
 */
class FormController extends Controller
{
    public function actionCreate()
    {
        $model = new CandidateForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('candidate', [
                'model' => $model,
            ]);
        }
    }
}



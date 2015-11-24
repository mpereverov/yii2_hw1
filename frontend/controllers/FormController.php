<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CandidateForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Class UserController
 * @package app\controllers
 */
class FormController extends Controller
{
    public function actionCreate()
    {
        $model = new CandidateForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())
//            && $model->save()
        ) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);

//            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('candidate', [
                'model' => $model,
            ]);
        }
    }
}



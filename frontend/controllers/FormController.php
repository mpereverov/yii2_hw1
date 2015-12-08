<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CandidateForm;
use yii\web\Response;
use yii\web\UploadedFile;
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

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->isPost) {
            $model->scenario = 'save';
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->redirect('/');
            }
        }

        return $this->render('candidate', ['model' => $model]);
    }



//    /**
//     * @return string
//     */
//    public function actionUpload()
//    {
//        $model = new CandidateForm();
//
//        if (Yii::$app->request->isPost) {
//            $model->photo = UploadedFile::getInstance($model, 'photo');
//
//            if ($model->photo && $model->validate()) {
//                $model->photo->saveAs('uploads/' . $model->photo->baseName . '.' . $model->photo->extension);
//            }
//        }
//
//        return $this->render('upload', ['model' => $model]);
//    }
}


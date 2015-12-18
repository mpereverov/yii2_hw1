<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CandidateForm;
//use yii\web\Response;
use yii\web\UploadedFile;
//use yii\widgets\ActiveForm;


/**
 * Class UserController
 * @package app\controllers
 */
class FormController extends Controller
{
//    public function actionCreate()
//    {
//        $model = new CandidateForm();
//
//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//
//            return ActiveForm::validate($model);
//        }
//
//        if (Yii::$app->request->isPost) {
//            $model->scenario = 'save';
//            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                $this->redirect('/');
//            }
//        }
//
//        return $this->render('candidate', ['model' => $model]);
//    }



    /**
     * @return string
     */
    public function actionUpload()
    {
        $model = new CandidateForm();

        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if ($model->image && $model->validate()) {
                $model->image->saveAs('uploads/' . $model->image->baseName . '.' . $model->image->extension);
            }
        }

        return $this->render('candidate', ['model' => $model]);
    }
}


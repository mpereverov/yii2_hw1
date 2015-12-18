<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\TestForm;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;


/**
 * Class UserController
 * @package app\controllers
 */
class TestController extends Controller
{
    public function actionCreate()
    {
        $model = new TestForm();

        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
//            echo var_dump($model->getErrors());

            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->isPost) {
//            $model->scenario = 'save';
            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Спасибо, что уделили время. В ближайшее время будут опубликованы результаты.'
                );
            }
        }

        return $this->render('test', ['model' => $model]);
    }



//    /**
//     * @return string
//     */
//    public function actionUpload()
//    {
//        $model = new CandidateForm();
//
//        if (Yii::$app->request->isPost) {
//            $model->image = UploadedFile::getInstance($model, 'image');
//
//            if ($model->image && $model->validate()) {
//                $model->image->saveAs('uploads/' . $model->image->baseName . '.' . $model->image->extension);
//            }
//        }
//
//        return $this->render('upload', ['model' => $model]);
//    }
}


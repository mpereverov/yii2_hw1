<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'candidate-form',
    'enableAjaxValidation' => 'true',
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
]) ?>
<div class="col-lg-3">
    <?= $form->field($model, 'firstname')->textInput()->hint('Your forename') ?>
    <?= $form->field($model, 'lastname')->textInput()->hint('Your surname') ?>
    <?= $form->field($model, 'gender')->radioList(['0'=>'Male', '1'=>'Female']) ?>
<!--    <?//= $form->field($model, 'age')->textInput()->hint('Full age') ?>-->
<!--    <?//= $form->field($model, 'marital_status')->radioList(['0'=>'Married', '1'=>'Unmarried', '2'=>'Divorced']) ?>-->
<!--    <?//= $form->field($model, 'speciality')->dropDownList(['0'=>'Electrician',
//                                                            '1'=>'Driver',
//                                                            '2'=>'Programmer',
//                                                            '3'=>'Accountant',
//                                                            '4'=>'Economist'],
//                                                            ['prompt'=>'Choose one...']) ?>-->
<!--    <?//= $form->field($model, 'education')->radioList(['0'=>'High school',
//                                                            '1'=>'Two-year college',
//                                                            '2'=>'Bachelor\'s degree',
//                                                            '3'=>'Master\'s degree',
//                                                            '4'=>'Doctor of Philosophy',]) ?>-->
<!--    <?//= $form->field($model, 'special_skill')->textarea()->hint('Your special skills, coma separated'); ?>-->
<!--    <?//= $form->field($model, 'experience')->dropDownList(['0'=>'<=1 year',
//                                                            '1'=>'<=3 years',
//                                                            '2'=>'<=5 years',
//                                                            '3'=>'>5 ears'],
//                                                            ['prompt'=>'Your experience in years']) ?>-->
<!--    <?//= $form->field($model, 'recommendations')->checkbox(['1'=>'I have']) ?>-->
<!--    <?//= $form->field($model, 'image')->fileInput()->hint('Photo .jpg only') ?>-->
<!--    <?//= $form->field($model, 'email')->textInput()->hint('E-mail') ?>-->

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end();
echo '$model->gender = ', $model->gender,"</br></br>";
echo '$model->getErrors = ',var_dump($model->getErrors()),"</br></br>";

    var_dump($_POST);
var_dump(\frontend\models\TestForm::rules());

?>



<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'candidate-form',
    'enableAjaxValidation' => 'true',
    'options' => ['class' => 'form-horizontal'],
]) ?>

    <?php $form->field($model, 'firstName')->textInput()->hint('Your forename')->$this->lable('Name') ?>
    <?php $form->field($model, 'lastName')->textInput()->hint('Your surname')->$this->lable('Surname') ?>
    <?php $form->field($model, 'gender')->radioList(['1'=>'Male', '2'=>'Female']) ?>
    <?php $form->field($model, 'age')->textInput()->hint('Full age')->$this->lable('Surname') ?>
    <?php $form->field($model, 'maritalStatus')->radioList(['1'=>'Married', '2'=>'Unmarried', '3'=>'Divorced']) ?>
    <?php $form->field($model, 'speciality')->dropDownList($listSpeciality[], ['prompt'=>'Choose one...']) ?>
    <?php $form->field($model, 'education')->checkboxList($listEducation[]) ?>
    <?php $form->field($model, 'specialSkill')->textarea() ?>
    <?php $form->field($model, 'specialSkill')->textarea()->label('Your special skills, coma separated'); ?>
    <?php $form->field($model, 'specialSkill')->textarea(array('rows'=>3,'cols'=>5)) ?>
    <?php $form->field($model, 'experience')->dropDownList($listExperience[], ['prompt'=>'Years']) ?>
    <?php $form->field($model, 'recommendations')->radioList(['1'=>'I have', '2'=>'I do not have']) ?>
    <?php $form->field($model, 'photo')->fileInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
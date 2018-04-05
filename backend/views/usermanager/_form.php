<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'password_hash')->passwordInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_status')->dropdownlist(['teacher' => 'อาจารย์','studen'=>'นักศึกษา','deputy'=>'รองผู้บริหารฝ่ายพัฒนานักศึกษา','boss'=>'ประธานหลักสูตร']) ?>

    <div class="form-group">
       <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

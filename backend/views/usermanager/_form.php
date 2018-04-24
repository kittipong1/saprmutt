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

    
    <?php 

    $str = explode('/', $_SERVER['REQUEST_URI']);
    if($str[5] == 'create'){
    	echo $form->field($model, 'password_hash')->passwordInput() ;
    }else{
    	echo $form->field($model, 'new_password')->passwordInput() ;		
    }
    ?>
    

    <?= $form->field($model, 'auth_status')->dropdownlist(['teacher' => 'อาจารย์','deputy'=>'รองคณะบดีฝ่ายพัฒนานักศึกษา','boss'=>'ประธานหลักสูตร']) ?>
    <?= $form->field($model, 'banned')->dropdownlist(['0'=>'ไม่ได้แบนผู้ใช้งาน','1' => 'แบนผู้ใช้งาน',]) ?>
    <div class="form-group">
       <?= Html::submitButton('สร้าง', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

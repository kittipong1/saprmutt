<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Faculty;
/* @var $this yii\web\View */
/* @var $model app\models\album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'album_name')->textInput() ?>

      <?= $form->field($model, 'album_agencies')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Fac_name','Fac_name'),['prompt' => 'เลือกหน่วยงานที่รับผิดชอบ']) ?>
    <?= $form->field($model, 'album_content')->textarea() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

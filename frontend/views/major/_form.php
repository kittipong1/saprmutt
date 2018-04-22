<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
/* @var $this yii\web\View */
/* @var $model app\models\major */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="major-form" style="min-height: 1000px">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'major_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Faculty_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Faculty_id','Fac_name')) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

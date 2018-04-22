<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\studen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="studen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Stu_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_id_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idtitle_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_lastname_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_lastname_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_birht_day')->textInput() ?>

    <?= $form->field($model, 'Stu_Add')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Stu_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fac_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'Stu_avatar')->textInput() ?>

    <?= $form->field($model, 'major_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

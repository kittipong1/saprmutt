<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\joinactivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joinactivity-form">

    <?php $form = ActiveForm::begin(); ?>

 

    <?= $form->field($model, 'id_actitaty')->textInput() ?>
    <?= $form->field($model, 'studennumber')->textInput() ?>
    <?= $form->field($model, 'csv_path')->fileinput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

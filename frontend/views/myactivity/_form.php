<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fac_id')->textInput() ?>

    <?= $form->field($model, 'typefac_id')->textInput() ?>

    <?= $form->field($model, 'act_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_sday')->textInput() ?>

    <?= $form->field($model, 'act_eday')->textInput() ?>

    <?= $form->field($model, 'act_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_username')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

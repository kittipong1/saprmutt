<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'album_name')->textInput() ?>

    <?= $form->field($model, 'album_agencies')->textInput() ?>
    <?= $form->field($model, 'album_imagepath')->fileInput() ?>
    <?= $form->field($model, 'album_content')->textarea() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

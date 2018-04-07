<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Titlename */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titlename-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titlename_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titlename_th')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

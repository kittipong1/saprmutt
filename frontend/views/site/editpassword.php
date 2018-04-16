<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="information-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

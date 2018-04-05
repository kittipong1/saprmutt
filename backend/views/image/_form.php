<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\album;
/* @var $this yii\web\View */
/* @var $model app\models\image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_path')->fileinput() ?>

    <?= $form->field($model, 'ref_id')->dropDownList(ArrayHelper::map(album::find()->orderBy(['album_name'=>SORT_ASC])->all(),'album_id','album_name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

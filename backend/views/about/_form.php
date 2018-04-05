<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model backend\models\About */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(" 
    $(function () {
    CKEDITOR.replace('about-about_description')
    })

    ", View::POS_END, 'my-options');
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'about_description')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

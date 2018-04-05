<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\bannersearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ban_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'ban_name') ?>

    <?= $form->field($model, 'ban_link') ?>

    <?= $form->field($model, 'ban_image') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'ban_detail') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\albumsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'album_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'album_name') ?>

    <?= $form->field($model, 'create_date') ?>

    <?= $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'album_view') ?>

    <?php // echo $form->field($model, 'album_agencies') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

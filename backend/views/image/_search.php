<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\imagesearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'image_id') ?>

    <?= $form->field($model, 'image_name') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'path') ?>

    <?= $form->field($model, 'ref_id') ?>

    <?php // echo $form->field($model, 'sorting') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

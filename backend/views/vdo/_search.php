<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\vdosearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vdo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vdo_id') ?>

    <?= $form->field($model, 'ref_id') ?>

    <?= $form->field($model, 'path') ?>

    <?= $form->field($model, 'vdo_name') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'vdo_description') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'vdo_view') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

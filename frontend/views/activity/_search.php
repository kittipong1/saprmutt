<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'actitaty_id') ?>

    <?= $form->field($model, 'act_id') ?>

    <?= $form->field($model, 'act_name') ?>

    <?= $form->field($model, 'fac_id') ?>

    <?= $form->field($model, 'typefac_id') ?>

    <?php // echo $form->field($model, 'act_term') ?>

    <?php // echo $form->field($model, 'act_sday') ?>

    <?php // echo $form->field($model, 'act_eday') ?>

    <?php // echo $form->field($model, 'act_comment') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

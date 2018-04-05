<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\news_typesearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newstype-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'news_type_id') ?>

    <?= $form->field($model, 'news_type_name') ?>

    <?= $form->field($model, 'create_date') ?>

    <?= $form->field($model, 'create_by') ?>

    <?= $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

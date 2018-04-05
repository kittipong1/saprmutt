<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'news_id') ?>

    <?= $form->field($model, 'news_type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'news_type_lang') ?>

    <?= $form->field($model, 'news_name') ?>

    <?php // echo $form->field($model, 'news_explain') ?>

    <?php // echo $form->field($model, 'news_image') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'news_view') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'news_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

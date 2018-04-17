<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CheckstudentbymajorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="studen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_information') ?>

    <?= $form->field($model, 'Stu_id') ?>

    <?= $form->field($model, 'Stu_id_card') ?>

    <?= $form->field($model, 'idtitle_id') ?>

    <?= $form->field($model, 'Stu_name_en') ?>

    <?php // echo $form->field($model, 'Stu_lastname_en') ?>

    <?php // echo $form->field($model, 'Stu_name_th') ?>

    <?php // echo $form->field($model, 'Stu_lastname_th') ?>

    <?php // echo $form->field($model, 'Stu_birht_day') ?>

    <?php // echo $form->field($model, 'Stu_Add') ?>

    <?php // echo $form->field($model, 'Stu_mail') ?>

    <?php // echo $form->field($model, 'Stu_phone') ?>

    <?php // echo $form->field($model, 'Fac_id') ?>

    <?php // echo $form->field($model, 'teacher_id') ?>

    <?php // echo $form->field($model, 'Stu_avatar') ?>

    <?php // echo $form->field($model, 'major_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

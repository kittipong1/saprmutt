<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\NewsType;
use yii\web\View;
use app\models\Faculty;
$this->registerJs(" 
    $(function () {
    CKEDITOR.replace('news-news_description')
    })
    ", View::POS_END, 'my-options');
?>

<div class="news-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'news_type_id')->dropDownList(ArrayHelper::map(NewsType::find()->orderBy(['news_type_name'=>SORT_ASC])->all(),'news_type_id','news_type_name')) ?>

    <?= $form->field($model, 'news_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_explain')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Faculty_id','Fac_name')) ?>
    <?= $form->field($model, 'news_imagepath')->fileinput() ?>
    <?= $form->field($model, 'news_description')->textarea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

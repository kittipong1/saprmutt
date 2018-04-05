<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\storevdo;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\vdo */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(" 
    $(function () {
    CKEDITOR.replace('vdo-vdo_description')
    })

    ", View::POS_END, 'my-options');
?>
<?= Html::csrfMetaTags() ?>
<div class="vdo-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'ref_id')->dropDownList(ArrayHelper::map(storevdo::find()->orderBy(['store_name'=>SORT_ASC])->all(),'store_id','store_name')) ?>

    <?= $form->field($model, 'vdo_path')->fileinput() ?>

    <?= $form->field($model, 'vdo_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vdo_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

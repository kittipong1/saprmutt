<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Titlename;
use yii\web\View;
use app\models\Faculty;
use app\models\Major;
$this->registerJs(" 
 
    $(function () {
    CKEDITOR.replace('studen-stu_add')
    })
    
    $('#studen-stu_birht_day').datepicker({
      autoclose: true
    });
     $(function () {
    CKEDITOR.replace('news-news_description')
    })
    $('#studen-end_date').datepicker({
      autoclose: true
    });

  

    ", View::POS_END, 'my-options');
?>


<div class="studen-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Stu_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_id_card')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'idtitle_id')->dropDownList(ArrayHelper::map(Titlename::find()->all(),'id_titlename','titlename_th')) ?>
    <?= $form->field($model, 'Stu_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_lastname_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_lastname_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'Stu_birht_day',[
            'template' => '{label}<div style="display:table;">{input}<span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span></div>'
        ])->textInput();
                    ?>
    <?= $form->field($model, 'Stu_Add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_phone')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'Fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Faculty_id','Fac_name')) ?>
      <?= $form->field($model, 'major_id')->dropDownList(ArrayHelper::map(Major::find()->orderBy(['major_id'=>SORT_ASC])->all(),'major_id','major_name')) ?>
    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'Stu_avatar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

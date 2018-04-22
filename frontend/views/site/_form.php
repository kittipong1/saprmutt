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
    CKEDITOR.replace('information-add')
    })
        
    $('#information-birht_day').datepicker({
      autoclose: true
    });
   

  

    ", View::POS_END, 'my-options');
?>


<div class="information-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtitle_id')->dropDownList(ArrayHelper::map(Titlename::find()->all(),'id_titlename','titlename_th'),['prompt' => 'เลือกคำนำหน้าชื่อ']) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'birht_day',[
            'template' => '{label}<div style="display:table;">{input}<span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span></div>'
        ])->textInput();
                    ?>
    <?= $form->field($model, 'Add')->textarea() ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'Fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Faculty_id','Fac_name'),['prompt' => 'เลือกคณะ']) ?>
      <?= $form->field($model, 'major_id')->dropDownList(ArrayHelper::map(Major::find()->orderBy(['major_id'=>SORT_ASC])->all(),'major_id','major_name'),['prompt' => 'เลือกสาขา']) ?>

    <?= $form->field($model, 'avatar_path')->fileinput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

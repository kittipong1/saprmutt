<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Titlename;
use yii\web\View;
use app\models\Faculty;
use app\models\Major;
use app\models\Information;

$js = '$(document).ready(function() {
$("#studen-fac_id").change(function() {';

$fac = Faculty::find()->all();
$js .= 'var val = $(this).val();';
foreach ($fac as $key => $value) {
  $js .= 'if (val == "'.$value['Faculty_id'].'") {';
  $major = Major::find()->where(['Faculty_id'=>$value['Faculty_id']])->all();
   $js .= '$("#studen-major_id").html("';
  foreach ($major as $key2 => $value2) {
     $js .= '<option value=';
     $js .="'".$value2['major_id'];
     $js .= "'".'>'.$value2['major_name'].'</option>';
  }
  $js .='");}';
 
}        
$js .= '});});';
$this->registerJs($js, View::POS_END, 'my-options');
?>


<div class="studen-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Stu_id')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'Stu_id_card')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'idtitle_id')->dropDownList(ArrayHelper::map(Titlename::find()->all(),'id_titlename','titlename_th'),['prompt' => 'เลือกคำนำหน้าชื่อ']) ?>
    <!-- <?= $form->field($model, 'Stu_name_en')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'Stu_lastname_en')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'Stu_name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stu_lastname_th')->textInput(['maxlength' => true]) ?>

   <!--  <?= $form->field($model,'Stu_birht_day',[
            'template' => '{label}<div style="display:table;">{input}<span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span></div>'
        ])->textInput();
                    ?> -->
    <!-- <?= $form->field($model, 'Stu_Add')->textarea() ?> -->

    <!-- <?= $form->field($model, 'Stu_mail')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'Stu_phone')->textInput(['maxlength' => true]) ?> -->

      <?= $form->field($model, 'Fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Faculty_id','Fac_name'),['prompt' => 'เลือกคณะ']) ?>

      <div class="form-group field-studen-major_id has-success">
<label class="control-label" for="studen-major_id">สาขา</label>
<select id="studen-major_id" class="form-control" name="Studen[major_id]" aria-invalid="false">
<option value="">เลือกสาขา</option>
</select>

<div class="help-block"></div>
</div>
      <!-- <?= $form->field($model, 'major_id')->dropDownList(ArrayHelper::map(Major::find()->orderBy(['major_id'=>SORT_ASC])->all(),'major_id','major_name'),['prompt' => 'เลือกสาขา']) ?> -->
      <?= $form->field($model, 'teacher_id')->dropDownList(ArrayHelper::map(Information::find()->where(['not in','user_id',[1]])->orderBy(['information_id'=>SORT_ASC])->all(),'information_id',function ($model) {
        return  $model['name_th'].' '.$model['lastname_th'];
    }),['prompt' => 'เลือกอาจารย์ที่ปรึกษา']) ?>

    <!-- <?= $form->field($model, 'Stu_avatar')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

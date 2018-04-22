<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Titlename;
use yii\web\View;
use app\models\Faculty;
use app\models\Major;

$js = '$(document).ready(function() {
$("#information-fac_id").change(function() {';
$fac = Faculty::find()->all();
$js .= 'var val = $(this).val();';
foreach ($fac as $key => $value) {
  $js .= 'if (val == "'.$value['Faculty_id'].'") {';
  $major = Major::find()->where(['Faculty_id'=>$value['Faculty_id']])->all();
   $js .= '$("#information-major_id").html("';
  foreach ($major as $key2 => $value2) {
     $js .= '<option value=';
     $js .="'".$value2['major_id'];
     $js .= "'".'>'.$value2['major_name'].'</option>';
  }
  $js .='");}';
}
$js .= '});});';

$this->registerJs(" 
 
    $(function () {
    CKEDITOR.replace('information-add')
    })
        
    $('#information-birht_day').datepicker({
      autoclose: true
    });
   

  

    ".$js, View::POS_END, 'my-options');
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

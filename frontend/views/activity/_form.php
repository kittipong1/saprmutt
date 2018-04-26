<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\view;
use yii\helpers\ArrayHelper;
use app\models\FacType;
use app\models\Faculty;
$this->registerJs(" 
    $(function () {
    CKEDITOR.replace('activity-act_comment')
    })

   $('.input-daterange').datepicker({
    todayBtn: 'linked',
    language: 'th',
    autoclose: true
});


   

    ", View::POS_END, 'my-options');
?>

<div class="activity-form" style="min-height: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'act_id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'act_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typefac_id')->dropDownList(ArrayHelper::map(FacType::find()->orderBy(['type_name'=>SORT_ASC])->all(),'id_type','type_name')) ?>
    <?= $form->field($model, 'fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Fac_key','Fac_name')) ?>

    <?php 
    for ($i = 0; $i < 20 ; $i++) {
      $ba = $i+date("Y")+533;
      $a[$ba] = $ba ;
    }
    echo $form->field($model, 'act_term')->dropDownList($a); ?>
    <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
        <div class='col-md-6'>
            <div class="form-group">
                <div class='input-group date' id='banner-start_date'>
                      <?= $form->field($model,'act_sday',[
            'template' => '{label}<div style="display:table;">{input}<span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span></div>'
        ])->textInput(['style'=>'width:400px']);
                    ?>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <div class='input-group date' id='banner-end_date'>
                  
                      <?= $form->field($model,'act_eday',[
            'template' => '{label}<div style="display:table;">{input}<span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span></div>'
        ])->textInput(['style'=>'width:400px']);
                    ?>
               
                
                </div>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'act_comment')->textarea(['rows' => 6]) ?>
    <?php if(Yii::$app->user->identity->auth_status == 'deputy') { ?>
       <?= $form->field($model, 'status')->dropDownList(['active'=>'active','disable'=>'disable']) ?>
    <?php } ?>
   

    <!-- <?= $form->field($model, 'id_username')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

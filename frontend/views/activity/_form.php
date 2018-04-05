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
    
    $('#banner-start_date').datepicker({
      autoclose: true
    });
     $(function () {
    CKEDITOR.replace('news-news_description')
    })
    $('#banner-end_date').datepicker({
      autoclose: true
    });

    var input1 = 'input[name =\"Banner[ban_link]\"]';
      setHideInput(3,$(input1).val(),'#banner-ban_link');
      $(input1).click(function(val){
        setHideInput(3,$(this).val(),'#banner-ban_link');
      });

    var input2 = 'input[name=\"Banner[ban_name]\"]';
      setHideInput(1,$(input2).val(),'#cke_banner-ban_detail');
      $(input2).click(function(val){
        setHideInput(1,$(this).val(),'#cke_banner-ban_detail');
      });

    function setHideInput(set,value,objTarget)
  {
    console.log(set+'='+value);
      if(set==value)
      {
        $(objTarget).show(500);
      }
      else
      {
        $(objTarget).hide(500);
      }
  }

    ", View::POS_END, 'my-options');
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'act_id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'act_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typefac_id')->dropDownList(ArrayHelper::map(FacType::find()->orderBy(['type_name'=>SORT_ASC])->all(),'id_type','type_name')) ?>
    <?= $form->field($model, 'fac_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_ASC])->all(),'Fac_key','Fac_name')) ?>

    <?php 
    for ($i = 0; $i < 10 ; $i++) {
      $ba = $i+2555;
      $a[$ba] = $ba ;
    }
    echo $form->field($model, 'act_term')->dropDownList($a); ?>

        <div class='col-md-6'>
            <div class="form-group">
                <div class='input-group date' id='banner-start_date'>
                    <?= $form->field($model,'act_sday')->textInput();
                    ?>
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <div class='input-group date' id='banner-end_date'>
                      <?= $form->field($model,'act_eday')->textInput();
                    ?>
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                  </span>
                </div>
            </div>
        </div>

    <?= $form->field($model, 'act_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['active'=>'active','disable'=>'disable']) ?>

    <!-- <?= $form->field($model, 'id_username')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

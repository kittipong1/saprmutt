<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\view;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(" 
    $(function () {
    CKEDITOR.replace('banner-ban_detail')
    })
    
    $('#banner-start_date').datepicker({
      autoclose: true
    });

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

<div class="banner-form">

    <script language="javascript">
        function show_table(id) {
            if(id == 1) { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2
            document.getElementById("banner-ban_link").style.display = "";
            document.getElementById("cke_banner-ban_detail").style.display = "none";
            } else if(id == 2) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1
            document.getElementById("banner-ban_link").style.display = "none";
            document.getElementById("cke_banner-ban_detail").style.display = "";
            }
        }
    </script>

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>

    <?= $form->field($model, 'banner')->fileInput() ?>

    <?= $form->field($model, 'ban_name')->textInput(['maxlength' => true]) ?>

   <input name="show" type="radio" value="1" onclick="show_table(this.value);"> 
   <?= $form->field($model, 'ban_link')->textarea() ?>

   <input name="show" type="radio" value="2" onclick="show_table(this.value);">
   <?= $form->field($model, 'ban_detail')->textarea() ?>

    <h3 style="margin-left: 10px;">วันที่เริ่มใช้ - สิ้นสุดการใช้งาน</h3>
    <div class="container-fuild">
        <div class='col-md-6'>
            <div class="form-group">
                <div class='input-group date' id='banner-start_date'>
                    <?= $form->field($model,'start_date')->textInput();
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
                      <?= $form->field($model,'end_date')->textInput();
                    ?>
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                  </span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-left: 12px;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<!doctype html>
<html lang="en">



<body>

  <!-- Container -->
  <div id="container" class="bg-white">

    <!-- Start Header Section -->

    <!-- End Header Section -->


    <!-- Start Page Banner -->
    <div class="page-banner no-subtitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Login</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">

              <li><?= Html::a('หน้าหลัก','index'); ?></li>
              <li>Login</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Content -->
    <div id="content" style="padding-bottom:353px;">
      <div class="container">
        <div class="row sidebar-page">


          <!-- Page Content -->
          <div class="col-md-9 page-content">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>กองพัฒนานักศึกษา</span></h4>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
         <!--  <form class="form-horizontal" action="/action_page.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">username:</label>
    <div class="col-sm-10">
      <input type="username" class="form-control" id="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="password" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
    </div>
  </div>
</form> -->


          </div>

         
      </div>
    </div>
    <!-- End Content -->


    <!-- Start Footer Section -->

    <!-- End Footer Section -->

  </div>
  <!-- End Container -->


</body>

</html>
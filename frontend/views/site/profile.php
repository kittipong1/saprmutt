<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@demo01', '@web');
use app\models\profile
?>

<body>
<div id="container" style="min-height: 1000px">
   <div class="page-banner no-subtitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>profile</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>profile</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 page-content">
    <div class="row">
     <div class="col-md-4">
 
     		<a href="#" class="thumbnail" style="text-align: center;">
     			<img data-src="#" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu8BWTAQiujkB8jhc9Maq4QVrxSM39HNcpLAoyuTgma1SjH-SdkQ" style="border-radius: 20%;">
     		<?=Yii::$app->user->identity->username ?>
     		</a>
     		<div>
     		<a href="#" >แก้ไขรูป Avatar</a>
   			<br><br>
     		<a href="#" >แก้ไข Password</a>
     		</div>
     		
     	</div>

     <div class="col-md-8">
     	<h1>ข้อมูลส่วนตัว</h1>
     	ชื่อ 
  		<?php 
  		$userid = Yii::$app->user->identity->id ;
  		if()

  		 ?>
     	<?=Yii::$app->user->identity->username?>
     </div>
    </div>

    </div>
     <!--Sidebar-->
          <div class="col-md-3 sidebar right-sidebar">

            <!-- Popular Posts widget -->
            <div class="tabs-section widget">

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                <li class="active" style="width: 264px;"><a href="#" data-toggle="tab"><i class="fa fa-star"></i>เมนูแนะนำ</a></li>
                <!-- <span class="pull-right" style="padding: 8px 0px;"><a href="#" class="btn btn-warning btn-sm" title="ดูทั้งหมด"><i class="fa fa-plus"></i></a></span> -->
              </ul>

              <!-- Tab panels -->
              <div class="tab-content widget-popular-posts">
                <!-- Tab Content 1 -->
                <div class="tab-pane fade in active">
                  <ul>
                  	<?php

                  	if(Yii::$app->user->isGuest){
                        echo'<li>'.Html::a('เข้าสู่ระบบ',Url::to(['site/login'])).'</li>';
                    }else{ 
                     echo'<li>'.Html::a('ชื่อผู้ใช้ : '.Yii::$app->user->identity->username,'#').'</li>';
                        echo'<li>'.Html::a('แก้ไขข้อมูลส่วนตัว','site/profileedit').'
                            <li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมในที่ปรึกษา',Url::to(['site/profile'])).'</li>';
                        echo'<li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมที่ตนเองสร้าง',Url::to(['site/profile'])).'</li>';
                            if(Yii::$app->user->identity->auth_status == 'admin'){
                                echo '<li>'.Html::a('เพิ่มรายชื่อนักศึกษา',Url::to(['studen/index'])).'</li>';
                            }
                    }
                     ?>
                  </ul>
                </div>
              </div>
              <!-- End Tab Panels -->
            </div>

          
          </div>
          <!--End sidebar-->
</div>


<br><br><br>




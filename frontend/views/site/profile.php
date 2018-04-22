<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\faculty;
use app\models\major;
Yii::setAlias('@demo01', '@web');

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
          <?php 

          if(is_null($profile['avatar'])){ ?>
     			<img data-src="#" src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/512/user-male-icon.png" style="border-radius: 20%;">
          <?php }else{ ?>
          <img data-src="#" src="<?=Yii::getAlias('@demo01').'/uploads/information/'.$profile->avatar?>" style="border-radius: 20%;">
          <?php } ?>
     		<?=Yii::$app->user->identity->username ?>
     		</a>
     		<div>
     		<a href="<?=Url::to(['site/profileedit']) ?>" >แก้ไขรูป Avatar</a>
   			<br><br>
     		<a href="<?=Url::to(['site/editpassword'])?>" >แก้ไข Password</a>
     		</div>
     		
     	</div>

     <div class="col-md-8">
     	<h1 style="margin-top:10px">ข้อมูลส่วนตัว</h1>

  		<?php 
  		
      
      if(is_null($profile)){
        echo '<br><h3 style="color:red;">* กรุณากรอกข้อมูลส่วนตัว *  '.Html::a('>> Click <<',Url::to(['site/profileedit'])).'</h3> <br>' ;
      }else{

  		 ?>
       <p>ชื่อภาษาอังกฤษ : <?=$profile->name_en?> <?=$profile->lastname_en?></p>
       <p>ชื่อภาษาไทย : <?=$profile->name_th?> <?=$profile->lastname_th?></p>
       <p>วันเกิด : <?=$profile->birht_day?></p>
       <p>ที่อยู่ : <?=$profile->Add?></p>

       <p>Email : <?=$profile->mail?></p>
       <p>เบอร์โทร : <?=$profile->phone?></p>
       <p>คณะ : <?php $a = faculty::findone(['Faculty_id'=>$profile->Fac_id]); echo $a->Fac_name?> </p>
       <p>สาขา : <?php $b = major::findone(['major_id'=>$profile->major_id]); echo $b->major_name?></p>
       <?php } ?>
     </div>
    </div>

    </div>
     <!--Sidebar menu-->
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
                        echo'<li>'.Html::a('แก้ไขข้อมูลส่วนตัว',Url::to(['site/profileedit'])).'
                            <li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมในที่ปรึกษา',Url::to(['checkstudentbyteacher/index'])).'</li>';
                          if(Yii::$app->user->identity->auth_status !== 'admin'){
                            echo'<li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมที่ตนเองสร้าง',Url::to(['viewjoinbyme/index'])).'</li>';
                          }
                          if(Yii::$app->user->identity->auth_status == 'boss'){
                            echo'<li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมในหลักสูตร',Url::to(['checkstudentbymajor/index'])).'</li>';
                          }
                          if(Yii::$app->user->identity->auth_status == 'deputy'){
                            echo'<li>'.Html::a('ตรวจสอบการเข้าร่วมกิจกรรมในคณะ',Url::to(['checkstudentbyfaculty/index'])).'</li>';
                          }
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





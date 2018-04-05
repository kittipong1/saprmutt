<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
Yii::setAlias('@km', Yii::$app->view->theme->baseUrl); 
Yii::setAlias('@kmpath', '@web');


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title>สมุดบันทึกกิจกรรมนักศึกษา
Student Activities of RMUTT
</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="clearfix">
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="container">
            <img src="<?= Yii::getAlias('@kmpath');?>/images/logo2.png" alt="">
        </div>
        <!-- .container -->
    </div>
    <!-- .top-bar -->
    <!-- End Top Bar -->
    <!-- Start  Logo & Naviagtion  -->
    <div class="navbar navbar-default navbar-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
           <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand" href="index.php">
            </a>
            </div>
            <div class="navbar-collapse collapse">
                <!-- Stat Search -->
              
                <!-- End Search -->
                <!-- Start Navigation List -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?>
                    </li>
                    <li>
                    <?= Html::a('ปฏิทินกิจกรรม',Url::to(['site/eventcalendar'])); ?>
                    </li>
                    <li>
                    <?= Html::a('หน่วยงานผู้จัดกิจกรรม',Url::to(['site/activity'])); ?>
                    </li>
                    <li>
                    <?= Html::a('รายงานผล',Url::to(['site/publicize'])); ?>
                    </li>
                     <li>
                     <?= Html::a('ภาพกิจกรรม',Url::to(['site/gallery'])); ?>
                    </li>
                    <li>
                    <?= Html::a('ติดต่อเรา',Url::to(['site/aboutus'])); ?>
                    </li>
                   
                    

                    <?php 
                    if(Yii::$app->user->isGuest){
                        echo '<li>'.Html::a('เข้าสู่ระบบ',Url::to(['site/login'])).'</li>';
                    }else{ 
                       echo   '<li>'.Html::a('เมนู <i class="fa fa-caret-down"></i>','#').'<ul class="dropdown">
                            <li>'.Html::a('จัดการกิจกรรม',Url::to(['activity/index'])).'</li></ul></li></li><li>'.
                                Html::a('ออกจากระบบ',['/site/logout'],['data-method' => 'post']).
                                '';
                    }
                     ?>
                    
                    
                </ul>
                <!-- End Navigation List -->
            </div>
        </div>
        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
             <li>
                <?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?>
            </li>
            <li>
            <?= Html::a('ปฏิทินกิจกรรม',Url::to(['site/aboutus'])); ?>
            </li>
            <li>
            <?= Html::a('หน่วยงานผู้จัดกิจกรรม',Url::to(['site/aboutus'])); ?>
            </li>
            <li>
            <?= Html::a('รายงานผล',Url::to(['site/publicize'])); ?>
            </li>
             <li>
             <?= Html::a('ภาพกิจกรรม',Url::to(['site/gallery'])); ?>
            </li>
            <li>
            <?= Html::a('ติดต่อเรา',Url::to(['site/aboutus'])); ?>
            </li>
           
            <li>
            <?php 
                    if(Yii::$app->user->isGuest){
                        echo Html::a('เข้าสู่ระบบ',Url::to(['site/login']));
                    }else{ 
                       echo  Html::a(
                                    'ออกจากระบบ',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ) ;
                    }
                     ?>
            </li>
        </ul>
    </div>
</header>
<div class="wrap">
   
    <div class="container">
      
        <?= $content ?>
    </div>
</div>

<footer class="footer">
  
        <?php include (__DIR__ .'../../include/footer.php'); ?>
   
</footer>
  <?php include (__DIR__ .'../../include/bottom.php'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

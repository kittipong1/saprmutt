<?php 
use yii\helpers\Html;
Yii::setAlias('@demo01', '@web');
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use app\models\faculty;

?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
</head>

<body>

  <!-- Full Body Container -->
  <div id="container">
     <div style="margin-top: 30px;">
            <div class="row">
              <div class="col-md-9">

                <!-- News Slider -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="tab-content">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          <?php for ($i=0; $i < sizeof($banners); $i++) { 
           if($i==0){
            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
           }
           else{
            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
           }
          } ?>
            
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php 
            for ($i=0; $i < sizeof($banners); $i++) {
            if($i == 0){
              echo '<div class="item active">
              <img src="'.Yii::getAlias('@demo01').'/uploads/images/'.$banners[$i]->ban_image.'" alt="..." style="width: 100%;">
              <div class="carousel-caption">
                ...
              </div>
            </div>';
            }
            else{
              echo '<div class="item ">
              <img src="'.Yii::getAlias('@demo01').'/uploads/images/'.$banners[$i]->ban_image.'" alt="..." style="width: 100%;">
              <div class="carousel-caption">
                ...
              </div>
            </div>';
            } 
             
            }
              
             ?>
         
        </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    </div>
    <div class="row">
       <div class="col-md-12">
            <div class="tabs-section">
              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#" data-toggle="tab" style="color: #f0ad4e;"><i class="fa fa-newspaper-o"></i>กิจกรรมใกล้มาถึง</a></li>
              </ul>
              <div class="tab-content">
                      <div class="latest-posts-classic">

                        <div class="row">
                        <div class="col-sm-12" style="background-color:lavender;">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th style="text-align: center;">ลำดับ</th>
                                        <th style="text-align: center;width: 40%">กิจกรรม</th>
                                        <th style="text-align: center;">หน่วยงานที่รับผิดชอบ</th>
                                        <th style="text-align: center;">วันที่</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($activity1)){
                                          foreach ($activity1 as $key => $value) {
                                           if($key < 3){
                                            $k = $key+1 ;
                                          ?>
                                      <tr>
                                        <td><?=$k?></td>
                                        <td style="text-align: center;"><?=$value["act_name"]?></td>
                                        <td><?php  $faculty = faculty::find()->where(['Fac_key'=>$value["fac_id"]])->one();
                                        echo $faculty->Fac_name;
                                        $SnewDate = date("d-m-Y", strtotime($value["act_sday"]));
                                        $EnewDate = date("d-m-Y", strtotime($value["act_eday"]));
                                        ?></td>
                                        <td><?=$SnewDate?><?php if($SnewDate!==$EnewDate)echo' - '.$EnewDate;?></td>
                                      </tr>
                                    <?php  }}} ?>
                                    </tbody>
                                  </table>
                        </div>
                        </div>
                        </div>
                  </div>
            </div>
      </div>
    </div>
    <div class="row">
       <div class="col-md-12">
            <div class="tabs-section">
              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#" data-toggle="tab" style="color: red;"><i class="fa fa-newspaper-o"></i>กิจกรรมล่าสุด</a></li>
              </ul>
              <div class="tab-content">
                      <div class="latest-posts-classic">

                        <div class="row">
                        <div class="col-sm-12" style="background-color:lavender;">
                            <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th style="text-align: center;">ลำดับ</th>
                                        <th style="text-align: center;width: 40%">กิจกรรม</th>
                                        <th style="text-align: center;">หน่วยงานที่รับผิดชอบ</th>
                                        <th style="text-align: center;">วันที่</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($activity2)){

                                          foreach ($activity2 as $key => $value) {
                                            if($key < 3){
                                            $k = $key+1 ;
                                          ?>
                                      <tr>
                                        <td ><?=$k?></td>
                                        <td style="text-align: center;"><?=$value["act_name"]?></td>
                                        <td><?php  $faculty = faculty::find()->where(['Fac_key'=>$value["fac_id"]])->one();
                                        echo $faculty->Fac_name;
                                       $SnewDate = date("d-m-Y", strtotime($value["act_sday"]));
                                        $EnewDate = date("d-m-Y", strtotime($value["act_eday"]));
                                        ?></td>
                                        <td><?=$SnewDate?><?php if($SnewDate!==$EnewDate)echo' - '.$EnewDate;?></td>
                                      </tr>
                                    <?php    }}} ?>
                                    </tbody>
                                  </table>
                        </div>
                        </div>
                        </div>
                  </div>
            </div>
      </div>
    </div>
              <div class="row">
              <div class="col-md-12">
                <div class="tabs-section">

                  <!-- Nav Tabs -->
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-newspaper-o"></i>ข่าวสาร</a></li>
                    <span class="pull-right" style="padding: 8px 0px;"><?= Html::a('ดูทั้งหมด <i class="fa fa-plus"></i>',Url::to(['site/publicize']),$options = ['class'=>'btn btn-warning btn-sm']); ?></span>
                  </ul>

                  <!-- Tab panels -->
                  <div class="tab-content">
                      <div class="latest-posts-classic">

                        <div class="row">
                        <div class="col-sm-6" style="background-color:lavender;">

                        <?php  
                       for ($x = 0; $x <= 1; $x++) {
                            $date = explode('-', $news[$x]->create_date);
                            $str_rep = str_replace(' ', ':',$date);
                            $explod2 = explode(':', $str_rep[2]);
                            $day = $explod2[0];
                            $year = $date[0];
                            $month = $date[1];
                            switch ($month) {
                              case '01':
                                $mo = 'ม.ก.';
                                break;
                              case '02':
                                $mo = 'ก.พ.';
                                break;
                              case '03':
                                $mo = 'มี.ค.';
                                break;
                              case '04':
                                $mo = 'เม.ษ.';
                                break;
                              case '05':
                                $mo = 'พ.ค.';
                                break;
                              case '06':
                                $mo = 'มิ.ย.';
                                break;
                              case '07':
                                $mo = 'ก.ค.';
                                break;
                              case '08':
                                $mo = 'ส.ค.';
                                break;
                              case '09':
                                $mo = 'ก.ย.';
                                break;
                              case '10':
                                $mo = 'ต.ค.';
                                break;
                              case '11':
                                $mo = 'พ.ย.';
                                break;
                              case '12':
                                $mo = 'ธ.ค.';
                                break;
                            }
                            echo '<div class="post-row">
                            <div class="left-meta-post">
                              <div class="post-type">
                                <img src="'.Yii::getAlias('@demo01').'/images/img-news.png'.'" alt="">
                              </div>
                              <div class="post-date"><span class="day">'.$day.'</span><span class="month">'.$mo.' '.$year.'</span></div>
                            </div>
                            <h3 class="post-title">'.Html::a($news[$x]->news_name,Url::to(['site/detail_news/?id='.$news[$x]->news_id])).'</h3>
                            <div class="post-content">
                              <p class="block-with-text">'.$news[$x]->news_explain.'<br><br>
                              '.Html::a('อ่านต่อ..>',Url::to(['site/detail_news/?id='.$news[$x]->news_id])).'</p>
                            </div>
                            <div class="post-footer">
                              ชื่อหน่วยงาน : '.$news[$x]->fac_id.'
                              
                              </div>
                          </div>';
                          }
                        
                        ?> 
                        </div>
                        <div class="col-sm-6" style="background-color:lavender;">

                        <?php  

                           for ($x = 2; $x <= 3; $x++) {
                            $date = explode('-', $news[$x]->create_date);
                            $str_rep = str_replace(' ', ':',$date);
                            $explod2 = explode(':', $str_rep[2]);
                            $day = $explod2[0];
                            $year = $date[0];
                            $month = $date[1];
                            switch ($month) {
                              case '01':
                                $mo = 'ม.ก.';
                                break;
                              case '02':
                                $mo = 'ก.พ.';
                                break;
                              case '03':
                                $mo = 'มี.ค.';
                                break;
                              case '04':
                                $mo = 'เม.ษ.';
                                break;
                              case '05':
                                $mo = 'พ.ค.';
                                break;
                              case '06':
                                $mo = 'มิ.ย.';
                                break;
                              case '07':
                                $mo = 'ก.ค.';
                                break;
                              case '08':
                                $mo = 'ส.ค.';
                                break;
                              case '09':
                                $mo = 'ก.ย.';
                                break;
                              case '10':
                                $mo = 'ต.ค.';
                                break;
                              case '11':
                                $mo = 'พ.ย.';
                                break;
                              case '12':
                                $mo = 'ธ.ค.';
                                break;
                            }
                            echo '<div class="post-row">
                            <div class="left-meta-post">
                              <div class="post-type">
                                <img src="'.Yii::getAlias('@demo01').'/images/img-news.png"  alt="">
                              </div>
                              <div class="post-date"><span class="day">'.$day.'</span><span class="month">'.$mo.' '.$year.'</span></div>
                            </div>
                            <h3 class="post-title">'.Html::a($news[$x]->news_name,Url::to(['site/detail_news/?id='.$news[$x]->news_id])).'</h3>
                            <div class="post-content">
                              <p class="block-with-text">'.$news[$x]->news_explain.'<br><br>
                              '.Html::a('อ่านต่อ..>',Url::to(['site/detail_news/?id='.$news[$x]->news_id])).'</p>
                            </div>
                            <div class="post-footer">
                              ชื่อหน่วยงาน : '.$news[$x]->fac_id.'
                              
                              </div>
                          </div>';
                          }
                        ?> 
                        </div>
                        </div>
                        </div>
                  </div>
                  <!-- End Tab Panels -->

                </div>
              </div>
            </div>

            <div class="hr1" style="margin-bottom:30px;"></div>
  </div>
</div>
</div>
<!--Sidebar-->
          <div class="col-md-3 sidebar right-sidebar">

            <!-- Popular Posts widget -->
            <div class="tabs-section widget">

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                <li class="active" style="width: 264px;"><a href="#" data-toggle="tab"><i class="fa fa-star"></i>นักศึกษาที่ ทำกิจกรรมมากที่สุด</a></li>
                <!-- <span class="pull-right" style="padding: 8px 0px;"><a href="#" class="btn btn-warning btn-sm" title="ดูทั้งหมด"><i class="fa fa-plus"></i></a></span> -->
              </ul>

              <!-- Tab panels -->
              <div class="tab-content widget-popular-posts">
                <!-- Tab Content 1 -->
                <div class="tab-pane fade in active">
                  <ul>

                    <?php  

                      for ($x = 0; $x <= 2; $x++) {
                        echo '<li>
                      <div class="widget-thumb">
                        <a href="#"><img src=" '.Yii::getAlias('@demo01').'/images/trophy'.$x.'.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">'.$topactivitystudent[$x]['Stu_name_th'].' '.$topactivitystudent[$x]['Stu_lastname_th'].'</a></h5>
                        <span><i class="fa fa-trophy"></i> : '.$topactivitystudent[$x]['counts'].' กิจกรรม</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>';
                      }
                    ?> 

                  </ul>
                </div>
              </div>
              <!-- End Tab Panels -->
              <br>
              <form action="<?=Url::to(['site/studentactivity']) ?>" method="POST" role="form">
                <legend>ค้นหาข้อมูลกิจกรรมนักศึกษา</legend>
                <div class="input-group">
                  <input type="text" class="form-control" id="student_id" name="student_id" placeholder="รหัสนักศึกษา (ไม่มีขีด)">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">ค้นหา</button>
                  </span>
                </div>
              </div>
              </form>
            </div>
           
          
          </div>
          <!--End sidebar-->
</div>

</div>

</div>


</body>

</html>
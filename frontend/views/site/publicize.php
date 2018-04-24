<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@demo01', '@web');
 ?>


<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">



<body>

  <!-- Container -->
  <div id="container">

    <!-- Start Header Section -->

    <!-- End Header Section -->


    <!-- Start Page Banner -->
    <div class="page-banner no-subtitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>ข่าวสาร</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>ข่าวสาร</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Content -->



          <!-- Page Content -->
          <div class="col-md-9 page-content">
            <div class="latest-posts-classic">

              <?php  
              foreach ($news as $key => $value) {
               $date = explode('-', $news[$key]->create_date);
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
                      <img alt="" src="'.Yii::getAlias('@demo01').'/uploads/news/'.$news[$key]->news_type_id.'/'.$news[$key]->news_image.'" />
                    </div>
                    <div class="post-date"><span class="day">'.$day.'</span><span class="month">'.$mo.' '.$year.'</span></div>
                  </div>
                  <h3 class="post-title">'.Html::a($news[$key]->news_name,Url::to(['site/detail_news/?id='.$news[$key]->news_id])).'</a></h3>
                  <div class="post-content">
                    <p>'.$news[$key]->news_explain.'</p>
                    '.Html::a('อ่านต่อ <i class="fa fa-angle-right"></i>',Url::to(['site/detail_news/?id='.$news[$key]->news_id]),$options = ['class'=>'main-button']).'
                  </div>
                  <div class="post-footer">
                    ชื่อหน่วยงาน : '.$news[$key]->fac_id.'
                   
                  </div>
                </div>';
                }
              ?> 

              </div>

              <div class="hr1" style="margin-bottom:30px;"></div>

              <!-- Start Pagination -->
            <?php 
            $pagemax = ceil($countnews/6);

            ?>
                <ul class="pagination">
              <?php 
                 $prev = $page-1 ;
               if($page==1 ){
                  $disabled = 'disabled';
                   echo '<li class="prev '.$disabled.'">'.Html::a('«','#').'</li>';  
                }else{
                 echo '<li class="prev">'.Html::a('«',Url::to(['site/gallery/?id='.$prev.'&photo=1'])).'</li>';  
                }
              for ($i=1; $i < $pagemax+1 ; $i++) { 
                 if($page == $i){
                      $active = 'active';
                      echo '<li class="'.$active.'">'.Html::a($i,Url::to(['site/gallery/?id='.$i.'&photo=1'])).'</li>'; 
                    }else{
                      echo '<li class="">'.Html::a($i,Url::to(['site/gallery/?id='.$i.'&photo=1'])).'</li>'; 
                    }
                 
              }
              $next = $page +1 ;
              if($page == $pagemax){
                echo ' <li class="next disabled"><span>»</span></li></ul>';
              }else{
                echo '<li class="next">'.Html::a('»',Url::to(['site/gallery/?id='.$next.'&photo=1'])).'</li></ul>';
              } 
               ?>
              <!-- End Pagination -->

          </div>
          <!-- End Page Content-->


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
             
             
            </div>
           
          
          </div>
          <!--End sidebar-->


    <!-- End Content -->


    <!-- Start Footer Section -->

    <!-- End Footer Section -->

  </div>
  <!-- End Container -->



</body>

</html>
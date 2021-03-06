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
            <h2>ข่าวประชาสัมพันธ์</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>ข่าวประชาสัมพันธ์</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->


    <!-- Start Content -->


          <!-- Page Content -->
          <div class="col-md-9 page-content">



            <!-- Start Post -->

            <?php  
             echo '<div class="blog-post image-post">
              <!-- Start Single Post (Gallery Slider) -->
              <div class="post-head">
                <div class="touch-slider post-slider">';
                
                 
                
                echo'
                  <div class="item">
                  
                    <a class="lightbox" title="'.$news->news_name.'" href="'.Yii::getAlias('@demo01').'/uploads/news/'.$news->news_type_id.'/'.$news->news_image.'" data-lightbox-gallery="gallery1">
                      <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                      <img alt="" src="'.Yii::getAlias('@demo01').'/uploads/news/'.$news->news_type_id.'/'.$news->news_image.'" style ="width:848px;height:350px;">
                    </a>
                  </div>
                  
              

              ';
              
                $SnewDate = date("d-m-Y", strtotime($news->create_date));
                  
              echo '</div>
              </div>
              <!-- End Single Post (Gallery) -->
              <!-- Post Content -->
              <div class="post-content">
                <div class="post-type"><i class="fa fa-picture-o"></i></div>
                <h2><a href="#">'.$news->news_name.'</a></h2>
                <p>'.$news->news_explain.'</p>
                <ul class="post-meta"><p>
                '.$news->news_description.'</p>
                  <li>'.$SnewDate.'</li>
                </ul>
                <p>
                  
                </p>
              </div>
            </div>';
              ?> 

            
            <!-- End Post -->

            <!-- Start Pagination
            <div id="pagination">
              <span class="all-pages">Page 1 of 3</span>
              <span class="current page-num">1</span>
              <a class="page-num" href="#">2</a>
              <a class="page-num" href="#">3</a>
              <a class="next-page" href="#">Next</a>
            </div>
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



  </div>

</body>

</html>
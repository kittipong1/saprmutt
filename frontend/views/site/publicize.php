<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@kmpath', '@web');
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
    <div id="content" class="bg-white">
      <div class="container">
        <div class="row sidebar-page">


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
                      <img alt="" src="'.Yii::getAlias('@kmpath').'/uploads/news/'.$news[$key]->news_type_id.'/'.$news[$key]->news_image.'" />
                    </div>
                    <div class="post-date"><span class="day">'.$day.'</span><span class="month">'.$mo.' '.$year.'</span></div>
                  </div>
                  <h3 class="post-title">'.Html::a($news[$key]->news_name,Url::to(['site/detail_news/?id='.$news[$key]->news_id])).'</a></h3>
                  <div class="post-content">
                    <p>'.$news[$key]->news_explain.'</p>
                    '.Html::a('อ่านต่อ <i class="fa fa-angle-right"></i>',Url::to(['site/detail_news/?id='.$news[$key]->news_id]),$options = ['class'=>'main-button']).'
                  </div>
                  <div class="post-footer">
                    ชื่อหน่วยงาน : '.$news[$key]->news_type_id.'
                    <span class="pull-right"><i class="fa fa-eye"></i> จำนวนผู้เข้าชม : '.$news[$key]->news_view.'</span>
                  </div>
                </div>';
                }
              ?> 

              </div>

              <div class="hr1" style="margin-bottom:30px;"></div>

              <!-- Start Pagination -->
             <div id="pagination">
            <?php 
            $pagemax = ceil($countnews/10);
            ?>
              <span class="all-pages">Page <?=$page?> of <?=$pagemax;?>  </span>
              <span class="current page-num"><?=$page?></span>
              <?php for ($i=1; $i < $pagemax+1 ; $i++) { 
                 echo Html::a($i,Url::to(['site/publicize/?id='.$i])); 
              } ?>
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
                <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-star"></i>ข่าวยอดนิยม</a></li>
                <!-- <span class="pull-right" style="padding: 8px 0px;"><a href="#" class="btn btn-warning btn-sm" title="ดูทั้งหมด"><i class="fa fa-plus"></i></a></span> -->
              </ul>

              <!-- Tab panels -->
              <div class="tab-content widget-popular-posts">
                <!-- Tab Content 1 -->
                <div class="tab-pane fade in active">
                  <ul>
                    <li>
                      <div class="widget-thumb">
                        <a href="#"><img src="<?=Yii::getAlias('@kmpath')?>/images/img-news.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อข่าว...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="widget-thumb">
                         <a href="#"><img src="<?=Yii::getAlias('@kmpath')?>/images/img-news.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อข่าว...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="widget-thumb">
                         <a href="#"><img src="<?=Yii::getAlias('@kmpath')?>/images/img-news.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อข่าว...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="widget-thumb">
                         <a href="#"><img src="<?=Yii::getAlias('@kmpath')?>/images/img-news.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อข่าว...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="widget-thumb">
                         <a href="#"><img src="<?=Yii::getAlias('@kmpath')?>/images/img-news.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อข่าว...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- End Tab Panels -->

            </div>

            <!-- Tags Widget -->
            <div class="tabs-section widget widget-tags">

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-tag"></i>แท็ก</a></li>
              </ul>

              <!-- Tab panels -->
              <div class="tab-content">
                <!-- Tab Content 1 -->
                <div class="tab-pane fade in active">
                  <div class="tagcloud">
                    <a href="#">แท็ก1</a>
                    <a href="#">แท็ก2</a>
                    <a href="#">แท็ก3</a>
                    <a href="#">แท็ก4</a>
                    <a href="#">แท็ก5</a>
                    <a href="#">แท็ก6</a>
                    <a href="#">แท็ก7</a>
                    <a href="#">แท็ก8</a>
                    <a href="#">แท็ก9</a>
                    <a href="#">แท็ก10</a>
                    <a href="#">แท็ก11</a>
                  </div>
                </div>
              </div>
              <!-- End Tab Panels -->

            </div>

          </div>
          <!--End sidebar-->


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
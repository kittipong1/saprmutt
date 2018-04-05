<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@kmpath', '@web');
?><!doctype html>
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
            <h2>กิจกรรม</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>กิจกรรม</li>
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
          <div class="col-md-9 blog-box">
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="<?=$videos?>"><a href="#video" aria-controls="home" role="tab" data-toggle="tab">คลังวิดีโอ</a></li>
              <li role="presentation" class="<?=$photos?>"><a href="#photo" aria-controls="profile" role="tab" data-toggle="tab">คลังรูปภาพ</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!--Start Video-->
              <div role="tabpanel" class="tab-pane <?=$videos?>" id="video">
                 <!-- Tab panels -->
                      <div class="latest-posts-classic">
                        <!-- Start Team Members -->
                        <div class="row">
                          <!-- Start Memebr 1 -->
                            <?php  
                            foreach ($vdo as $key => $value) {
                              # code...
                            $loopvdo[$key] = $vdo[$key]->vdo_id ;
                            
                            
                            
                                echo ' <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="#">
                                <div class="team-member">
                                  <!-- Memebr Photo, Name & Position -->
                                  <div class="member-photo">
                                    <video src=" '.Yii::getAlias('@kmpath').'/uploads/media/'.$vdo[$key]->path.'" width="100%" poster="'.Yii::getAlias('@kmpath').'/images/img-vdo.png" controls style="height: 185px; " onplaying="vdoviews('.$vdo[$key]->vdo_id.')" ></video>
                                  </div>
                                  <!-- Memebr Words -->
                                  <div class="member-info">
                                      <h5>'.$vdo[$key]->vdo_name.'</h5>
                                      <p>ชื่อหน่วยงาน..</p>
                                      <div class="member-footer">
                                      <p><small><i class="fa fa-calendar"></i> 24/08/2560 <span class="pull-right " id="views'.$vdo[$key]->vdo_id.'"><i class="fa fa-eye"></i> '.$vdo[$key]->vdo_view.'</span></small>
                                      </div>
                                  </div>
                                </div>
                                </a>
                              </div>';
                              }
                              
                            // $loopvdomax = end($loopvdo) ;
                            ?> 
                            <!-- End Memebr 1 -->
                        </div>
                        <!-- End Team Members -->
                        <div id="pagination">
            <?php 
            $pagemax = ceil($countvdo/6);
            ?>
              <span class="all-pages">Page <?=$page?> of <?=$pagemax;?>  </span>
              <span class="current page-num"><?=$page?></span>
              <?php for ($i=1; $i < $pagemax+1 ; $i++) { 
                 echo Html::a($i,Url::to(['site/gallery/?id='.$i.'&video=1'])); 
              } ?>
            </div>
            </div>
              <!-- End Tab Panels -->
              </div>
              <!--End Video-->
              <!--Start Photo -->
              <div role="tabpanel" class="tab-pane <?=$photos?>" id="photo">
                 <!-- Tab panels -->
              
                      <div class="latest-posts-classic ">

                        <!-- Start Team Members -->
                        <div class="row">
                          <!-- Start Memebr 1 -->
                            <?php  
                              
                                foreach ($album as $key => $value) {
                                echo ' <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="#">
                                <div class="team-member">
                                  <!-- Memebr Photo, Name & Position -->
                                  <div class="member-photo">
                                    <img alt="" src="'.Yii::getAlias('@kmpath').'/images/img-gallery.png" />
                                  </div>
                                  <!-- Memebr Words -->
                                  <div class="member-info">
                                    <p><b>'.Html::a($album[$key]->album_name,Url::to(['site/photo']).'/?id='.$album[$key]->album_id).'</b></p>
                                    <p>'.$album[$key]->album_agencies.'</p>
                                    <div class="member-footer">
                                      <p><small><i class="fa fa-calendar"></i> '.$album[$key]->create_date.'<span class="pull-right"><i class="fa fa-eye"></i> '.$album[$key]->album_view.'</span></small>
                                      </div>
                                  </div>
                                </div>
                                </a>
                              </div>';
                              }
                            ?> 
                            <!-- End Memebr 1 -->
                        </div>
                        <!-- End Team Members -->  
                  </div>
              <!-- End Tab Panels -->
               <div id="pagination">
            <?php 
            $pagemax = ceil($countimg/6);
            ?>
              <span class="all-pages">Page <?=$page?> of <?=$pagemax;?>  </span>
              <span class="current page-num"><?=$page?></span>
              <?php for ($i=1; $i < $pagemax+1 ; $i++) { 
                 echo Html::a($i,Url::to(['site/gallery/?id='.$i.'&photo=1'])); 
              } ?>
            </div>
              </div>
              <!--End Start Photo -->
            </div>
          </div>

            <!-- Start Pagination -->
           
            <!-- End Pagination -->
          </div>
          <!-- End Page Content-->

          <!--Sidebar-->
          <div class="col-md-3 sidebar right-sidebar">

            <!-- Popular Posts widget -->
            <div class="tabs-section widget">

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-star"></i>กิจกรรมยอดนิยม</a></li>
                <!-- <span class="pull-right" style="padding: 8px 0px;"><a href="#" class="btn btn-warning btn-sm" title="ดูทั้งหมด"><i class="fa fa-plus"></i></a></span> -->
              </ul>

              <!-- Tab panels -->
              <div class="tab-content widget-popular-posts">
                <!-- Tab Content 1 -->
                <div class="tab-pane fade in active">
                  <ul>

                    <?php  
                      for ($x = 0; $x <= 4; $x++) {
                        echo '<li>
                      <div class="widget-thumb">
                        <a href="#"><img src=" '.Yii::getAlias('@kmpath').'/images/img-gallery-1.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อกิจกรรม...</a></h5>
                        <span><i class="fa fa-calendar"></i> : 29/08/2560</span> <br>
                        <span><i class="fa fa-eye"></i> : 123 ครั้ง</span>
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

            <!-- Tags Widget -->
            
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  
  function vdoviews(id){

   $(document).ready(function(){
   $.ajax(
   {
      type: "POST",
      dataType: "json",
      url: "<?= Yii::getAlias('@kmpath').'/index.php/site/viewvdoupdate'?>",
      data: { Data: id },
      success: function(data) 
      { 
        var idviews = '#views'+data.id ;
        var contentdiv = '<i class="fa fa-eye"></i> '+data.view ;
        $(idviews).html(contentdiv);
      },
   } );
      
});
}

</script>

</body>

</html>
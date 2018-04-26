<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@demo01', '@web');
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
            <h2>ภาพกิจกรรม</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>ภาพกิจกรรม</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->
  
    <!-- Start Content -->
          <!-- Page Content -->
          <div class="col-md-9 page-content">
          <div>
            <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#" data-toggle="tab" style="color: #f0ad4e;"><i class="fa fa-newspaper-o"></i>คลังรูปภาพ</a></li>
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
                                    <video src=" '.Yii::getAlias('@demo01').'/uploads/media/'.$vdo[$key]->path.'" width="100%" poster="'.Yii::getAlias('@demo01').'/images/img-vdo.png" controls style="height: 185px; " onplaying="vdoviews('.$vdo[$key]->vdo_id.')" ></video>
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
                                  $SnewDate = date("d-m-Y", strtotime($album[$key]->create_date));
                                echo ' <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="#">
                                <div class="team-member">
                                  <!-- Memebr Photo, Name & Position -->
                                  <div class="member-photo">
                                    <img alt="" src="'.Yii::getAlias('@demo01').'/images/img-gallery.png" />
                                  </div>
                                  <!-- Memebr Words -->
                                  <div class="member-info">
                                    <p><b>'.Html::a($album[$key]->album_name,Url::to(['site/photo']).'/?id='.$album[$key]->album_id).'</b></p>
                                    <p>'.$album[$key]->album_agencies.'</p>
                                    <div class="member-footer">
                                      <p><small><i class="fa fa-calendar"></i> '.$SnewDate.'</small>
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
                <?php 
            $pagemax = ceil($countimg/6);

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
      url: "<?= Yii::getAlias('@demo01').'/index.php/site/viewvdoupdate'?>",
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
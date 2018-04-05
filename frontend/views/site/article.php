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
            <h2>บทความ</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="index.php">หน้าหลัก</a></li>
              <li>บทความ</li>
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
                for ($x = 0; $x <= 15; $x++) {
                  echo ' <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="team-member">
                    <!-- Memebr Photo, Name & Position -->
                    <div class="member-photo">
                      <img alt="" src="images/img-paper.png" />
                      
                    </div>
                    <!-- Memebr Words -->
                    <div class="member-info">
                      <p> </p>
                      <h5><a href="article1.php">ชื่อบทความ...</a></h5>
                      <h5>ชื่อหน่วยงาน...</h5>
                      <p>รายละเอียดบทความ...................</p>
                    </div>
                    <div class="member-footer">
                    <small><i class="fa fa-calendar"></i> 24/08/2560 <span class="pull-right"><i class="fa fa-eye"></i> 100 ครั้ง</span></small>
                    </div>
                  </div>
                </div>';
                }
              ?> 
              <div class="clearfix"></div>
              </div>

              <div class="hr1" style="margin-bottom:30px;"></div>

              <!-- Start Pagination -->
              <div id="pagination">
                <span class="all-pages">หน้าที่ 1 จาก 3</span>
                <span class="current page-num">1</span>
                <a class="page-num" href="#">2</a>
                <a class="page-num" href="#">3</a>
                <a class="next-page" href="#">ถัดไป</a>
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
                <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-star"></i>บทความยอดนิยม</a></li>
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
                        <a href="#"><img src="images/img-paper.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อบทความ...</a></h5>
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
    <?php include('include/footer.php'); ?>
    <!-- End Footer Section -->

  </div>
  <!-- End Container -->

  <?php include('include/bottom.php'); ?>

</body>

</html>
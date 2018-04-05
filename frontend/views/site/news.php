<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<?php include('include/head.php'); ?>

<body>

  <!-- Container -->
  <div id="container">

    <!-- Start Header Section -->
    <?php include('include/header.php'); ?>
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
              <li><a href="index.php">หน้าหลัก</a></li>
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
                for ($x = 0; $x <= 9; $x++) {
                  echo '<div class="post-row">
                  <div class="left-meta-post">
                    <div class="post-type">
                      <img src="images/img-news.png" alt="">
                    </div>
                    <div class="post-date"><span class="day">28</span><span class="month">ส.ค. 2560</span></div>
                  </div>
                  <h3 class="post-title"><a href="#">ชื่อข่าวข่าวประชาสัมพันธ์</a></h3>
                  <div class="post-content">
                    <p>รายละเอียดข่าว : เปียโนน็อคฮาร์ดอึ๋ม ดีมานด์เซ็นเตอร์ วิดีโอโมเดลพาวเวอร์แม่ค้า ปักขคณนาสไตล์ น้องใหม่ ซัพพลายเออร์ แฮมเบอร์เกอร์อาว์ แพนงเชิญแอ็กชั่น ธรรมาภิบาล อุเทนบาบูนอีสต์ฟีเวอร์อาข่า ริกเตอร์ซิงโมเดล รูบิกแทกติคเดี้ยง เซอร์ไพรส์ต้าอ่วย แตงกวา โพลารอยด์เซอร์ไพรส์จีดีพี จังโก้สมิติเวชสแควร์เจ็ต
                    <a class="read-more" href="#">อ่านต่อ...</a></p>
                  </div>
                  <div class="post-footer">
                    ชื่อหน่วยงาน : หน่วยงาน...
                    <span class="pull-right"><i class="fa fa-eye"></i> จำนวนผู้เข้าชม : 123 ครั้ง</span>
                  </div>
                </div>';
                }
              ?> 

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
                        <a href="#"><img src="images/img-news.png" alt="" /></a>
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
                        <a href="#"><img src="images/img-news.png" alt="" /></a>
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
                        <a href="#"><img src="images/img-news.png" alt="" /></a>
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
                        <a href="#"><img src="images/img-news.png" alt="" /></a>
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
                        <a href="#"><img src="images/img-news.png" alt="" /></a>
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
    <?php include('include/footer.php'); ?>
    <!-- End Footer Section -->

  </div>
  <!-- End Container -->

  <?php include('include/bottom.php'); ?>

</body>

</html>
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
            <h2>ทำเนียบ KM FA</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="index.php">หน้าหลัก</a></li>
              <li>ทำเนียบ KM FA</li>
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
          <div class="col-md-12 page-content">
            <div class="latest-posts-classic">

              <?php  
                for ($x = 0; $x <= 9; $x++) {
                  echo '<div class="call-action call-action-boxed call-action-style2 clearfix">
                <div class="row">
                  <div class="col-xs-12 col-md-3"><img alt="" src="images/img-user.png" /></div>
                  <div class="col-xs-12 col-md-9">
                    <div class="well well-white sidebar">
                      <h2>ชื่อ - นามสกุล | <small>ตำแหน่ง : ...</small></h2>
                      <div class="hr2" style="margin-bottom:15px;"></div>
                      <h4>ชื่อหน่วยงาน...</h4>
                      <h4>ชื่อหมวดหมู่...</h4>
                      <br>
                      <div class="tagcloud">
                          <a href="#">แท็ก 1</a>
                          <a href="#">แท็ก 22</a>
                          <a href="#">แท็ก 333</a>
                          <a href="#">แท็ก 4444</a>
                          <a href="#">แท็ก 55555</a>
                          <a href="#">แท็ก 666666</a>
                          <a href="#">แท็ก 7777777</a>
                          <a href="#">แท็ก 88888888</a>
                          <a href="#">แท็ก 999999999</a>
                          <a href="#">แท็ก 0000000000</a>
                      </div>
                      <br>
                      <div class="member-footer">
                        <p class="text-right"><i class="fa fa-eye"></i> จำนวนผู้เข้าชม 100 ครั้ง</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hr1" style="margin-bottom:30px;"></div>';
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
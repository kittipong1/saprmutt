<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
Yii::setAlias('@demo01', '@web');
?>



<style>


  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
<div id="container">
   <div class="page-banner no-subtitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>หน่วยงานผู้จัดกิจกรรม</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>หน่วยงานผู้จัดกิจกรรม</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 page-content">
    <div class="row">
       <div class="col-md-12">
            <div class="tabs-section">
              <!-- Nav Tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#" data-toggle="tab" style="color: #f0ad4e;"><i class="fa fa-newspaper-o"></i>ตารางหน่วยงานผู้จัดกิจกรรม</a></li>
              </ul>
              <div class="tab-content">
                      <div class="latest-posts-classic">

                        <div class="row">
                        <div class="col-sm-12" style="background-color:lavender;">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th style="text-align: center;">คณะ/วิทยาลัย</th>
                                        <th style="text-align: center;width: 40%">จำนวนกิจกรรม</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
								    <td>คณะวิทยาศาสตร์และเทคโนโลยี</td>
								    <td style="text-align: center;">1048</td>
								  	</tr>
								  	<tr>
								    <td>มหาวิทยาลัย</td>
								    <td style="text-align: center;">265</td>
								  	</tr>
								  	<tr>
								    <td>คณะศิลปศาสตร์</td>
								    <td style="text-align: center;">125</td>
								  	</tr>
								  	<tr>
								    <td>คณะบริหารธุรกิจ</td>
								    <td style="text-align: center;">112</td>
								  	</tr>
								  	<tr>
								    <td>คณะเทคโนโลยีคหกรรมศาสตร์</td>
								    <td style="text-align: center;">99</td>
								  	</tr>
								  	<tr>
								    <td>คณะครุศาสตร์อุตสาหกรรม</td>
								    <td style="text-align: center;">79</td>
								  	</tr>
								  	<tr>
								    <td>วิทยาลัยการแพทย์แผนไทย</td>
								    <td style="text-align: center;">71</td>
								  	</tr>
								  	<tr>
								    <td>คณะวิศวกรรมศาสตร์</td>
								    <td style="text-align: center;">64</td>
								  	</tr>
                                    </tbody>
                                  </table>
                       
                        </div>
                        </div>
                        </div>
                  </div>
            </div>
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
                      for ($x = 0; $x <= 4; $x++) {
                        echo '<li>
                      <div class="widget-thumb">
                        <a href="#"><img src=" '.Yii::getAlias('@demo01').'/images/img-gallery-1.png" alt="" /></a>
                      </div>
                      <div class="widget-content">
                        <h5><a href="#">ชื่อนศ...</a></h5>
                        <span><i class="fa fa-trophy"></i> : 123 กิจกรรม</span>
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


<br><br><br>



</body>
</html>

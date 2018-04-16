<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Faculty;

Yii::setAlias('@demo01', '@web');
?>

<body>
<div id="container" style="min-height: 850px">
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
    <div class="col-md-12 page-content">
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
                                        <th style="text-align: center;">ลำดับ</th>
                                        <th style="text-align: center;">รหัสกิจกรรม</th>
                                        <th style="text-align: center;">ชื่อกิจกรรม</th>
                                        <th style="text-align: center;">ลักษณะกิจกรรม</th>
                                        <th style="text-align: center;">ปีการศึกษา</th>
                                        <th style="text-align: center;">วันที่</th>
                                        <th style="text-align: center;">เข้าร่วม</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      foreach ($data as $key => $value) {
                                        $order = $key + 1 ;   
                                        echo '<tr><td style="text-align: center;">'.$order.'</td>
                                              <td style="text-align: center;">'.$value['act_id'].'</td>'.
                                              '<td style="text-align: center;">'.$value['act_name'].'</td>
                                            <td style="text-align: center;">'.$typename[$key]['type_name'].'</td>
                                            <td style="text-align: center;">'.$value['act_term'].'</td>
                                            <td style="text-align: center;">'.$value['act_sday'];
                                            if($value['act_eday']!==$value['act_sday']){
                                              echo ' - <br> '.$value['act_eday'];
                                            }
                                         echo '</td>
                                            <td style="text-align: center;">'.$join[$key].'</td>
                                           </tr>';
                                      }
                                       ?>
                                   
								  	
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
         
          <!--End sidebar-->
</div>


<br><br><br>




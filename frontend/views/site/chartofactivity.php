<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Faculty;
use yii\db\query;


Yii::setAlias('@demo01', '@web');
$style = '
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}';
$this->registerCss($style);

 $query = new Query;
                $query
                ->select(['faculty.Fac_name', 'COUNT(activity.actitaty_id) As Count'])->from('Faculty')->join('INNER JOIN','activity','activity.fac_id = faculty.Fac_key')->groupBy('faculty.Fac_name')->orderBy(['Fac_name' => 'DESC'])->all(); 
                $command = $query->createCommand();
                $data = $command->queryAll();
    

$sc = "
		var color = Chart.helpers.color;
		var barChartData = {
			lable: [
			";
foreach ($data as $key => $value) {
	$sc .= "'".$data[$key]['Fac_name']."',";
}
$sc .="],datasets: [";
foreach ($data as $key => $value) {
$sc .="{
			
				label: '".$data[$key]['Fac_name']."',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1, 
				data: [
				".$data[$key]['Count']."]},";

}
$sc .=	"]};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'สถิติจำนวนกิจกรรมแบ่งตาม หน่วยงานผู้จัดกิจกรรม'
					}
				}
			});
			var ctx2 = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx2, config);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [";
foreach ($data as $key => $value) {
	$sc .= "'".$data[$key]['Count']."',";
}
$sc .=		"
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],labels: [";

foreach ($data as $key => $value) {
	$sc .= "'".$data[$key]['Fac_name']."',";
}
	$sc .=	"
				]
			},
			options: {
				responsive: true
			}
		};

		
";

$this->registerJs($sc, \yii\web\View::POS_READY);
?>




<body>
<div id="container">
   <div class="page-banner no-subtitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>รายงานผล</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>รายงานผล</li>
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
                  <li class="active"><a href="#" data-toggle="tab" style="color: #f0ad4e;"><i class="fa fa-newspaper-o"></i>สถิติจำนวนกิจกรรมแบ่งตาม หน่วยงานผู้จัดกิจกรรม</a></li>
              </ul>
              <div class="tab-content">
                <div class="col-md-6">
                  <canvas id="canvas"></canvas>
                </div>
                <div class="col-md-6">
                  <canvas id="chart-area"></canvas>
                </div>
					</div>
			
					
                <?php $query = new Query;
                $query
                ->select(['faculty.Fac_name', 'COUNT(activity.actitaty_id) As Count'])->from('Faculty')->join('INNER JOIN','activity','activity.fac_id = faculty.Fac_key')->groupBy('faculty.Fac_name')->orderBy(['Fac_name' => 'DESC'])->all(); 
                $command = $query->createCommand();
                $data = $command->queryAll();
    ?>
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
                                      <?php 
                                      foreach ($data as $key => $value) {

                                        echo '<tr><td style="text-align: center;">'.$data[$key]['Fac_name'].'</td>'
                                            .'<td style="text-align: center;">'.$data[$key]['Count'].'</td></tr>';
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
     <!--Sidebar-->
         
</div>


<br><br><br>




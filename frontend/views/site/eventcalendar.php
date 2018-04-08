<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\view;
use app\models\Activity;
Yii::setAlias('@kmpath', '@web');
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
            <h2>ปฏิทินกิจกรรม</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><?= Html::a('หน้าหลัก',Url::to(['site/index'])); ?></li>
              <li>ปฏิทินกิจกรรม</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>


<br><br><br>
  <div id='calendar'></div>
<br><br><br><br><br><br><br><br>


<?php

$events = Activity::find()->all();
$eventsall = array();

$sc = "
    $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },

      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, 
      events: [";
foreach ($events as $key => $value) {
  $sc .= "{ title: '".$value->act_name."',  start: '".$value->act_sday."', end: '".$value->act_eday."'},";
  
}

      
     $sc .= "
       
      ],eventRender: function(event, element) {
        element.attr('title', event.title);
    }
    });

  });";


$this->registerJs($sc, \yii\web\View::POS_READY);

?>


</body>
</html>

<?php 
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\view;
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

$this->registerJs("
    $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2018-03-30',
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, 
      events: [
        {
          title: 'All Day Event',
          start: '2018-03-01',
        },
        {
          title: 'Long Event',
          start: '2018-03-07',
          end: '2018-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2018-03-11',
          end: '2018-03-13'
        },
        {
          title: 'Meeting',
          start: '2018-03-12T10:30:00',
          end: '2018-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2018-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2018-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2018-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2018-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-03-28'
        }
      ]
    });

  });", \yii\web\View::POS_READY);

?>


</body>
</html>

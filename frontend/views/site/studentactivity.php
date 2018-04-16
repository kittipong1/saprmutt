<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Faculty;
 ?>

<div class="site-studentactivity" style="min-height: 1000px;">
<h1>ประวัติการเข้าร่วมกิจกรรมนักศึกษา</h1>
	<?php if(isset($student)){ ?>
<table class="table table-hover" style="background-color:lavender;">
	
	<thead>
		<tr>
			<th>รหัสนักศึกษา</th>
			<th>คำนำหน้าชื่อ</th>
			<th>ชื่อ</th>
			<th>นามสกุล</th>
			<th>สาขาวิชา</th>
			<th>คณะ</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td><?=$student->Stu_id?></td>
			<td><?=$student->title->titlename_th?></td>
			<td><?=$student->Stu_name_th?></td>
			<td><?=$student->Stu_lastname_th?></td>
			<td><?=$student->major->major_name?></td>
			<td><?=$student->faculty->Fac_name?></td>
		</tr>
	</tbody>

</table>

<h3>กิจกรรมมหาวิทยาลัย   <font color="red"> (อย่างน้อย 6 กิจกรรม)</font></h3>
<p>11 : กิจกรรมแสดงความจงรักภักดี  12 : กิจกรรมวันสำคัญของมหาวิทยาลัย  13 : กิจกรรมเดินการกุศล  
14 : กิจกรรมปฐมนิเทศ  15 : กิจกรรมส่งเสริมประชาธิปไตย  16 : กิจกรรมตรวจสุขภาพ </p>

	<table class="table table-hover" style="background-color:lavender;">
	
	<thead>
		 <tr>
          <th >#</th>
		 <th >รหัสกิจกรรม</a></th>
          <th >ชื่อกิจกรรม</th>
          <th >ปีการศึกษา</a></th>
		 <th >วันที่</th>
        <th >หน่วยงานผู้จัดกิจกรรม</th>
        </tr>
      </thead>

	<tbody>
	
			<?php foreach ($activity as $key => $value) { 
				$faculty = Faculty::find()->where(['Fac_key'=>$value->activity->fac_id])->one();
				?>
				<tr>
			<td><?=$key?></td>
			<td><?=$value->id_actitaty?></td>
			<td><?=$value->activity->act_name?></td>
			<td><?=$value->activity->act_term?></td>
			<td><?=$value->activity->act_sday?></td>
			<td><?=$faculty->Fac_name?></td>
			</tr>
			<?php 	} ?>
		
	</tbody>

</table>

<h3>กิจกรรมคณะ/วิทยาลัย   <font color="red"> (อย่างน้อย 4 กิจกรรม)</font></h3>
       <table class="table table-hover" style="background-color:lavender;">
	
	<thead>
		 <tr>
          <th >#</th>
		 <th >รหัสกิจกรรม</a></th>
          <th >ชื่อกิจกรรม</th>
          <th >ปีการศึกษา</a></th>
		 <th >วันที่</th>
        <th >หน่วยงานผู้จัดกิจกรรม</th>
        </tr>
      </thead>

	<tbody>
	
			<?php foreach ($activity2 as $key => $value) { 
				$faculty = Faculty::find()->where(['Fac_key'=>$value->activity->fac_id])->one();
				?>
				<tr>
			<td><?=$key?></td>
			<td><?=$value->id_actitaty?></td>
			<td><?=$value->activity->act_name?></td>
			<td><?=$value->activity->act_term?></td>
			<td><?=$value->activity->act_sday?></td>
			<td><?=$faculty->Fac_name?></td>
			</tr>
			<?php 	} ?>
		
	</tbody>

</table>
<h3>กิจกรรมเพื่อสังคมและบำเพ็ญประโยชน์   <font color="red"> (อย่างน้อย 2 กิจกรรม)</font></h3>
 <table class="table table-hover" style="background-color:lavender;">
	
	<thead>
		 <tr>
          <th >#</th>
		 <th >รหัสกิจกรรม</a></th>
          <th >ชื่อกิจกรรม</th>
          <th >ปีการศึกษา</a></th>
		 <th >วันที่</th>
        <th >หน่วยงานผู้จัดกิจกรรม</th>
        </tr>
      </thead>

	<tbody>
	
			<?php foreach ($activity3 as $key => $value) { 
				$faculty = Faculty::find()->where(['Fac_key'=>$value->activity->fac_id])->one();
				?>
				<tr>
			<td><?=$key?></td>
			<td><?=$value->id_actitaty?></td>
			<td><?=$value->activity->act_name?></td>
			<td><?=$value->activity->act_term?></td>
			<td><?=$value->activity->act_sday?></td>
			<td><?=$faculty->Fac_name?></td>
			</tr>
			<?php 	} ?>
		
	</tbody>

</table>
<h3>สมาชิกชมรม  <font color="red">(อย่างน้อย 1 ชมรม)</font></h3>
 <table class="table table-hover" style="background-color:lavender;">
	
	<thead>
		 <tr>
          <th >#</th>
		 <th >รหัสชมรม</a></th>
          <th >ชื่อชมรม</th>
          <th >ปีการศึกษา</a></th>
        </tr>
      </thead>

	<tbody>
	
			<?php foreach ($activity4 as $key => $value) { 
				$faculty = Faculty::find()->where(['Fac_key'=>$value->activity->fac_id])->one();
				?>
				<tr>
			<td><?=$key?></td>
			<td><?=$value->id_actitaty?></td>
			<td><?=$value->activity->act_name?></td>
			<td><?=$value->activity->act_term?></td>
			</tr>
			<?php 	} ?>
		
	</tbody>

</table>
<h3>เข้าร่วมกิจกรรม &nbsp;&nbsp;&nbsp; <?=$countallactivity?>  กิจกรรม  ,  สมาชิกชมรม &nbsp;&nbsp;&nbsp; <?=$countactivity4?> ชมรม</h3>
<h2> <?=$status?></h2>
	<?php } ?>
</div>
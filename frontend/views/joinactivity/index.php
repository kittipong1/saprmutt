<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Joinactivity;
use yii\helpers\ArrayHelper;
use app\models\Studen;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JoinactivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อการเข้าร่วมกิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joinactivity-index" style="min-height: 1000px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มรายชื่อการเข้าร่วมกิจกรรม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'id_joinactivity',
             'id_actitaty',
            'studennumber',
       
            ['attribute'=>'Student_name',
            'value'=> function($model){
                $return = Joinactivity::find()->where(['studennumber'=>$model->studennumber])->with(['student'])->one();
                if(is_null($return->student)){
                     return 'รหัสนักศึกษาไม่มีข้อมูล';
                }
                else{
                     return $return->student->Stu_name_th.' '.$return->student->Stu_lastname_th;
                }
               
            },],
           

            ['class' => 'yii\grid\ActionColumn','template' => '{view}{delete}'],
        ],
    ]); ?>
</div>

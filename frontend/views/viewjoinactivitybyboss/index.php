<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Joinactivity;
use yii\helpers\ArrayHelper;
use app\models\Studen;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ViewjoinactivitybybossSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Joinactivities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joinactivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'id_joinactivity',
            'studennumber',
            'id_actitaty',
                ['attribute'=>'ชื่อนักศึกษา',
            'value'=> function($model){
                $return = Joinactivity::find()->where(['studennumber'=>$model->studennumber])->with(['student'])->one();
                if(is_null($return->student)){
                     return 'รหัสนักศึกษาไม่มีข้อมูล';
                }
                else{
                     return $return->student->Stu_name_th.' '.$return->student->Stu_lastname_th;
                }
               
            },],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

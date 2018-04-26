<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Joinactivity;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MyactivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index" style="min-height: 850px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม กิจกรรม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'actitaty_id',
            'act_id',
            'act_name',
            'fac_id',
            'typefac_id',
             'act_term',
              ['attribute'=>'act_sday',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->act_sday));
                return $return;
            },],
              ['attribute'=>'act_eday',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->act_eday));
                return $return;
            },],
            // 'act_comment:ntext',
             'status',
            // 'id_username',
             ['attribute'=>'Countstudent',
            'value'=> function($model){
                $return = Joinactivity::find()->where(['id_actitaty'=>$model->act_id])->count();
                return $return;
            },],
            ['class' => 'yii\grid\ActionColumn',
            'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url = Url::to(['joinactivity/index']).'?JoinactivitySearch%5Bid_actitaty%5D='.$model->act_id;
                return $url;
            } if ($action === 'update') {
                $url =Url::to(['myactivity/update?id=']).$model->actitaty_id;
                return $url;
            }
            if ($action === 'delete') {
                $url =Url::to(['myactivity/delete?id=']).$model->actitaty_id;
                return $url;
            }
        }],
        ],
    ]); ?>
</div>

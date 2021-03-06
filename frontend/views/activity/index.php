<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
use app\models\Factype;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index" style="min-height: 1000px;">

    <h1><?= Html::encode($this->title) ?></h1>
   <!--  <?php  echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?php if(Yii::$app->user->identity->auth_status=='deputy' || Yii::$app->user->identity->auth_status=='boss' || Yii::$app->user->identity->auth_status=='teacher'){
            echo Html::a('เพิ่ม กิจกรรม', ['create'], ['class' => 'btn btn-success']);
        }?><!-- 
         <?= Html::a('รีเช็ตการค้นหา', ['activity/index'], ['class' => 'btn btn-primary']) ?> -->
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
             // 'fac_id',
            ['attribute'=>'fac_id',
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Fac_key'=>$model->fac_id])->one();

                return $ref_idname->Fac_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'fac_id',ArrayHelper::map(Faculty::find()->orderBy(['Fac_key'=>SORT_ASC])->all(),'Fac_key','Fac_name'),['class'=>'form-control','prompt' => 'เลือกหน่วยงานผู้จัด']),],
            ['attribute'=>'typefac_id',
            'value'=> function($model){
                $ref_idname = Factype::find()->where(['id_type'=>$model->typefac_id])->one();

                return $ref_idname->type_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'typefac_id',ArrayHelper::map(Factype::find()->orderBy(['id_type'=>SORT_ASC])->all(),'id_type','type_name'),['class'=>'form-control','prompt' => 'เลือกประเภทกิจกรรม']),],
            // 'typefac_id',
            // 'act_term',
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
            ['attribute'=>'status',
            'filter'=> Html::activeDropDownList($searchModel,'status',['active'=>'เปิด','disable'=>'ปิด'],['class'=>'form-control','prompt' => 'เลือกสถานะกิจกรรม']),
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                if($model->status == 'active'){
                    return 'เปิด';
                }else {
                     return 'ปิด';
                }
            }],
            // 'status',
            // 'id_username',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}{update}',],
        ],
    ]); ?>
</div>

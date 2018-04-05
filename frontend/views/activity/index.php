<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
use app\models\Factype;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index" style="height: 1000px;">

    <h1><?= Html::encode($this->title) ?></h1>
<?=Yii::$app->user->identity->auth_status ?>
   <!--  <?php  echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?php if(Yii::$app->user->identity->auth_status=='deputy'){
            echo Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']);
        }?>
         <?= Html::a('Clear Search', ['activity/index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
             'act_sday',
             'act_eday',
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

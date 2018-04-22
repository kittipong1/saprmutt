<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Language;
use app\models\Faculty;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Yii::setAlias('@demo01', '@web');
$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            'news_id',
            //'news_type_id',
            // 'user_id',
            // ['attribute'=>'user_id',
            // 'contentOptions' => ['class' => 'text-center'],
            // 'headerOptions' => ['class' => 'text-center'],],
            // ['attribute'=>'news_type_lang',
            // 'contentOptions' => ['class' => 'text-center'],
            // 'headerOptions' => ['class' => 'text-center'],
            // 'value'=> function($model){
            //     $ref_idname = Language::find()->where(['lan_id'=>$model->news_type_lang])->one();
               
            //     return $ref_idname->lan_name;
            // },
            // 'filter'=> Html::activeDropDownList($searchModel,'news_type_lang',ArrayHelper::map(Language::find()->orderBy(['lan_name'=>SORT_DESC])->all(),'lan_id','lan_name')),],
            'news_name',
            // 'news_explain',
            
             ['attribute'=>'fac_id',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Faculty_id'=>$model->fac_id])->one();
               
                return $ref_idname->Fac_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'fac_id',ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_DESC])->all(),'Faculty_id','Fac_name'),['class'=>'form-control','prompt' => 'เลือกหน่วยงานผู้ดูแล']),],
             ['attribute'=>'news_image',
             'filter'=>'',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'format'=>'html',
            'value'=> function($model){
                if($model->news_image!=''){
                    return '<img src="'.Yii::getAlias('@demo01').'../uploads/news/'.$model->news_type_id.'/'.$model->news_image.'" style="width: 200px;height: 200px;">';
                }
            }],
            // 'create_date',
             'modified_date',
            // 'news_view',
            //  ['attribute'=>'active',
            // 'contentOptions' => ['class' => 'text-center'],
            // 'headerOptions' => ['class' => 'text-center'],
            // 'value'=> function($model){
            //     if($model->active == 'y'){
                
            //         return 'เปิด';
            //     }else {
            //          return 'ปิด';
            //     }
            // }],

            ['class' => 'yii\grid\ActionColumn','template' => '{update}{delete}'],
        ],
    ]); ?>
</div>

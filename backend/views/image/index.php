<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\album;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\imagesearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Yii::setAlias('@demo01', '@web');
$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'image_name','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center']],
            ['attribute'=>'ref_id',
            'value'=> function($model){
                $ref_idname = album::find()->where(['album_id'=>$model->ref_id])->one();
               
                return $ref_idname->album_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'ref_id',ArrayHelper::map(album::find()->orderBy(['album_name'=>SORT_ASC])->all(),'album_id','album_name')),],
            ['attribute'=>'path',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'format'=>'html',
            'value'=> function($model){
                if($model->path!=''){
                    return '<img src="'.Yii::getAlias('@demo01').'../../uploads/images/'.$model->path.'" style="width: 200px;height: 200px;">';
                }
            }],
             ['attribute'=>'status',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                if($model->status = 'y'){
                
                    return 'เปิด';
                }else {
                     return 'ปิด';
                }
            }],
             ['attribute'=>'modified_date','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center']
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\storevdo;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\vdosearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Yii::setAlias('@kmpath', '@web');
$this->title = 'Vdos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vdo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'vdo_id',
            ['attribute'=>'ref_id','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                $ref_idname = storevdo::find()->where(['store_id'=>$model->ref_id])->one();
               
                return $ref_idname->store_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'ref_id',ArrayHelper::map(storevdo::find()->orderBy(['store_name'=>SORT_ASC])->all(),'store_id','store_name')),]
            ,

            ['attribute'=>'path','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'format'=>'raw',
            'value'=> function($model){
                if($model->path !=''){
                    return '<video src="'.Yii::getAlias('@kmpath').'../../uploads/media/'.$model->path.'" style="width: 320px;height: 200px;" controls></video>';
                }
            }

            ],
            ['attribute'=>'vdo_name','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],],
            ['attribute'=>'status','contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                if($model->status = 'y'){
                
                    return 'เปิด';
                }else {
                     return 'ปิด';
                }
            },
            ],
            // 'vdo_description:ntext',
            // 'create_date',
             'create_by',
            // 'modified_date',
            // 'vdo_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

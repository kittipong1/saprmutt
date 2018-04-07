<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MajorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Majors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="major-index" style="min-height: 1000px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Major', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'major_id',
            'major_name',
         
            ['attribute'=>'Faculty_id',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center'],
         
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Faculty_id'=>$model->Faculty_id])->one();
               
                return $ref_idname->Fac_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'Faculty_id',ArrayHelper::map(Faculty::find()->orderBy(['Fac_name'=>SORT_DESC])->all(),'Faculty_id','Fac_name'),['class'=>'form-control','prompt' => 'เลือกคณะ']),],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

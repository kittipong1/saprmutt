<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\aboutsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ติดต่อเรา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <!--  <?= Html::a('Create About', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'about_id',
            //'user_id',
            //'about_description:ntext',
              ['attribute'=>'create_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->create_date));
                return $return;
            },],
             ['attribute'=>'midified_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->midified_date));
                return $return;
            },],
            // 'about_view',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    </div>
</div>

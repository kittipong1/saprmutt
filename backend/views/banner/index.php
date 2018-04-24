<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\bannersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ป้ายประชาสัมพันธ์';
$this->params['breadcrumbs'][] = $this->title;
?>

  
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
    


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('เพิ่ม ป้ายประชาสัมพันธ์', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],            [
              'attribute' => 'banner',
              'format' => 'html',
              'options'=> ['style'=>'width:10px; hight:10px;'],
              'value' => function($model){
                return Html::img('../../../uploads/images/'.$model->ban_image,['class'=> 'thumbnail','width'=>150]);
              }
            ],

            //'ban_id',
            //'user_id',
            'ban_name',
            'ban_link:ntext',
            'ban_image',
            // 'create_date',
            // 'modified_date',
            // 'start_date',
            // 'end_date',
            // 'view',
            // 'ban_detail:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



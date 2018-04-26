<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\albumsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัลบั้มภาพ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม อัลบั้มภาพ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'album_id',
            //'user_id',
            'album_name',
              ['attribute'=>'create_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->create_date));
                return $return;
            },],
            //'modified_date',
            //'album_view',
            'album_agencies',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

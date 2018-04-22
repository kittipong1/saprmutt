<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TitlenameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คำนำหน้าชื่อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titlename-index" style="min-height: 1000px;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มคำนำหน้าชื่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'id_titlename',
            'titlename_en',
            'titlename_th',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

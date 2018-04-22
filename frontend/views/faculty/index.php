<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacultySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คณะ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-index" style="min-height: 1000px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม คณะ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
         'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            'Faculty_id',
            'Fac_key',
            'Fac_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

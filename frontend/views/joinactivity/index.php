<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JoinactivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Joinactivities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joinactivity-index" style="min-height: 1000px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Joinactivity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_joinactivity',
            'studennumber',
            'id_actitaty',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}{delete}'],
        ],
    ]); ?>
</div>

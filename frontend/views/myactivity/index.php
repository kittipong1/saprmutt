<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyactivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index" style="min-height: 850px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'actitaty_id',
            'act_id',
            'act_name',
            'fac_id',
            'typefac_id',
             'act_term',
             'act_sday',
             'act_eday',
            // 'act_comment:ntext',
             'status',
            // 'id_username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

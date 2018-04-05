<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\storevdosearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Storevdos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storevdo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Storevdo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'store_id',
            'user_id',
            'store_name',
            'create_date',
            'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

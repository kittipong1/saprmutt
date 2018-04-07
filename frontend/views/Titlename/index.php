<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TitlenameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titlenames';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titlename-index" style="min-height: 1000px;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Titlename', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_titlename',
            'titlename_en',
            'titlename_th',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

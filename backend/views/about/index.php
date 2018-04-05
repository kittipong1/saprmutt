<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\aboutsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abouts';
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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'about_id',
            //'user_id',
            //'about_description:ntext',
            'create_date',
            'midified_date',
            // 'about_view',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    </div>
</div>

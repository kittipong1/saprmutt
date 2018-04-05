<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\news_typesearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newstypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newstype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Newstype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'news_type_id',
            'news_type_name',
            'create_date',
            'create_by',
            //'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

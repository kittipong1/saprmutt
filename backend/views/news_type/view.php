<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\newstype */

$this->title = $model->news_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Newstypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newstype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->news_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->news_type_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'news_type_id',
            'news_type_name',
            'create_date',
            'create_by',
            'modified_date',
        ],
    ]) ?>

</div>

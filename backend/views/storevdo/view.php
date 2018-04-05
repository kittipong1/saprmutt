<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\storevdo */

$this->title = $model->store_id;
$this->params['breadcrumbs'][] = ['label' => 'Storevdos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storevdo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->store_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->store_id], [
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
            'store_id',
            'user_id',
            'store_name',
            'create_date',
            'modified_date',
        ],
    ]) ?>

</div>

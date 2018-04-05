<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\vdo */

$this->title = $model->vdo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vdos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vdo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vdo_id], [
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
            'vdo_id',
            'ref_id',
            'path:ntext',
            'vdo_name',
            'status',
            'vdo_description:ntext',
            'create_date',
            'create_by',
            'modified_date',
            'vdo_view',
        ],
    ]) ?>

</div>

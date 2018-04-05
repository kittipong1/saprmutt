<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$this->title = $model->ban_id;
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary box-solid">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="box-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ban_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ban_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= Html::img('../../../uploads/images/'.$model->ban_image,['class' => 'thumbnail', 'width' => 350]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ban_id',
            'user_id',
            'ban_name',
            'ban_link:ntext',
            'ban_image',
            'create_date',
            'modified_date',
            'start_date',
            'end_date',
            'view',
            'ban_detail:ntext',
        ],
    ]) ?>
    </div>
</div>

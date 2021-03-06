<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Joinactivity */

$this->title = $model->id_joinactivity;
$this->params['breadcrumbs'][] = ['label' => 'Joinactivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joinactivity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id_joinactivity], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id_joinactivity], [
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
            'id_joinactivity',
            'studennumber',
            'id_actitaty',
        ],
    ]) ?>

</div>

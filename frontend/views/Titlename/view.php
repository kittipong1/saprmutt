<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Titlename */

$this->title = $model->id_titlename;
$this->params['breadcrumbs'][] = ['label' => 'Titlenames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titlename-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id_titlename], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id_titlename], [
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
            //'id_titlename',
            'titlename_en',
            'titlename_th',
        ],
    ]) ?>

</div>

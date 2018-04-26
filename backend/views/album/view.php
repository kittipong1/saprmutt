<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Faculty;
/* @var $this yii\web\View */
/* @var $model app\models\album */

$this->title = $model->album_id;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->album_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->album_id], [
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
            'album_id',
            'user_id',
            'album_name:ntext',
             ['attribute'=>'create_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->create_date));
                return $return;
            },],
             ['attribute'=>'modified_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->modified_date));
                return $return;
            },],
            //'album_view',
            'album_agencies:ntext',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\About */

$this->title = $model->about_id;
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">
        <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->about_id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'about_id',
            //'user_id',
            'about_description:ntext',
            'create_date',
            'midified_date',
            'about_view',
        ],
    ]) ?>
    </div>
</div>

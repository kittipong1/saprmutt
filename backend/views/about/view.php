<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\About */

$this->title = $model->about_id;
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

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

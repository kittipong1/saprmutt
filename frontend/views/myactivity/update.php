<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\activity */

$this->title = 'แก้ไข กิจกรรม';
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actitaty_id, 'url' => ['view', 'id' => $model->actitaty_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

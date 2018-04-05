<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vdo */

$this->title = 'Update Vdo: ' . $model->vdo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vdos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vdo_id, 'url' => ['view', 'id' => $model->vdo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vdo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

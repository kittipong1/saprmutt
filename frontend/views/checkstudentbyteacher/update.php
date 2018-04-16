<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\studen */

$this->title = 'Update Studen: ' . $model->Id_information;
$this->params['breadcrumbs'][] = ['label' => 'Studens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_information, 'url' => ['view', 'id' => $model->Id_information]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

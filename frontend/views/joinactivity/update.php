<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\joinactivity */

$this->title = 'Update Joinactivity: ' . $model->id_joinactivity;
$this->params['breadcrumbs'][] = ['label' => 'Joinactivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_joinactivity, 'url' => ['view', 'id' => $model->id_joinactivity]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="joinactivity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

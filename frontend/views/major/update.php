<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\major */

$this->title = 'Update Major: ' . $model->major_id;
$this->params['breadcrumbs'][] = ['label' => 'Majors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->major_id, 'url' => ['view', 'id' => $model->major_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="major-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
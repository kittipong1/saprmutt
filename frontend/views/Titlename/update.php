<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Titlename */

$this->title = 'Update Titlename: ' . $model->id_titlename;
$this->params['breadcrumbs'][] = ['label' => 'Titlenames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_titlename, 'url' => ['view', 'id' => $model->id_titlename]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titlename-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$this->title = 'แก้ไข ป้ายประชาสัมพันธ์' ;
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ban_id, 'url' => ['view', 'id' => $model->ban_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

    	<h1 class="box-title"><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


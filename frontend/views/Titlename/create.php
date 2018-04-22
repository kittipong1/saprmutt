<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Titlename */

$this->title = 'เพิ่มคำนำหน้าชื่อ';
$this->params['breadcrumbs'][] = ['label' => 'Titlenames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titlename-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

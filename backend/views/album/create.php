<?php

use yii\helpers\Html;
use backend\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\models\album */

$this->title = 'เพิ่ม อัลบั้มภาพ';
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

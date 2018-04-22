<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\studen */

$this->title = 'เพิ่มรายชื่อนักศึกษา';
$this->params['breadcrumbs'][] = ['label' => 'Studens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

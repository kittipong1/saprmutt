<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\joinactivity */

$this->title = 'เพิ่มรายชื่อการเข้าร่วมกิจกรรม';
$this->params['breadcrumbs'][] = ['label' => 'Joinactivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joinactivity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

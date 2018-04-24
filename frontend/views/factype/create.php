<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FacType */

$this->title = 'เพิ่ม ประเภทกิจกรรม';
$this->params['breadcrumbs'][] = ['label' => 'Fac Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fac-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

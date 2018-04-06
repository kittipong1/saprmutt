<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FacType */

$this->title = 'Update Fac Type: ' . $model->id_type;
$this->params['breadcrumbs'][] = ['label' => 'Fac Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type, 'url' => ['view', 'id' => $model->id_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fac-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

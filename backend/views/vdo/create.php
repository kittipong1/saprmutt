<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\vdo */

$this->title = 'Create Vdo';
$this->params['breadcrumbs'][] = ['label' => 'Vdos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

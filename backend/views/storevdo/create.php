<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\storevdo */

$this->title = 'Create Storevdo';
$this->params['breadcrumbs'][] = ['label' => 'Storevdos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storevdo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

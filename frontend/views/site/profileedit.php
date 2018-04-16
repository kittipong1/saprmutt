<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\studen */

$this->title = 'Create information';
$this->params['breadcrumbs'][] = ['label' => 'information', 'url' => ['site/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\newstype */

$this->title = 'Update Newstype: ' . $model->news_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Newstypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_type_id, 'url' => ['view', 'id' => $model->news_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newstype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

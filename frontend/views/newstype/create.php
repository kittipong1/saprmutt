<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\newstype */

$this->title = 'Create Newstype';
$this->params['breadcrumbs'][] = ['label' => 'Newstypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newstype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

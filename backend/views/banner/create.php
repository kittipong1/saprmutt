<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$this->title = 'Create Banner';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary box-solid">
	<div class="box-header">
    	<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
</div>

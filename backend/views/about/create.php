<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\About */

$this->title = 'Create About';
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
	<div class="box-header">
    	<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">
    	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

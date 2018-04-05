<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->act_name;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->actitaty_id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'actitaty_id',
            'act_id',
            'act_name',
            'fac_id',
            'typefac_id',
            'act_term',
            'act_sday',
            'act_eday',
            'act_comment:ntext',
            'status',
            'id_username',
        ],
    ]) ?>

</div>

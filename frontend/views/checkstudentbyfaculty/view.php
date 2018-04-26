<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\studen */

$this->title = $model->Id_information;
$this->params['breadcrumbs'][] = ['label' => 'Studens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studen-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_information',
            'Stu_id',
            'idtitle_id',
            'Stu_name_th',
            'Stu_lastname_th',
            'Fac_id',
            'teacher_id',
            'major_id',
        ],
    ]) ?>

</div>

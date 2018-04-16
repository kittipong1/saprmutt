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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id_information], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id_information], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_information',
            'Stu_id',
            'Stu_id_card',
            'idtitle_id',
            'Stu_name_en',
            'Stu_lastname_en',
            'Stu_name_th',
            'Stu_lastname_th',
            'Stu_birht_day',
            'Stu_Add:ntext',
            'Stu_mail',
            'Stu_phone',
            'Fac_id',
            'teacher_id',
            'Stu_avatar',
            'major_id',
        ],
    ]) ?>

</div>

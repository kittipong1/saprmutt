<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Faculty;
use app\models\FacType;
/* @var $this yii\web\View */
/* @var $model app\models\activity */

$this->title = $model->actitaty_id;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->actitaty_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->actitaty_id], [
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
            'actitaty_id',
            'act_id',
            'act_name',
            ['attribute'=>'fac_id',
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Fac_key'=>$model->fac_id])->one();

                return $ref_idname->Fac_name;
            }],
            ['attribute'=>'typefac_id',
            'value'=> function($model){
                $ref_idname = FacType::find()->where(['id_type'=>$model->typefac_id])->one();

                return $ref_idname->type_name;
            }],
            'act_term',
            'act_sday',
            'act_eday',
            'act_comment:ntext',
            'status',
            ['attribute'=>'id_username',
            'value'=> function($model){
                $ref_idname = User::find()->where(['id'=>$model->id_username])->one();

                return $ref_idname->username;
            }],
        ],
    ]) ?>

</div>

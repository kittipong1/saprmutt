<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Faculty;
use app\models\FacType;
/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->act_name;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->actitaty_id], ['class' => 'btn btn-primary']) ?>
        
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
              ['attribute'=>'act_sday',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->act_sday));
                return $return;
            },],
              ['attribute'=>'act_eday',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->act_eday));
                return $return;
            },],
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

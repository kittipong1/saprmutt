<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Faculty;
use app\models\Titlename;
use app\models\Major;
use app\models\Information;
/* @var $this yii\web\View */
/* @var $model app\models\studen */

$this->title = $model->Id_information;
$this->params['breadcrumbs'][] = ['label' => 'Studens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studen-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->Id_information], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->Id_information], [
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
            //'Id_information',
            'Stu_id',
            //'Stu_id_card',
           ['attribute'=>'idtitle_id',
            'value'=> function($model){
                $ref_idname = Titlename::find()->where(['id_titlename'=>$model->idtitle_id])->one();

                return $ref_idname->titlename_th;
            }],
            //'Stu_name_en',
            //'Stu_lastname_en',
            'Stu_name_th',
            'Stu_lastname_th',
            //'Stu_birht_day',
            //'Stu_Add',
            //'Stu_mail',
            //'Stu_phone',
            
            ['attribute'=>'Fac_id',
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Faculty_id'=>$model->Fac_id])->one();

                return $ref_idname->Fac_name;
            }],
            ['attribute'=>'major_id',
            'value'=> function($model){
                $ref_idname = Major::find()->where(['major_id'=>$model->major_id])->one();

                return $ref_idname->major_name;
            }],
             ['attribute'=>'teacher_id',
            'value'=> function($model){
                $ref_idname = Information::find()->where(['information_id'=>$model->teacher_id])->one();
                if(!empty($ref_idname)){
                    return $ref_idname->name_th.' '.$ref_idname->lastname_th;
                }
            }],
            //'Stu_avatar',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\image */
Yii::setAlias('@demo01', '@web');
$this->title = $model->image_id;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->image_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->image_id], [
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
        
       
            
            'ref_id',
            'image_name',
             ['attribute'=>'path',
            'headerOptions' => ['class' => 'text-center'],
            'format'=>'html',
            'value'=> function($model){
                if($model->path!=''){
                    return '<img src="'.Yii::getAlias('@demo01').'../../uploads/images/'.$model->path.'" style="width: 200px;height: 200px;">';
                }
            }],
            'status',
              ['attribute'=>'create_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->create_date));
                return $return;
            },],
             ['attribute'=>'modified_date',
            'value'=> function($model){
                $return  = date("d-m-Y", strtotime($model->modified_date));
                return $return;
            },],
        ],
    ]) ?>

</div>

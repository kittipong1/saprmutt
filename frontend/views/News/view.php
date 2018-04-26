<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
Yii::setAlias('@demo01', '@web');
$this->title = $model->news_id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">


    <p>
        <?php if(Yii::$app->user->identity->id == $model->user_id){ ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->news_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->news_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'news_name',
            'news_explain',
            ['attribute'=>'news_image',
             'format'=>'html',
            'headerOptions' => ['class' => 'text-center'],
            'value'=> function($model){
                if(!empty($model->news_image)){

                return '<img src="'.Yii::getAlias('@demo01').'../uploads/news/'.$model->news_type_id.'/'.$model->news_image.'" style="width: 200px;height: 200px;">';
                }
               
            }],
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
            'active',
            'news_description:ntext',
        ],
    ]) ?>

</div>

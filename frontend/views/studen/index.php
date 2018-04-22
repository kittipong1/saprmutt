<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
use app\models\Titlename;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อนักศึกษา';
$this->params['breadcrumbs'][] = $this->title;
$style = 'body{
font-size: 15px;
}';
$this->registerCss($style);


?>
<div class="studen-index" style="min-height: 1000px;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มรายชื่อนักศึกษา', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'รายการที่ {begin} - {end} จาก {totalCount} รายการ', 'emptyText' => 'ไม่พบข้อมูล',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับ'],

            //'Id_information',
            'Stu_id',
            //'Stu_id_card',
            ['attribute'=>'idtitle_id',
            'value'=> function($model){
                $ref_idname = Titlename::find()->where(['id_titlename'=>$model->idtitle_id])->one();

                return $ref_idname->titlename_th;
            },
            'filter'=> Html::activeDropDownList($searchModel,'idtitle_id',ArrayHelper::map(Titlename::find()->all(),'id_titlename','titlename_th'),['class'=>'form-control','prompt' => 'เลือกคำนำหน้าชื่อ']),],
            //'Stu_name_en',
            // 'Stu_lastname_en',
             'Stu_name_th',
             'Stu_lastname_th',
            // 'Stu_birht_day',
            // 'Stu_Add',
             //'Stu_mail',
             //'Stu_phone',
            ['attribute'=>'Fac_id',
            'value'=> function($model){
                $ref_idname = Faculty::find()->where(['Faculty_id'=>$model->Fac_id])->one();

                return $ref_idname->Fac_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'Fac_id',ArrayHelper::map(Faculty::find()->orderBy(['Fac_key'=>SORT_ASC])->all(),'Faculty_id','Fac_name'),['class'=>'form-control','prompt' => 'เลือกค้นหาคณะ']),],
            // 'teacher_id',
            // 'Stu_avatar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

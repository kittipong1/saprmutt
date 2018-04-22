<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
use app\models\Titlename;
use app\models\Major;
use app\models\Joinactivity;
use app\models\Studen;
use app\models\Information;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckstudentbymajorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Studens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studen-index" style="min-height: 850px">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $major_id = Information::find()->where(['user_id'=>Yii::$app->user->identity->id])->one(); ?>

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
            // 'Stu_Add:ntext',
            // 'Stu_mail',
            // 'Stu_phone',
           
            // 'teacher_id',
            // 'Stu_avatar',
 
             ['attribute'=>'major_id',

            'value'=> function($model){
                $ref_idname = Major::find()->where(['major_id'=>$model->major_id])->one();

                return $ref_idname->major_name;
            },
            'filter'=> Html::activeDropDownList($searchModel,'major_id',ArrayHelper::map(Major::find()->where(['Faculty_id'=>$major_id->Fac_id])->orderBy(['major_name'=>SORT_ASC])->all(),'major_id','major_name'),['class'=>'form-control','prompt' => 'เลือกสาขา']),],
             ['attribute'=>'Status',
             'format' => 'html',
            'value'=> function($model){
         $student = Studen::find()->where(['Stu_id'=>$model->Stu_id])->with('faculty')->one();
        $activity1 = joinactivity::find()->where(['studennumber'=>$model->Stu_id])->andWhere(['like', 'id_actitaty','00%',false])->with('activity')->count();
        $activity2 = joinactivity::find()->where(['studennumber'=>$model->Stu_id])->andWhere(['like', 'id_actitaty',$student->faculty->Fac_key.'%',false])->with('activity')->count();
        $activity3 = joinactivity::find()->where(['studennumber'=>$model->Stu_id])->andWhere(['like', 'id_actitaty','20%',false])->with('activity')->count();
        $activity4 = joinactivity::find()->where(['studennumber'=>$model->Stu_id])->andWhere(['like', 'id_actitaty','21%',false])->with('activity')->count();
        //  $activity1 = 6 ; $activity2 = 4 ; $activity3 = 2 ; $activity4 = 1 ;  //TEST ครบ 
        if($activity1 > 5 && $activity2 > 3 && $activity3 > 1 && $activity4 > 0){
           return '<p style="color:green">ครบ</p>';
        }else{
            return '<p style="color:red">ไม่ครบ</p>';}
            },],

            ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
        ],
    ]); ?>
</div>


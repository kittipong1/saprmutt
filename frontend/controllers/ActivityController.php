<?php

namespace frontend\controllers;

use Yii;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity->auth_status !== 'deputy' && Yii::$app->user->identity->auth_status !== 'boss' && Yii::$app->user->identity->auth_status !== 'teacher'){
            return $this->goHome();
            exit();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->auth_status !== 'deputy' && Yii::$app->user->identity->auth_status !== 'boss' && Yii::$app->user->identity->auth_status !== 'teacher'){
            return $this->goHome();
            exit();
        }
        $model = new Activity();

        if ($model->load(Yii::$app->request->post())) {
            $str1 = explode('25', $model->act_term);
            $actall = Activity::find()->all();
            $acta = array();
            foreach ($actall as $key => $value) {
                $acta[$key] = $value;
            }
            $calactid = $acta[0]['act_id'][8]+($acta[0]['act_id'][7]*10)+($acta[0]['act_id'][6]*100);

            if($calactid < 10){
                $calactidl = '00'.($calactid+1);
            }
            if($calactid < 100 && $calactid > 10){
                $calactidl = '0'.($calactid+1);
            }
            if($calactid >= 100){
                $calactidl = ($calactid+1);
            }

            $_act_id = $model->fac_id.$model->typefac_id.$str1[1].$calactidl;
            $model->act_id = $_act_id;
            $model->id_username = '1';
            if($model->save()){
                $model->save();
            }

            return $this->redirect(['activity/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity->auth_status !== 'deputy' && Yii::$app->user->identity->auth_status !== 'boss' && Yii::$app->user->identity->auth_status !== 'teacher'){
            return $this->goHome();
            exit();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->actitaty_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     if(Yii::$app->user->identity->auth_status == 'deputy' || Yii::$app->user->identity->auth_status == 'boss' || Yii::$app->user->identity->auth_status == 'teacher'){
    //         return $this->goHome();
    //         exit();
    //     }
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace frontend\controllers;

use Yii;
use app\models\joinactivity;
use app\models\JoinactivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * JoinactivityController implements the CRUD actions for joinactivity model.
 */
class JoinactivityController extends Controller
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
                        'actions' => ['index', 'create','update','view','mynews'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'create','update','delete'],
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
     * Lists all joinactivity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JoinactivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single joinactivity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new joinactivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new joinactivity();
        if(Yii::$app->user->identity->auth_status =='deputy'){
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'csv_path');
            if ( $file ){
                    $time = time();
                    $file->saveAs('./uploads/csv/' .$time. '.' . $file->extension);
                    $file = './uploads/csv/' .$time. '.' . $file->extension;

                     $handle = fopen($file, "r");
                     while (($fileop = fgetcsv($handle, 1000, ",")) !== false) 
                     {
                        $name = $fileop[0];
                        $id_actitaty = $model->id_actitaty;
                        // print_r($fileop);exit();
                        $sql = "INSERT INTO joinactivity(studennumber, id_actitaty) VALUES ('$name', '$id_actitaty')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                     }

                     if ($query) 
                     {
                        echo "data upload successfully";
                     }

                }

             if($model->save()){
                $model->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
         }else {

             throw new NotFoundHttpException("can't update this item because you don't have promiss.");
         }
    }

    /**
     * Updates an existing joinactivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_joinactivity]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing joinactivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the joinactivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return joinactivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = joinactivity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace frontend\controllers;

use Yii;
use app\models\FacType;
use app\models\FactypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FactypeController implements the CRUD actions for FacType model.
 */
class FactypeController extends Controller
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
                        'actions' => ['index', 'create','update','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'create','update','view','delete'],
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
     * Lists all FacType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FacType model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
         if(Yii::$app->user->identity->auth_status =='deputy'){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
          }
           else{
                 throw new NotFoundHttpException("can't update this item because you don't have promiss.");
           }
    }

    /**
     * Creates a new FacType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FacType();
 if(Yii::$app->user->identity->auth_status =='deputy'){
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_type]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
          }
           else{
                 throw new NotFoundHttpException("can't update this item because you don't have promiss.");
           }
    }

    /**
     * Updates an existing FacType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
              if(Yii::$app->user->identity->auth_status =='deputy'){
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_type]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
          }
           else{
                 throw new NotFoundHttpException("can't update this item because you don't have promiss.");
           }
    }

    /**
     * Deletes an existing FacType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         if(Yii::$app->user->identity->auth_status =='deputy'){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
          }
           else{
                 throw new NotFoundHttpException("can't update this item because you don't have promiss.");
           }
    }

    /**
     * Finds the FacType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FacType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FacType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

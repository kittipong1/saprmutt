<?php

namespace backend\controllers;

use Yii;
use backend\models\Album;
use backend\models\albumsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * AlbumController implements the CRUD actions for album model.
 */
class AlbumController extends Controller
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
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['index', 'create','update','view'],
                        'allow' => true,
                        'roles' => ['admin'],
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
     * Lists all album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new albumsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single album model.
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
     * Creates a new album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new album();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_date = date('Y-m-d H:i:s');
            $model->modified_date = date('Y-m-d H:i:s');
            $model->album_view = 0;
            $model->user_id = 1;
            $file = UploadedFile::getInstance($model,'album_imagepath');
            if($file->size!=0){
                $model->album_img = $file->basename.'.'.$file->extension;
                $file->saveAs('../uploads/images/'.$file->basename.'.'.$file->extension);
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
    }

    /**
     * Updates an existing album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->modified_date = date('Y-m-d H:i:s');
             $file = UploadedFile::getInstance($model,'album_imagepath');
            if($file->size!=0){
                $model->album_img = $file->basename.'.'.$file->extension;
                $file->saveAs('../uploads/images/'.$file->basename.'.'.$file->extension);
            }
            if($model->save()){
                $model->save();
            }
             return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing album model.
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
     * Finds the album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = album::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

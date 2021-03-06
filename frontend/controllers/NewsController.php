<?php

namespace frontend\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */

    public function actionMynews()
    {
       
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel['user_id'] = Yii::$app->user->identity->id ;
        return $this->render('mynews', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new News();

         if ($model->load(Yii::$app->request->post())) {
            $model->create_date = date('Y-m-d H:i:s');
            $model->modified_date = date('Y-m-d H:i:s');
            $model->news_view = 0;
            $model->news_type_lang = '1';
            $model->active = 'y';
            $model->user_id = Yii::$app->user->identity->id;

             $file = UploadedFile::getInstance($model,'news_imagepath');
            if((!empty($file) && $file->size!=0)){
                if (!is_dir('./uploads/news/'.$model->news_type_id.'/')) {
                    mkdir("./uploads/news/".$model->news_type_id."/");
                }
                $model->news_image = $file->basename.'.'.$file->extension;
                $file->saveAs('./uploads/news/'.$model->news_type_id.'/'.$file->basename.'.'.$file->extension);
             
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
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->user_id == Yii::$app->user->identity->id){
        if ($model->load(Yii::$app->request->post()) ) {
            $model->modified_date = date('Y-m-d H:i:s');
            $file = UploadedFile::getInstance($model,'news_imagepath');
           
            if((!empty($file) && $file->size!=0)){
                if (!is_dir('./uploads/news/'.$model->news_type_id.'/')) {
                    mkdir("./uploads/news/".$model->news_type_id."/");
                }
                $model->news_image = $file->basename.'.'.$file->extension;
                $file->saveAs('./uploads/news/'.$model->news_type_id.'/'.$file->basename.'.'.$file->extension);
             
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
        else{
            throw new NotFoundHttpException("can't update this item because you don't have promiss.");
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
       if($model->user_id == Yii::$app->user->identity->id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else{
            throw new NotFoundHttpException("can't update this item because you don't have promiss.");
        }
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

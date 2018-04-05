<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\ArrayHelper;
use app\models\News;
use app\models\album;
use app\models\image;
use app\models\Vdo;
use app\models\NewsType;
use yii\data\ActiveDataProvider;
use app\models\About;
use app\models\Banner;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
     public function beforeAction($action) { 
     $this->enableCsrfValidation = false; 
    return parent::beforeAction($action);
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $newsall = News::find()->all();
        $news = array();
        foreach ($newsall as $key => $value) {
            $news[$key] = $value;
        }
        $albumall = album::find()->all();
        $album = array();
        foreach ($albumall as $key => $value) {
            $album[$key] = $value;
        }
        $banner = Banner::find()->where('ban_id')->all();
        $banners = array();
        foreach ($banner as $key => $value) {
            $banners[$key] = $value;
        }
        return $this->render('index',[
               'news'=>$news,
               'album'=>$album,
               'banners'=>$banners,
            ]);
            
    }
    public function actionActivity(){
    
        return $this->render('activity');
    }
    public function actionEventcalendar(){
    
        return $this->render('eventcalendar');
    }
    public function actionAboutus()
    {
        $aboutall = About::find()->all();
        $about = array();
        foreach ($aboutall as $key => $value) {
            $about[$key] = $value;

        $abouts = About::find()->where('about_id')->one();
        $abouts->about_view ++;
        $abouts->save();
        }
        return $this->render('aboutus',[
               'about'=>$about,
            ]);
    }
     public function actionKnowledge()
    {
        return $this->render('knowledge');
    }
     public function actionGallery($id=null,$photo=null,$video=null)
    {   
        if(isset($_POST['views1'])){
            exit();
        }


        //IMAGE DATA/////////////////////////////////
        if(empty($id)){$id = 1;}
        if($photo==1){$photos = 'active';}else {$photos = '';}
        if($video==1){$videos = 'active';}else {$videos = '';}
        $page =$id ;
        $limit = ($page-1)*6 ;
        $albumall = album::find()->limit(6)->offset($limit)->all();
        $album = array();
        $countimg = album::find()->all();
        $a = count($countimg);
        foreach ($albumall as $key => $value) {
            $album[$key] = $value;
        }
        //VDO DATA/////////////////////////////////
        $vdoall = VDO::find()->limit(6)->offset($limit)->all();
        $vdo = array();
        $countvdo = VDO::find()->all();
        $b = count($countvdo);
        foreach ($vdoall as $key => $value) {
            $vdo[$key] = $value;
        }
        return $this->render('gallery',[
                'album'=>$album,
                'vdo'=>$vdo,
                'page'=>$page,
                'countimg'=>$a,
                'countvdo'=>$b,
                'photos'=>$photos,
                'videos'=>$videos,
            ]);
    }
     public function actionNews()
    {
        return $this->render('news');
    }

    public function actionViewvdoupdate()
    {  
        $attr = array();
            $a = $_POST['Data'];
             $Vdo = Vdo::find()->where(['vdo_id'=>$a])->one();
             $Vdo->vdo_view ++;
             $Vdo->save();
             
             $attr['view'] = $Vdo->vdo_view;
             $attr['id'] = $Vdo->vdo_id;
             echo json_encode($attr);
             exit();
         
        return $this->render('some');
    }
     public function actionPhoto($id)
    {

        $album = album::find()->where(['album_id'=>$id])->one();
        $album->album_view ++;
        $album->save();

        $image = image::find()->where(['ref_id'=>$id])->all();
        $img = array();
        foreach ($image as $key => $value) {
            $img[$key] = $value;

        }
       return $this->render('photo',[
            'img'=>$img,
            'album'=>$album,
            ]);
    }

     public function actionPublicize($id=null)
    {
        if(empty($id)){
            $id=1;
        }
        $page =$id ;
        $limit = ($page-1)*6 ;
        $newsall = News::find()->limit(10)->offset($limit)->all();
        $news = array();
        $countnews = VDO::find()->all();
        $a = count($countnews);
        foreach ($newsall as $key => $value) {
            $news[$key] = $value;
        }

        return $this->render('publicize',[
            'news'=>$news,
            'page'=>$page,
            'countnews'=>$a,
            ]);
    }
    public function actionDetail_news($id)
    {

        $news = News::find()->where(['news_id'=>$id])->one();
        $news->news_view ++;
        $news->save();
        return $this->render('detail_news',[
            'news'=>$news,

            ]);
    }
     public function actionVideos()
    {
        return $this->render('videos');
    }
     public function actionEmagazine()
    {
        return $this->render('emagazine');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

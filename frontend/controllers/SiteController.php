<?php
namespace frontend\controllers;

use Yii;use yii\helpers\Url;
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
use app\models\activity;
use app\models\Vdo;
use app\models\FacType;
use app\models\NewsType;
use app\models\joinactivity;
use yii\data\ActiveDataProvider;
use app\models\About;
use app\models\Banner;
use app\models\Faculty;
use app\models\profile;
use app\models\studen;
use app\models\information;
use yii\web\UploadedFile;
use backend\models\User;
use yii\web\NotFoundHttpException;
use yii\db\query;
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
                'only' => ['logout', 'signup','profile','profileedit'],
                'rules' => [
                    [
                        'actions' => ['login','error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','profile','profileedit'],
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
        $newsall = News::find()->orderBy(['create_date'=>SORT_DESC])->all();
        $news = array();
        foreach ($newsall as $key => $value) {
            $news[$key] = $value;
            $a = Faculty::findone(['Faculty_id'=>$value->fac_id]); 
            $news[$key]['fac_id'] = $a->Fac_name ;
        }
        $activity1 = new Query;
        $activity1->select(['*'])->from('activity')->where('datediff(NOW(),act_sday)>=0')->all();
        $command = $activity1->createCommand();
        $activity1all = $command->queryAll();
        $activity2 = new Query;
        $activity2->select(['*'])->from('activity')->where('datediff(NOW(),act_sday)<=0')->all();
        $command = $activity2->createCommand();
        $activity2all = $command->queryAll();
        $banner = Banner::find()->where('ban_id')->all();
        $banners = array();
        foreach ($banner as $key => $value) {
            $banners[$key] = $value;
        }
        $topactivitystudentsql = new Query;
        $topactivitystudentsql->select(['COUNT(id_actitaty) AS counts','studen.Stu_name_th',
    'studen.Stu_lastname_th'])->from('joinactivity')->join('LEFT JOIN','studen','studen.Stu_id = joinactivity.studennumber')->groupBy('studennumber')->orderBy(['counts' => SORT_DESC])->all(); 
        $command = $topactivitystudentsql->createCommand();
        $topactivitystudent = $command->queryAll();
        return $this->render('index',[
               'news'=>$news,
               'activity2'=>$activity1all,
               'activity1'=>$activity2all,
               'banners'=>$banners,
               'topactivitystudent'=>$topactivitystudent,
            ]);
            
    }
    public function actionActivity(){
     $topactivitystudentsql = new Query;
        $topactivitystudentsql->select(['COUNT(id_actitaty) AS counts','studen.Stu_name_th',
    'studen.Stu_lastname_th'])->from('joinactivity')->join('LEFT JOIN','studen','studen.Stu_id = joinactivity.studennumber')->groupBy('studennumber')->orderBy(['counts' => SORT_DESC])->all(); 
        $command = $topactivitystudentsql->createCommand();
        $topactivitystudent = $command->queryAll();
    $query = new Query;
                $query
                ->select(['faculty.Fac_name', 'COUNT(activity.actitaty_id) As Count','faculty.Fac_key'])->from('Faculty')->join('INNER JOIN','activity','activity.fac_id = faculty.Fac_key')->groupBy('faculty.Fac_name')->orderBy(['Fac_name' => SORT_DESC])->all(); 
                $command = $query->createCommand();
                $data = $command->queryAll();

        return $this->render('activity',['data'=>$data,'topactivitystudent'=>$topactivitystudent]);
    }
    public function actionViewactivity(){
    if(isset($_GET['fac_id'])) {
        $fac_id =  $_GET['fac_id'];
        $data = activity::find()->where(['fac_id'=>$fac_id])->all();
        foreach ($data as $key => $value) {
             $typename[$key] = FacType::find(['id_type'=>$value->typefac_id])->one();
             $join[$key] = joinactivity::find()->where(['id_actitaty'=>$value->act_id])->count();
        }
       
    } 
        return $this->render('viewactivity',['data'=>$data,'typename'=>$typename,'join'=>$join]);
    }
    public function actionActivitychart(){
    
        return $this->render('activitychart');
    }
    public function actionChartofactivity(){
    
        return $this->render('chartofactivity');
    }
    public function actionChartofstudent(){
    
        return $this->render('chartofstudent');
    }
    public function actionProfileedit(){

        $userid = Yii::$app->user->identity->id ;
        $profile = information::findOne(['user_id'=>$userid]);
        if(is_null($profile)){
            $model = new information;
        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = $userid;

            $file = UploadedFile::getInstance($model,'avatar_path');
            if($file->size!=0){

                $model->avatar = $file->basename.'.'.$file->extension;
                $file->saveAs('./uploads/information/'.$file->basename.'.'.$file->extension);
            }
            if($model->save()){
                $model->save();
            }
             
            return $this->redirect(['site/profile']);
        }
        }else {
             $model = information::findOne(['user_id'=>$userid]);


             if ($model->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($model,'avatar_path');
            if($file->size!=0){

                $model->avatar = $file->basename.'.'.$file->extension;
                $file->saveAs('./uploads/information/'.$file->basename.'.'.$file->extension);
            }
            if($model->save()){
            $model->save();
            }
            return $this->redirect(['site/profile']);
        }
           
    }

        return $this->render('profileedit',['model' => $model,
    ]);
    }
    public function actionProfile(){


        $userid = Yii::$app->user->identity->id ;
        $profile = information::findOne(['user_id'=>$userid]);



        return $this->render('profile',[
            'profile'=>$profile,
        ]);
    }
    public function actionEditpassword(){
        $userid = Yii::$app->user->identity->id ;
        $model = User::findOne(['id'=>$userid]);
        if ($model->load(Yii::$app->request->post())){
            
            $validateOldPass = Yii::$app->security->validatePassword($model->old_password,$model->password_hash);
  
            if($validateOldPass=='1'){
                if($model->new_password == $model->confirm_password) {
                $hashpassword = Yii::$app->security->generatePasswordHash($model->new_password);
                $model->password_hash = $hashpassword;
                if($model->save()) {
                $model->save();
                }
            }else {
                throw new NotFoundHttpException('confirm password is not true.');
            }
            }
            else {
                throw new NotFoundHttpException('Old password is wrong.');
            }
            return $this->redirect(['site/profile']);
        } else {
           return $this->render('editpassword',['model'=>$model]);
        }        
    }
    public function actionEventcalendar(){
    
        return $this->render('eventcalendar');
    }
    public function actionStudentactivity(){
    if(Yii::$app->request->post()){
        $student_id = $_POST['student_id'];
        $student = Studen::find()->where(['Stu_id'=>$student_id])->with('faculty')->with('major')->with('title')->one();
        if(!empty($student)){
        $activity1 = joinactivity::find()->where(['studennumber'=>$student_id])->andWhere(['like', 'id_actitaty','00%',false])->with('activity')->all();
        $activity2 = joinactivity::find()->where(['studennumber'=>$student_id])->andWhere(['like', 'id_actitaty',$student->faculty->Fac_key.'%',false])->with('activity')->all();
        $activity3 = joinactivity::find()->where(['studennumber'=>$student_id])->andWhere(['like', 'id_actitaty','20%',false])->with('activity')->all();
        $activity4 = joinactivity::find()->where(['studennumber'=>$student_id])->andWhere(['like', 'id_actitaty','21%',false])->with('activity')->all();
        $countallactivity = count($activity3)+count($activity2)+count($activity1);
        $countactivity4 = count($activity4);
        if(count($activity1) > 5 && count($activity2) > 3 && count($activity3) > 1 && count($activity4) > 0){
           $status ='<font color="green">นักศึกษาเข้าร่วมกิจกรรมมหาวิทยาลัยฯ ครบตามที่กำหนด</font>';

        }else{
            $status ='<font color="red"> นักศึกษาเข้าร่วมกิจกรรมมหาวิทยาลัยฯ ยังไม่ครบตามที่กำหนด</font>';

        }
            
       return $this->render('studentactivity',['student'=>$student,'activity'=>$activity1,'activity2'=>$activity2,'activity3'=>$activity3,'activity4'=>$activity4,'countallactivity'=>$countallactivity,'countactivity4'=>$countactivity4,'status'=>$status]);
        }else {
            echo '<script>
                alert("ไม่มีนักศึกษาในรหัสนักศึกษาที่กรอก");
    setTimeout(function(){  window.location.assign("'.Url::to(['site/index']).'")}, 10);
            </script>';
             exit();
        }
    }    
    else {
        return $this->render('studentactivity');
    }
    
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

         $topactivitystudentsql = new Query;
        $topactivitystudentsql->select(['COUNT(id_actitaty) AS counts','studen.Stu_name_th',
    'studen.Stu_lastname_th'])->from('joinactivity')->join('LEFT JOIN','studen','studen.Stu_id = joinactivity.studennumber')->groupBy('studennumber')->orderBy(['counts' => SORT_DESC])->all(); 
        $command = $topactivitystudentsql->createCommand();
        $topactivitystudent = $command->queryAll();
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
                'topactivitystudent'=>$topactivitystudent,
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
           $topactivitystudentsql = new Query;
        $topactivitystudentsql->select(['COUNT(id_actitaty) AS counts','studen.Stu_name_th',
    'studen.Stu_lastname_th'])->from('joinactivity')->join('LEFT JOIN','studen','studen.Stu_id = joinactivity.studennumber')->groupBy('studennumber')->orderBy(['counts' => SORT_DESC])->all(); 
        $command = $topactivitystudentsql->createCommand();
        $topactivitystudent = $command->queryAll();
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
            'topactivitystudent'=>$topactivitystudent,
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
            $a2 = Faculty::findone(['Faculty_id'=>$value->fac_id]); 
            $news[$key]['fac_id'] = $a2->Fac_name ;
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

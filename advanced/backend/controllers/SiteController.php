<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Admin;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\helpers\Message;
/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error','email','emailsave','getemail'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        ];
    }

    public function actionEmail()
    {

        header("content-type:text/html;charset=utf-8"); 
        $this->layout = "signup";
        $model = new Admin;
        return $this->render("email",['model'=>$model]); 
    }

    public function actionGetemail()
    {
        $this->layout = "signup";
        $model = new Admin;
        $model->setScenario('email');
        $email = Yii::$app->request->post();
        $wd = $model->find()->asArray()->where(['email'=>$email])->one();
        if(sizeof($wd) == '0')
        {
           Message::error("没有此邮箱!请重新输入");
           return  $this->redirect(['site/email']);
        }
        $time = time();
        $label = $model->code_kont($wd['email'],$time);
        $sendEmail = $model->sendEmail($time,$wd['email'],$label);//判断发送是否成功
        if($sendEmail)
        {  
            Message::success("邮箱发送成功",['site'=>'email'],false);
        }else
        {    
            Message::error("邮箱发送失败");
        }
         return  $this->redirect(['site/email']);
    }

    public function actionEmailsave()
    {
        $this->layout = "signin";
        $model = new Admin;
        $get_email = Yii::$app->request->get();
        $label = $model->code_kont($get_email['email'],$get_email['time']);
        if($get_email['label'] != $label)
        {
               Message::error("链接错误请重试!!!");
        }
        if(time() - $get_email['time'] > 9000 )
        {
               Message::success("时间已过期",['site'=>'email']);
        }
        $pwd = $model->find()->where(["email"=>$get_email['email']])->one();
        $pwd->setScenario('password');
        $data =  Yii::$app->request->post();
        if($pwd->load($data)  && $pwd->validate())
        {
            $pwd->setPassword($data['Admin']['password_hash']);
            $pwd->generateAuthKey();
            $are = $pwd->save();
            if($are)
            {   
                Message::success("修改成功请登录",['site'=>'login']);
            }else
            {    

                Message::error("修改失败");
            }
        }

        return $this->render('emailsave',['model'=>$model]);
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {  
        return $this->render('index');
    }
    //http://admin.yii.com/index.php?r=controller%2Faction#comment
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        $this->layout = "signin";
        if (!Yii::$app->user->isGuest) {

            return  $this->redirect(['index/index']);
        
        
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
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return  $this->redirect(['site/login']);
        //return $this->goHome();
    }
}

<?php 

 namespace backend\controllers;
 use Yii;
 use yii\filters\AccessControl;
 use yii\web\Controller;
 class IndexController extends Controller
 {
 	  public $layout = "main";
 	  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

 	  public function actionIndex()
 	  {
 	  	
 	  	return $this->render("index");
      
 	  }

       //成功提示语
         protected function success($msg='',$url,$acc=true,$time="3")
       {

          Yii::$app->session->setFlash("alerts",['msg'=>$msg,'stae'=>1,"acc"=>$acc,"url"=>$url,"time"=>$time]);
          return $this->render("/common/message");

        }
        //错误提示语
        protected function error($msg,$acc=true,$time="3")
        {

          Yii::$app->session->setFlash("alerts",['msg'=>$msg,'stae'=>0,"acc"=>$acc,"url"=>"1","time"=>$time]);
          return $this->render("/common/message");
        }
 }


 ?>
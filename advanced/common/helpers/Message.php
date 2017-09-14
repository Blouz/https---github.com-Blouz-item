<?php 
   

      namespace common\helpers;
      use yii;
      class Message{


      		 //成功提示语
         static function success($msg='',$url,$acc=true,$time="3")
       {

          Yii::$app->session->setFlash("alerts",['msg'=>$msg,"acc"=>$acc,'stae'=>1,"url"=>$url,"time"=>$time]);

        }
        //错误提示语
        static function error($msg,$acc=true,$time="3")
        {

          Yii::$app->session->setFlash("alerts",['msg'=>$msg,"acc"=>$acc,'stae'=>0,"url"=>"1","time"=>$time]);
        }

      }

 ?>
<?php 

 namespace backend\controllers;
 use Yii;
 use yii\filters\AccessControl;
 use yii\web\Controller;
 class AttrbuteController extends Controller
 {

 	    public $layout ="main";

 		public function actionAttrbutelist()
 		{
 				return $this->render("attrbutelist");
 		}

 		public function actionAttrbuteadd()
 		{
 				return $this->render("attrbuteadd");
 		}

 		public function actionGoodadd()
 		{
 				return $this->render("goodadd");
 		}

 		public function actionGoodadds()
 		{
 			    //echo "588";die;
 				return $this->render("goodadds");
 		}
 }


 ?>
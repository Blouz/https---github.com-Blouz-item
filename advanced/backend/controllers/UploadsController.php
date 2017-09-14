<?php 

  namespace backend\controllers;
  use yii;
  use common\models\UploadedForm;
  use backend\models\Admin;
  use yii\filters\AccessControl;
  use yii\web\Controller;
  use yii\web\UploadedFile;

  class UploadsController extends IndexController
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
  	 public function actionUpfile()
  	 {
      $username = Yii::$app->user->getIdentity();
  	 	$model = new UploadedForm;
      $model->username = $username;
  	 	$admin = new Admin;
  	 	$user = Admin::find()->where(["username"=>$username])->one();
      $user->setScenario('update');//定义场景
  	 	if(Yii::$app->request->isPost)
  	 	{
  	 		$img =  UploadedFile::getInstance($model, 'imageFile');
  	 		$model->imageFile =  $img;
            $path = $model->upload();
            $post = Yii::$app->request->post();
            unset($post['UploadedForm']);
            $post['Admin']['imgefile']= $path;
            if($user->load($post) && $user->validate())
           {
           	  $user->username = $post['Admin']['username'];
           	  $user->email = $post['Admin']['email'];
              if(!empty($post['Admin']['password_hash']))
              {
                 $user->setPassword($post['Admin']['password_hash']);
                 $user->generateAuthKey();
              }
              if(!is_null($model->imageFile))
              {
                  $user->imgefile = $post['Admin']['imgefile'];
              }
              $are = $user->save();
              if($are)
              {
              	$this->success("修改成功",['uploads'=>"upfile"]);
              }else
              {
				        $this->error("修改失败");
              }
          }

  	 	}
  	 	return $this->render("upfile",['model'=>$user,"img"=>$model]);
  	 }
  }
 ?>
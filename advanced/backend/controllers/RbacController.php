<?php 

namespace backend\controllers; 
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

  class RbacController extends IndexController
  {

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


  	  //创建权限
  	  public function actionPermission($name)
	{    
	    $auth = Yii::$app->authManager;    
	    $createPost = $auth->createPermission($name);    
	    $createPost->description = '创建了 ' . $name. ' 权限';    
	    $auth->add($createPost);
	}
	  //创建角色
	  public function actionCreateRole($name)
	{    
	    $auth = Yii::$app->authManager;    
	    $role = $auth->createRole($name);    
	    $role->description = '创建了 ' . $name. ' 角色';    
	    $auth->add($role);
	}
		//添加对应关系 
		public function actionAddChild($item = array())
	{   

	    $items['role'] = 'delete';
	    $items['permission'] = '经理';
	    $auth = Yii::$app->authManager;    
	    $parent = $auth->createRole($items['role']);                //创建角色对象
	    $child = $auth->createPermission($items['permission']);     //创建权限对象
	    $auth->addChild($parent, $child);                           //添加对应关系
	}
  }
 ?>
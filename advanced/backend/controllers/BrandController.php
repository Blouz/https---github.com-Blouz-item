<?php 

  namespace backend\controllers;
  use Yii;
  use yii\web\controller;
  use common\models\Brand;
  use yii\filters\VerbFilter;
  use yii\filters\AccessControl;
  use yii\data\Pagination;
  class BrandController extends IndexController
  {
  	  public $layout = "main";

       //AFC认证
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


      //显示
  	  public function actionList()
  	  {
         header("content-type:text/html;charset=utf-8");
         $keywords = Yii::$app->request->get("keywords");//搜索条件
         $keywords = empty($keywords) ? '' :$keywords;
         $emp = ['like','brand_name',$keywords];
         $data = Brand::find()->andWhere($emp)->andWhere(['status'=>'1']);
         $page = new Pagination([
          'defaultPageSize' =>5,
          'totalCount' =>$data->count(),
          ]);
         $info = $data->offset($page->offset)
         ->limit($page->limit)
         ->andWhere(['status'=>'1'])
         ->all();
  	  	 return $this->render("list",['page'=>$page,'info'=>$info,"keywords"=>$keywords]);
  	  }
      //添加
  	   public function actionAdd()
  	  {
        $assign = new Brand;
        if( Yii::$app->request->isPost)
        {
          $post =  Yii::$app->request->post(); 
          if($assign->load($post) && $assign->validate())
          {
            $are = $assign->save();
            if($are)
            {
              // $this->redirect(['list']);
             $this->success("添加成功",['brand'=>'list']);
            }else
            {
              $this->error("添加失败");
            }
          }
        } 
        return $this->render("add",["assign"=>$assign]);
  	  }
      //删除
      public function actionDelete()
      {
            $id =  Yii::$app->request->get("id"); 
            $user = Brand::find()->where(["brand_id"=>$id])->one();
            $user ->status = '0';
            $user ->save();
            if($user)
            {
               return $this->redirect(['list']);
            }    
      }
      //修改
      public function actionSave()
      {
         header("content-type:text/html;charset=utf-8"); 
         $id = Yii::$app->request->get("id");
         $assign = Brand::find()->where(["brand_id"=>$id])->one();
         if( Yii::$app->request->isPost)
         {
            $post =  Yii::$app->request->post();
            if($assign->load($post) && $assign->validate())
          {
              $are = $assign->save();
              if($are)
              {
                  $this->success('修改成功',['brand'=>'list']);
              }
          }else
          {
              $this->error('修改失败');
          }
        }
              return $this->render("save",['assign'=>$assign]);
          
      }
     
  
  }

 ?>
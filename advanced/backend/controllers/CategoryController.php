<?php 

  namespace backend\controllers;
  use yii;
  use common\models\Category;
  use yii\filters\AccessControl;
  use yii\web\Controller;
  class CategoryController extends IndexController
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
      //分类添加
  		public function actionType()
  		{
        header("content-type:text/html;charset=utf-8");
  			$assign = new Category;
        $data = $assign->find()->asArray()->all();
        $add =  $this->recursive($data);
        $tier = $this->tierlist($add);
        if(Yii::$app->request->isPost)
        {
          $post =  Yii::$app->request->post();

          if($assign->load($post) && $assign->validate())
          {   
              $are = $assign->save();
              if($are)
              {
                $this->success("Categort Add Ok",['category'=>'list']);
              }else{
                $this->error("Categort Add No");
              }
          }
        }
  			return $this->render("type",['assign'=>$assign,"data"=>$tier]);
  		}


       //分类修改 
       public function actionSave($id)
       {
           header("content-type:text/html;charset=utf-8");
           $result = Category::findOne($id);
           $add =  $this->recursive(Category::find()->asArray()->all(),$parent="0",$sum="0",$id);
           $tier = $this->tierlist($add);
           if(Yii::$app->request->isPost)
           {
               if($result->load(Yii::$app->request->post()) && $result->validate())
               {
                  $saveyes = $result->save();
                  if($saveyes)
                  {
                    $this->success("Categort Save Ok",['category'=>'list']);
                  }else{
                    $this->error("Categort Save No");
                  }
               }
           }
           return $this->render("save",['assign'=>$result,"data"=>$tier]);
       }

      ///分类删除判断是否有子类
       public function actionRemove($id)
       {
          $del = Category::find()->where(['parent_id'=>$id])->all();
          if(sizeof($del) == '0')
          {
              $rom = Category::find()->where(['cat_id'=>$id])->one();
              $rom->delete();
              if($rom)
              {
                $this->success("Categort Remove Ok",['category'=>'list']);
              }else{
                $this->error("Categort Remove No");
              }
          }else
          {
               $this->error("所属分类下有子类!请勿删除");
          }
            $this->redirect(['category/list']);
       }


      //categorylist
      public function actionList()
      {
          header("content-type:text/html;charset=utf-8");
          $model = new Category;
          $data = $model->find()->asArray()->all();
          $add =  $this->recursive($data);
          return $this->render("list",['add'=>$add]);

      }

        //处理分类层级
        protected function tierlist($data)
        {
             $arr = [];
             foreach ($data as $key => $value) {
                  $arr[$value['cat_id']] = str_repeat("　",$value['sum']).$value['cat_name'];
             }
             return  $arr;
        }



       //递归查询处理分类
       protected function recursive($data,$parent="0",$sum="0",$id="")
      {
            static $arr= [];
            foreach ($data as $key => $value) {
                if($value['parent_id'] == $parent && $value['cat_id'] !=$id )
                {
                   $value['sum'] = $sum;
                   $arr[] = $value;
                   $this->recursive($data,$value['cat_id'],$sum+1,$id);
                }
            }
            return $arr;
      }

  }


 ?>
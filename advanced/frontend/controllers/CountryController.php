<?php 
	namespace frontend\controllers;
	use frontend\models\Country;
	use yii\web\Controller;
	use yii\data\Pagination;

	class CountryController extends controller
	{
		 public function actionIndex()
		 {
		 	$data =  Country::find();
		 	$page = new Pagination([
		 		 'defaultPageSize' =>5,
		 		 'totalCount' =>$data->count(),
		 		]);
		 	$info = $data->offset($page->offset)
		 		->limit($page->limit)
		 		->all();
		 	return  $this->render( "index",['page'=>$page,'info'=>$info]);	
		 }
	}

 ?>
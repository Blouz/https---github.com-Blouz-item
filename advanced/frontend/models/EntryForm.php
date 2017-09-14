<?php 

 /**
 * Blouz
 */
	namespace frontend\models;
	use yii\base\model;

	 class EntryForm extends model
	 {
	 	  public $name;
	 	  public $email;
	 	  public $pwd;
	 	  public function rules()
	 	  {
	 	  	return[

		 	  	[['name','email','pwd'], 'required'],
		 	  	['email' , 'email'],
	            ['pwd', 'string', 'min' => 3],
	            ['name', 'string', 'min' => 2 , "max"=>255],
	 	  	];
	 	  }

	 }

 ?>
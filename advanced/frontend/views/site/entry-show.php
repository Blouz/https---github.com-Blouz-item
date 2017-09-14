<?php 
/*
	 name:Zhao Yu
	 hobby:吃饭睡觉打豆豆

 */ 
use yii\helpers\Html;

 ?>
 <ul>
 	   <li><label>Name</la	bel>: <?= Html::encode($model->name) ?></li>
 	   <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
 	   <li><label>Pwd</label>: <?= Html::encode($model->pwd) ?></li>
 </ul>
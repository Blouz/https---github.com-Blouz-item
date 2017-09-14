<?php 
/*
	 name:Zhao Yu
	 hobby:吃饭睡觉打豆豆

 */
	 use yii\helpers\Html;
	 use yii\widgets\LinkPager;
 ?>
 <ul>
 	<?php  foreach($info as $val): ?>
 	   <li><?= Html::encode("{$val->name} ({$val->code}) {$val->population}") ?></li>
 	<?php endforeach ?>
 </ul>
 <?= LinkPager::widget(['pagination'=>$page]) ?>
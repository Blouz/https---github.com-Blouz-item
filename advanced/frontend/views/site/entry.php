<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
<?php $form = ActiveForm::begin(); ?>
		
		<?= $form->field($model,'name')->textInput() ?>
		<?= $form->field($model,'email')->textInput() ?>
		<?= $form->field($model,'pwd')->passwordInput() ?>
		<?= Html::submitButton("提交",['class'=>'btn btn-primary']) ?>

<?php  ActiveForm::end(); ?>
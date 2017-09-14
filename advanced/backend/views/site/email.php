<?php 

   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\bootstrap\ActiveForm;
 ?>

    <div class="row-fluid login-wrapper">
        <a class="brand" href="index.html"></a>

        <div class="span4 box">
            <div class="content-wrap">
            <?= $this->render("/common/message"); ?>
                <h6>必应商城 - 找回管理密码</h6>
                <?php $form = ActiveForm::begin(['id' => 'login-form',"action"=>"getemail"]); ?>
                 <?= $form->field($model, 'email')->textInput(["class"=>"span12","placeholder"=>"管理员Email"])->label("") ?>
                <a href="<?= Url::to(['site/login']) ?>" class="forgot">去登录?</a>
                   <?= Html::submitButton('发送', ['class' => 'btn-glow primary login', 'name' => '发送Email']) ?>
                   <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
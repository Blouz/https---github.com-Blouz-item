 <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="row-fluid login-wrapper">
        <a class="brand" href="index.html"></a>

        <div class="span4 box">
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="content-wrap">
                <h6>必应商城 - 后台管理</h6>
          
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,"class"=>"span12","placeholder"=>"请输入账号"])->label("") ?>
            <?= $form->field($model, 'password')->passwordInput(["class"=>"span12","placeholder"=>"请输入密码"])->label("") ?>
            <a href="<?= Url::to(['site/email'])?>" class="forgot">忘记密码?</a>
            <div class="remember">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>  
            </div>
             <?= Html::submitButton('Login', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>
            </div> 
              <?php ActiveForm::end(); ?>
        </div>

        <div class="span4 no-account">
            <p>没有账户?</p>
            <a href="signup.html">注册</a>
        </div>
    </div>

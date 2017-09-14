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
            <?= $this->render("/common/message"); ?>
                <h6>必应商城 - 密码找回修改</h6>
          
            <?= $form->field($model, 'password_hash')->textInput(["class"=>"span12","placeholder"=>"请输入修改密码"])->label("") ?>
            <?= $form->field($model, 'password_tow')->textInput(["class"=>"span12","placeholder"=>"请输入确认密码"])->label("") ?>

            <div class="remember">
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

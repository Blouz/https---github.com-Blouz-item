<?php 
    
      use yii\widgets\ActiveForm;
      use yii\helpers\Html;

 ?>
  <div class="content wide-content">
        <div class="container-fluid">
            <div class="settings-wrapper" id="pad-wrapper">
                <!-- avatar column -->
                <div class="span3 avatar-box">
                 <?php  $form = ActiveForm::begin(['options'=>['multipart/form-data']]) ?>
                    <div class="personal-image">
                        <img src="<?= $model['imgefile'] ?>" height="90px"  width="120px" class="avatar img-circle" />
                        <p>上传您的头像...</p>
                        
                         <?= $form->field($img, 'imageFile')->fileInput() ?>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="span7 personal-info">
                  <?= $this->render("/common/message"); ?>
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>您可以在这里编辑您的个人信息
                    </div>
                    <h5 class="personal-title">个人信息</h5>

                    <form />
                            <div class="field-box">
                            <label>用户名:</label>
                             <?= $form->field($model,"username")->textInput()->label("")  ?>
                        </div>
                        <div class="field-box">
                            <label>电子邮箱:</label>
                            <?= $form->field($model,"email")->textInput()->label("")  ?>
                        <div class="field-box">
                            <label>密码:</label>
                             <?= $form->field($model,"password_hash")->passwordInput(['value'=>"","placeholder"=>"密码不写则不修改"])->label("")  ?>
                        </div>
                        <div class="span6 field-box actions">
                        <?= HTML::submitButton("Create Addfile",['class'=>"btn-glow primary"]) ?>
                            
                            <span>或者</span>
                            <input type="reset" value="取消" class="reset" />
                        </div>
                 <?php  ActiveForm::end() ?>

                </div>
            </div>
        </div>
    </div>
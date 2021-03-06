<?php 
/*
 * Created by 
 * User : Zhao Yu
 * Hobby: 吃饭睡觉打豆豆
 */ 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
     <div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>添加新品牌</h3>
                </div>
                <?= $this->render("/common/message"); ?>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                        <?php $form = ActiveForm::begin(['options'=>['class'=>"new_user_form inline-input"]]); ?>

                            <?= $form->field($assign,"brand_name")->textInput()  ?>

                            <?= $form->field($assign,"brand_logo")->textInput() ?>

                            <?= $form->field($assign,"brand_desc")->textarea(['rows'=>5,"clow"=>5]) ?>

                            <?= $form->field($assign,"site_url")->textInput() ?>

                            <?= $form->field($assign,"sort")->textInput()?>

                            <?= $form->field($assign,"is_show")->radioList(["1"=>"是","0"=>"否"])?>
                                <div class="span11 field-box actions">
                           
                                    <?= HTML::submitButton("Create user",['class'=>"btn-glow primary"]) ?>
                                    <span>OR</span>
                                    <?= HTML::resetButton("Cancel",['class'=>"reset"]) ?>
            
                                </div>
                              <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                        </div>
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            点击上面看到内联和正常输入表单上的区别
                        </div>                        
                        <h6>侧边栏文本说明</h6>
                        <p>排序：排序越小越靠前</p>
                        <p>选择下列快速通道:</p>
                        <ul>
                            <li><a href="#">品牌列表</a></li>
                            <li><a href="#">分类列表</a></li>
                            <li><a href="#"发布商品</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
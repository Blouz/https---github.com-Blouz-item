<?php 
/*
 * Created by 
 * User : Zhao Yu
 * Hobby: 吃饭睡觉打豆豆
 */ 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
 ?>
     <div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>添加分类</h3>
                </div>
             <?= $this->render("/common/message"); ?>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                        <?php $form = ActiveForm::begin(['fieldConfig' => [
                        'template'=>'<div class="span12 field-box">{label}{input}{error}{hint}</div>'],
                        'options' => ['class' => 'new_user_form inline-input', 
                        'enctype' => 'multipart/form-data'] ]); ?>

                               <?= $form->field($assign,"parent_id")->dropDownList($data,['prompt'=>'顶级分类'])?>
                               
                               <?= $form->field($assign,"cat_name")->textInput() ?>

                               <?= $form->field($assign,"sort")->textInput() ?>

                               <?= $form->field($assign,"is_nav")->radioList(["1"=>"是","0"=>"否"])?>

                               <?= $form->field($assign,"is_show")->radioList(["1"=>"是","0"=>"否"])?>

                                <div class="span11 field-box actions">
                           
                                    <?= HTML::submitButton("Create Cat",['class'=>"btn-glow primary"]) ?>
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
                            <li><?= Html::a('分类列表',['category/list']) ?></li>
                            <li><a href="#"发布商品</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
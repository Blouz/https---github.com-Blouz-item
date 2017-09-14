<?php 

     use yii\helpers\Url;
     use yii\helpers\Html;
     use yii\widgets\LinkPager;
 ?>

 <div class="content">
      
        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>品牌列表</h3>
                    <div class="span10 pull-right">
                        <?= Html::beginForm(['brand/list'],'get')?>
                        <input type="text" value="<?= $keywords ?>" class="span5 search" name="keywords" placeholder="Type a user's name..." />
                        
                        <div class="ui-dropdown">
                           <?= HTML::submitButton("Search",['class'=>"btn btn btn-success"]) ?>
                         
                        </div>
                        <?php  Html::endForm(); ?>
                        <a href="<?= Url::to(['brand/add'])?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            添加新品牌
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    品牌名/简短描述
                                </th>

                                <th class="span2 sortable">
                                    <span class="line"></span>排序
                                </th>                                
                                <th class="span2 sortable">
                                    <span class="line"></span>是否展示
                                </th>                                                                                                
                                <th class="span3 sortable align-right">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        <!-- row -->
                          <?php  foreach($info as $val): ?>
                        <tr class="first">
                          
                            <td>
                                <img src="/statics/img/contact-img.png" class="img-circle avatar thumbnail hidden-phone" />
                                <a href="user-profile.html" class="name"><?= Html::encode("{$val->brand_name}") ?></a>
                                <span class="subtext"><?= Html::encode("{$val->brand_desc}") ?></span>
                            </td>
                            <td><?= Html::encode("{$val->sort}") ?></td>
                            <td>
                              <?= ($val['is_show']) ?'<span class="btn btn-success">是<span>':'<span class="btn btn-primary">否<span>'; ?>
                            </td>
                            <td class="align-right">
                                <?= Html::a("修改",['save',"id"=> Html::encode("{$val->brand_id}")]) ?> | 
                                <?= Html::a("回收站",['delete','id'=> Html::encode("{$val->brand_id}") ])?>
                            </td>
                        </tr> 
                        </tr>
                           <?php endforeach ?>
                        <!-- row -->                                       

                        </tbody>
                    </table>

                </div>

                <div class="pagination pull-right">
                    <ul>
                        <li><?= LinkPager::widget(['pagination'=>$page]) ?></li>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>
    </div>


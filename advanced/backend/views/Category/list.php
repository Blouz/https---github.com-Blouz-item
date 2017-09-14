<?php 
	use yii\helpers\Url;
  	use yii\helpers\Html;
 ?>
  <div class="content">
      
        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>品牌列表</h3>
                    <div class="span10 pull-right">
                        <input type="text" class="span5 search" placeholder="Type a user's name..." />
                        
                        <div class="ui-dropdown">
                            <button class="btn">Search</button>
                        </div>
    
                        <a href="<?= Url::to(['category/type']) ?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            添加分类
                        </a>
                    </div>
                </div>
                <?= $this->render("/common/message"); ?>
                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    分类简单显示
                                </th>

                                <th class="span2 sortable">
                                    <span class="line"></span>是否后台展示
                                </th>                                
                                <th class="span2 sortable">
                                    <span class="line"></span>是否前台展示
                                </th>                                                                                                
                                <th class="span3 sortable align-right">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
						<?php  foreach($add as $val): ?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <a href="user-profile.html" class="name"><?= Html::encode(str_repeat("　", $val['sum']))?><?= Html::encode($val['cat_name']) ?></a>     
                            </td>
                            <td>
                              <?= $val['is_nav'] == 1?'<span class="btn btn-success">是</span>':'<span class="btn btn-primary">否</span>'; ?>
          
                            </td>

                            <td>
                                <?= $val['is_show'] == 1?'<span class="btn btn-success">是</span>':'<span class="btn btn-primary">否</span>'; ?>
                            </td>
                            <td class="align-right">
                                <a href="<?= Url::to(['category/save',"id"=>$val['cat_id']])?>">修改</a> | 
                                <a href="<?= Url::to(['category/remove',"id"=>$val['cat_id']]) ?>">回收站</a>
                            </td>
                        </tr>
                        <!-- row -->
                              <?php  endforeach ?>         
                        </tbody>
                    </table>
                </div>
                <div class="pagination pull-right">
                    <ul>
                        <li><a href="#">&#8249;</a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&#8250;</a></li>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>
    </div>
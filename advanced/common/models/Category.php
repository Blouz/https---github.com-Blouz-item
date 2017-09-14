<?php 

	namespace common\models;
	use yii\db\ActiveRecord;
	class Category extends ActiveRecord
	{

        public function rules()
          {
            return[

                [['cat_name',"sort","is_nav","is_show"],'required'],
                ["parent_id","default","value"=>"0"],
                ['cat_name', 'string', 'min' => 1],
            ];
          }



	  public function attributeLabels()
        {
        return [
            'cat_id' => 'ID',
            'cat_name' => '分类名称',
            'parent_id' => '顶级分类',
            'sort' => '排序',
            'is_nav' => '前台是否显示',
            'is_show' => '后台是否显示',
            'filter_attr'=>'看不懂'
             ];
   		 }
         
	}

 ?>
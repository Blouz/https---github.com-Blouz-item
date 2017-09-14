<?php 

 	namespace common\models;
	use yii\db\ActiveRecord;
	class Brand extends ActiveRecord
	{
	  public function attributeLabels()
        {
        return [
            'brand_id' => 'ID',
            'brand_name' => '品牌名称',
            'brand_logo' => '品牌LOGO',
            'brand_desc' => '品牌描述',
            'site_url' => '品牌链接',
            'sort' => '排序',
            'is_show' => '是否显示',
             ];
   		 }
   		   public function rules()
	 	  {
	 	  	return[

		 	  	[['brand_name','brand_logo','brand_desc',"site_url","sort","is_show"], 'required'],
	            ['brand_name', 'string', 'min' => 1],
	 	  	];
	 	  }
	}

 ?>
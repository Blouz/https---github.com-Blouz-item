<?php 
	namespace common\models;
	use yii\base\Model;
	use yii\web\UploadedFile;
	use yii;

	class UploadedForm extends Model
	{
		  public $imageFile;
		  public $link;
		  public $username;
		  const URL = "uploads/";
		  protected $url;

		 public function rules()
		 {
		 	return [
		 		[['imageFile'],"file","skipOnEmpty"=>false,'extensions' => 'png, jpg'],
		 	 ];	
		 
		 }
		
		 public function upload()
		 {
		 	//判断是否上传图片没上传则不运行
		 	if(!is_null($this->imageFile))
		 	{
				if($this->validate()) {
			    $this->url = self::URL.$this->username['username']."/";
			    $this->link = date("Ymdhis",time());
			    $path = $this->url . $this->link . '.' . $this->imageFile->extension;
			    $this->delsvndir($this->url);
			    if(!file_exists($this->url))
			    {
			    	mkdir($this->url,777,true);
			    }
	            $this->imageFile->saveAs($path);
	                return "/".$path;
		        } else {
		            return false;
		        }
		 	}
		 	
		 }
		protected function delsvndir($svndir){
		    //先删除目录下的文件：
		    if(is_dir($svndir))
		    { 
		     if($dh = opendir($svndir))
		     {
		      while($file=readdir($dh)){
	          if($file!="."&& $file!=".."){
	            $fullpath= $svndir.$file;
	            if(is_dir($fullpath)){
	                delsvndir($fullpath);
	            }else{
                    unlink($fullpath);
             }
           } 
         }  
      }
    }
  }


}

 ?>
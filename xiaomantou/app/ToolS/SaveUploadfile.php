<?php

namespace App\ToolS;
use App\ToolS\Strgs;
use Gregwar\Image\Image;
use Illuminate\Database\Eloquent\Model;

class SaveUploadfile
{ 
   	/**
   	 * 保存文件
   	 */
   	public function savefile($data){

    		$filename=md5(Strgs::randomstr());	//文件名

    		$path='data/upload' . '/' . $data["dirname"] .'/' .$this->datedir(); //全地址
    		
    		$imgbase=$data["imgbase"];

    		if(!is_dir($path)){
    		    mkdir($path,0777,true);
    		}
        
    		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgbase, $result)){
    		   $fullpath = $path.$filename.".".$result[2];
    		   $fullfilename=$this->datedir().$filename.".".$result[2];
    		   
    		   //64位解码保存
    		   //file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgbase)));
    		  
    		   /*****文件编码保存*******/
    		   if(file_put_contents($fullpath, file_get_contents($imgbase))){
    			    if(1==$data["type"]){
    			    	self::picZoom($fullpath,600);
    	        }
    		   		return ["staus"=>1,"name"=>$fullfilename,"fullpath"=>$fullpath];
    		   }else{
    		   		return ["staus"=>0,"name"=>"失败"];
    		   }   
    		}
   }

   	/**
   	 * 返回日期目录
   	 */
   	protected function datedir(){
   		   return date('ym/d/');
   	}


   	/**
   	 * 图片缩放
   	 */
	static function picZoom($path,$zoom=600){
		    $imageInfo=getimagesize($path);
            $width=$imageInfo[0];
            $height=$imageInfo[1];

            if($width > $height) {
                if($width > $zoom) {
                    $height = round($height *= $zoom / $width);
                    $width = $zoom;
                }
            }else{
                if($height > $zoom) {
                    $width = round($width *= $zoom / $height);
                    $height = $zoom;
                }
            }
            Image::open($path)
                ->resize($width, $height)
                //取反面
                //->negate()
                ->save($path);
	}

}

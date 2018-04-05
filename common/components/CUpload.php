<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);
//https://github.com/yurkinx/yii2-image

class CUpload extends Component
{
	public $name=NULL;
	public $isUpload=false;

	private $_folder=NULL;
	private $_baseFolder=NULL;

	private $_folderFile=NULL;
	private $_baseFolderFile=NULL;

	private $_folderMedia=NULL;
	private $_baseFolderMedia=NULL;

	private $_typeImageFile=['jpg', 'jpeg', 'png', 'gif'];
	private $_typeMediaFile=['mp3', 'mp4', 'wmv', 'mpeg'];
	private $_typeDocFile=['pdf','doc','docx','ppt','pptx'];

	public function init()
	{
		$this->checkFolder();
	}

	public function upload($fileInstrant)
	{
		$type = strtolower($fileInstrant->extension);
		$name = $this->genName().'.'.$fileInstrant->extension;
		$status = false;

		if(in_array($type, $this->_typeImageFile)){
			if($fileInstrant->saveAs( $this->_baseFolder.'/'.$name )){
				$this->name = $this->_folder.'/'.$name;
				$status = true;
			}
		}else if(in_array($type, $this->_typeMediaFile)){
			if($fileInstrant->saveAs( $this->_baseFolderMedia.'/'.$name )){
				$this->name = $this->_folderMedia.'/'.$name;
				$status = true;
			}
		}else if(in_array($type, $this->_typeDocFile)){
			if($fileInstrant->saveAs( $this->_baseFolderFile.'/'.$name )){
					$this->name = $this->_folderFile.'/'.$name;
					$status = true;
			}
		}

		$this->isUpload = $status;
		return $this;
	}

	public function download($file){
		$filePath =	'../'.Yii::getAlias('@uploads').'/'.$file;
	  	Yii::$app->response->sendFile($filePath);
	}

	public function getFile($filename, $isBasePath=false)
	{
		$base = $this->getLocal(true).'uploads';
		$ischeck = $this->getLocal().'uploads/';
		if($filename != '' && is_file($ischeck.$filename)){
			if($isBasePath == true){
				return $ischeck.$filename;
			}else{
				return $base.'/'.$filename;
			}
		}else{
			return $this->getLocal(true).'images/no-image.jpg';
		}
	}
	public function getFileFreedom($filename, $isBasePath=false)
	{
		$base = $this->getLocal(true).'uploads';
		$ischeck = $this->getLocal().'uploads/';
		if($filename != '' && is_file($ischeck.$filename)){
			if($isBasePath == true){
				return $ischeck.$filename;
			}else{
				return $base.'/'.$filename;
			}
		}else{
			return $this->getLocal(true).'images/no-image.jpg';
		}
	}

	public function getFiles_test($filename)
	{
		$base = $this->getLocal().'uploads';
		$_file = Yii::$app->image->load( $base.'/'.$filename );
		return $_file->resize(50, 50)->save();
	}

	private function checkFolder()
	{
		$base = $this->getLocal();
		if (!file_exists($baseUpload = $base.'uploads')) {
		    @mkdir($baseUpload, 0777, true);
		}

		$this->_folder = date('Y-m');
		if(!file_exists($this->_baseFolder = $baseUpload.'/'.$this->_folder)){
			@mkdir($this->_baseFolder, 0777, true);
		}

		$this->_folderFile = 'files';
		if(!file_exists($this->_baseFolderFile = $baseUpload.'/'.$this->_folderFile)){
			@mkdir($this->_baseFolderFile, 0777, true);
		}

		$this->_folderMedia = 'media';
		if(!file_exists($this->_baseFolderMedia = $baseUpload.'/'.$this->_folderMedia)){
			@mkdir($this->_baseFolderMedia, 0777, true);
		}
	}

	private function getLocal($url=false)
	{
		if($url == false){
			$path = Yii::getAlias('@webroot');
			if(strpos($path, 'admin') !== false){
				$path = str_replace('admin', '', $path);
			}
		}else{
			$path = 'http://'.$_SERVER['HTTP_HOST'].Yii::$app->request->getBaseUrl(true);
			if(strpos($path, 'admin') !== false){
				$path = str_replace('admin', '', $path);
			}
		}

		return trim($path, '/').'/';
	}

	private function genName()
	{
		return time().'-'.$this->randomString().'-'.$this->randomString();
	}

	private function randomString()
	{
		$len = 5;
		$result = "";
	    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	    $charArray = str_split($chars);
	    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		    $result .= "".$charArray[$randItem];
	    }
	    return $result;
	}
}

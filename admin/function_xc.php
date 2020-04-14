<?php
function upload($uploadName,$path,$maxSize = 50000000000, $allowMime=['image/jpeg','image/png','image/gif','image/jpg'],$allowType=['jpeg','jpg','png','gif']){
	$fileInfo = $_FILES[$uploadName];
	//当前的错误。
	$error = $fileInfo['error'];
	//判断有没有错误号
	switch($error){
		case 1:
			//return '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ';
			return false;
		break;
		case 2:
			//return '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 ';
			return false;
		break;
		case 3:
			//return '文件只有部分被上传。';
			return false;
		break;
		case 4:
			//return '没有文件被上传。 ';
			return false;
		break;
		case 6:
			//return '找不到临时文件夹。';
			return false;
		break;
		case 7:
			//return '文件写入失败。';
			return false;
		break;
	}
	//判断大小
	$fileSize = $fileInfo['size'];

	if ($fileSize > $maxSize) {
		//return "文件太大了";
		return false;
	}
	//判断MIME类型
	$fileMime = $fileInfo['type'];

	if (!in_array($fileMime,$allowMime)) {
		//return "MIME类型不符";
		return false;
	}

	//判断后缀名
	$extenTmp = explode('.',$fileInfo['name']);
	$extenType = array_pop($extenTmp);

	if (!in_array($extenType,$allowType)) {
		//return "不允许的后缀名";
		return false;
	}

	//判断是否是通过HTTPPOST上传的
	$tmpName = $fileInfo['tmp_name'];
	if(is_uploaded_file($tmpName)){
		$newFileName = date('y-m-dhis').'.'.$extenType;
		//return move_uploaded_file($tmpName,'./'.$newFileName);
		if (move_uploaded_file($tmpName,'./'.$path.'/'.$newFileName)) {
			return $newFileName;
		} else {
			return false;
		}
	} else{
		//return "滚犊子！";
		return false;
	}
	
}
?>
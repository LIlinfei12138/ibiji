<?php
function upload($uploadName,$path,$maxSize = 50000000000, $allowMime=['image/jpeg','image/png','image/gif','image/jpg'],$allowType=['jpeg','jpg','png','gif']){
	$fileInfo = $_FILES[$uploadName];
	//��ǰ�Ĵ���
	$error = $fileInfo['error'];
	//�ж���û�д����
	switch($error){
		case 1:
			//return '�ϴ����ļ������� php.ini �� upload_max_filesize ѡ�����Ƶ�ֵ�� ';
			return false;
		break;
		case 2:
			//return '�ϴ��ļ��Ĵ�С������ HTML ���� MAX_FILE_SIZE ѡ��ָ����ֵ�� ';
			return false;
		break;
		case 3:
			//return '�ļ�ֻ�в��ֱ��ϴ���';
			return false;
		break;
		case 4:
			//return 'û���ļ����ϴ��� ';
			return false;
		break;
		case 6:
			//return '�Ҳ�����ʱ�ļ��С�';
			return false;
		break;
		case 7:
			//return '�ļ�д��ʧ�ܡ�';
			return false;
		break;
	}
	//�жϴ�С
	$fileSize = $fileInfo['size'];

	if ($fileSize > $maxSize) {
		//return "�ļ�̫����";
		return false;
	}
	//�ж�MIME����
	$fileMime = $fileInfo['type'];

	if (!in_array($fileMime,$allowMime)) {
		//return "MIME���Ͳ���";
		return false;
	}

	//�жϺ�׺��
	$extenTmp = explode('.',$fileInfo['name']);
	$extenType = array_pop($extenTmp);

	if (!in_array($extenType,$allowType)) {
		//return "������ĺ�׺��";
		return false;
	}

	//�ж��Ƿ���ͨ��HTTPPOST�ϴ���
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
		//return "�����ӣ�";
		return false;
	}
	
}
?>
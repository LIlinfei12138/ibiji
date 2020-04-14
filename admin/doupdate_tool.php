<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if(!strlen(trim($_POST['toolName'])) > 0 || !strlen(trim($_POST['toolDetails']))> 0) {
		header("location:./update_article.php");
		exit;
	}
		$time=time();
		$id=$_POST['id'];//获取数据
		$SQL2="select thun from tools where id={$id}";
		$res2=mysqli_query($con,$SQL2);
		$row2=mysqli_fetch_assoc($res2);
		$deleFile=$row2['thun'];
		$photoName = upload('photofile','./data');//文件名
		$toolName=$_POST['toolName'];//软件名字
		$toolLang=$_POST['toolLang'];//软件语言
		$downloadURL=$_POST['downloadURL'];//官方下载
		$officialURL=$_POST['officialURL'];//软件官方
		$docURL=$_POST['docURL'];//软件文档
		$toolIntro=$_POST['toolIntro'];//软件简介
		$toolDetails=$_POST['toolDetails'];//软件详情
		$cid=$_POST['cid'];
		// //////////////////////////////////////////
		if (strlen($_FILES['photofile']['name']) > 0){
		unlink("./data/{$deleFile}");
		//////////////////////////////////////////////////////
		$SQL="update tools set name='{$toolName}',thun='{$deleFile}',summary='{$toolIntro}',content='{$toolDetails}',time={$time},lang='{$toolLang}',downloadURL='{$downloadURL}',officialURL='{$officialURL}',docURL='{$docURL}',cid={$cid} where id={$id}";
		echo $SQL;
		$res=mysqli_query($con,$SQL);
		$tmp=mysqli_affected_rows($con);
	 if ($tmp > 0){
			header("location:./manage_tool.php?id={$cid}");
		 }else{
			header("location:./update_tool.php");
		 }
	} else{
			$SQL2="update tools set name='{$toolName}',summary='{$toolIntro}',content='{$toolDetails}',time={$time},lang='{$toolLang}',downloadURL='{$downloadURL}',officialURL='{$officialURL}',docURL='{$docURL}',cid={$cid} where id={$id}";
			$res2=mysqli_query($con,$SQL2);
			$tmp2=mysqli_affected_rows($con);
			echo $SQL2;
		if ($tmp2 > 0){
				header("location:./manage_tool.php?id={$cid}");
			}else{
				header("location:./update_tool.php");
			}
		}
		mysqli_close($con);
?>
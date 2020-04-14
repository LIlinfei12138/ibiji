<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if (!strlen(trim($_POST['toolName'])) > 0 || !strlen(trim($_POST['toolDetails']))> 0) {
		header("location:./add_tools.php");
		exit;
	}
	if($photoName = upload('photofile','./data')){
	$time=time();
	$cid=$_POST['cid'];//属于那个类
	$toolName=$_POST['toolName'];//软件名字
	$toolLang=$_POST['toolLang'];//软件语言
	$downloadURL=$_POST['downloadURL'];//官方下载
	$officialURL=$_POST['officialURL'];//软件官方
	$docURL=$_POST['docURL'];//软件文档
	$toolIntro=$_POST['toolIntro'];//软件简介
	$toolDetails=$_POST['toolDetails'];//软件详情
	$SQL="insert into tools (thun,name,summary,content,time,lang,downloadURL,officialURL,docURL,cid) values('{$photoName}','{$toolName}','{$toolIntro}','{$toolDetails}',{$time},'{$toolLang}','{$downloadURL}','{$officialURL}','{$docURL}',{$cid})";
	mysqli_query($con,$SQL);
		$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./manage_tool.php?id={$cid}");
	}else{
		header("location:./add_tools.php");
	}
	} else{
		header("location:./add_tools.php");
	}
		mysqli_close($con);
?>
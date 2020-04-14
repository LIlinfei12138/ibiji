<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if(!strlen(trim($_POST['series'])) > 0 || !strlen(trim($_POST['nandu']))> 0) {
		header("location:./update_series.php");
		exit;
	}
	$oldCid=$_POST['oldCid'];//原来的cid
	$id=$_POST['id'];//获取数据
	$time=time();//获取时间
	$cid=$_POST['cid'];//获取要改的cid
	$series=$_POST['series'];//获取名字
	$nandu=$_POST['nandu'];//获取难度
	$jianjie=$_POST['jianjie'];//获取数据
	$SQL2="select thun from sets where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$deleFile=$row2['thun'];
	$photoName = upload('photofile','./data');
	//////////////////////////////////////////////////////
	if (strlen($_FILES['photofile']['name']) > 0){
	unlink("./data/{$deleFile}");
	//////////////////////////////////////////////////////
	$SQL="update sets set name='{$series}',summary='{$jianjie}',ptime={$time},ilevel={$nandu},cid={$cid},thun='{$photoName}' where id={$id}";
	$res=mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./main_message.php");
	}else{
		header("location:./update_series.php");
	}
	} else{
		$SQL="update sets set name='{$series}',summary='{$jianjie}',ptime={$time},ilevel={$nandu},cid={$cid} where id={$id}";
	$res=mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./main_message.php");
	}else{
		header("location:./update_series.php");
	}
	}
	mysqli_close($con);
?>
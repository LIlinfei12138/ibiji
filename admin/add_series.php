<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();

	if(!strlen(trim($_POST['series'])) > 0 || !strlen(trim($_POST['nandu']))> 0 || !strlen(trim($_FILES['photofile']['name'])) > 0) {
		header("location:./main_info.php");
		exit;
	}
	if($photoName = upload("photofile",'./data')){
	$time=time();
	$cid=$_POST['cid'];
	$series=$_POST['series'];
	$nandu=$_POST['nandu'];
	$jianjie=$_POST['jianjie'];
	$SQL="insert into sets (name,summary,ptime,ilevel,cid,thun) values('{$series}','{$jianjie}',{$time},{$nandu},{$cid},'{$photoName}')";
	mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./main_message.php");
	}else{
		header("location:./main_info.html");
	}
	} else{
		header("location:./main_info.html");
	}
		mysqli_close($con);
?>
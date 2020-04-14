<?php
	require "./function.php";
	settime();
	$con=dbset();
	$userName=$_POST['userName'];
	$passWord=$_POST['passWord'];
	if (!strlen(trim($userName)) > 0 || !strlen(trim($passWord)) > 0){
		header("location:./index.php");
		exit;
	}
		if ($userName =='ibiji' && $passWord='lxc1118'){
			header("location:./index_old.html?userName={$userName}");
		} else{
			header("location:./index.php");
		}
?>
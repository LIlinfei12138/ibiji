<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$SQL1="select count(*) as count from sets where cid='{$id}'";
	if(mysqli_fetch_assoc(mysqli_query($con,$SQL1))['count'] > 0){	
		header('location:./main_list.php');
		exit;
	}
	$SQL2="delete from setCategory where id='{$id}'";
	mysqli_query($con,$SQL2);
	header('location:./main_list.php');
	mysqli_close($con);
?>
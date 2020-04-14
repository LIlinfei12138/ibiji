<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$SQL1="select count(*) as count from tools where cid='{$id}'";
	if(mysqli_fetch_assoc(mysqli_query($con,$SQL1))['count'] > 0){	
		header('location:./manage_tool_sort.php');
		exit;
	}
	$SQL2="delete from toolCategory where id='{$id}'";
	mysqli_query($con,$SQL2);
	header('location:./manage_tool_sort.php');
	mysqli_close($con);
?>
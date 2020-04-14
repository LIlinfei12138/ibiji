<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$SQL1="select count(*) as count from article where sid='{$id}' and isSet=2";
	echo $SQL1;
	if(mysqli_fetch_assoc(mysqli_query($con,$SQL1))['count'] > 0){	
		header('location:./manage_example_sort.php');
		exit;
	}
	$SQL2="delete from exampleCategory where id='{$id}'";
	mysqli_query($con,$SQL2);
	header('location:./manage_example_sort.php');
	mysqli_close($con);
?>
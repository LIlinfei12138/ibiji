<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$SQL1="select count(*) as count from article where sid='{$id} and isSet=1'";
	if(mysqli_fetch_assoc(mysqli_query($con,$SQL1))['count'] > 0){	
		header('location:./main_message.php');
		exit;
	}
	$SQL2="select thun from sets where id={$id}";
	echo $SQL2;
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	var_dump($row2);
	$photoName=$row2['thun'];
	var_dump($photoName);
	unlink("./data/{$photoName}");
	$SQL="delete from sets where id={$id}";
	mysqli_query($con,$SQL);
	header('location:./main_message.php');
		mysqli_close($con);
?>
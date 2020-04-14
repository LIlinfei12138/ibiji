<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$sid=$_GET['sid'];
	$SQL2="select thun from article where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$thunName=$row2['thun'];
	unlink("./data/{$thunName}");
	$SQL="delete from article where id={$id}";
	mysqli_query($con,$SQL);
	 header("location:./look_example_sort.php?id={$sid}");
		mysqli_close($con);
?>
<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$sid=$_GET['sid'];
	$SQL="delete from article where id={$id}";
	mysqli_query($con,$SQL);
	 header("location:./manage_course.php?id={$sid}");
		mysqli_close($con);
?>
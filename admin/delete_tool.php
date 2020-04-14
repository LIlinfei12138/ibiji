<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_GET['id'];
	$cid=$_GET['cid'];
	$SQL2="select thun from tools where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$photoName=$row2['thun'];
	unlink("./data/{$photoName}");
	$SQL="delete from tools where id={$id}";
	mysqli_query($con,$SQL);
	 header("location:./manage_tool.php?id={$cid}");
		mysqli_close($con);
?>
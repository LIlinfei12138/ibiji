<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_POST['id'];
	$NEW_sortName=$_POST['NEW_sortName'];
	$SQL2="select name from setCategory where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$oldName=$row2['name'];
	if(!strlen(trim($NEW_sortName)) > 0 || $NEW_sortName == $oldName){
		header("location:./update_sortName.php?id={$id}");
		exit;
	}
	$SQL="update setCategory set name='{$NEW_sortName}' where id='{$id}'";
	mysqli_query($con,$SQL);
	if(mysqli_affected_rows($con) > 0){
		header('location:./main_list.php');
	} else{
		header('location:./update_sortName.php');
	}
	mysqli_close($con);
?>
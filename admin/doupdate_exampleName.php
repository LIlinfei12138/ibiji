<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_POST['id'];
	$SQL2="select name from exampleCategory where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$oldName=$row2['name'];
	$NEW_exampleName=$_POST['NEW_exampleName'];
	if(!strlen(trim($NEW_exampleName)) > 0 || $NEW_exampleName == $oldName){
		header("location:./update_exampleName.php?id={$id}");
		exit;
	}
	$SQL="update exampleCategory set name='{$NEW_exampleName}' where id='{$id}'";
	mysqli_query($con,$SQL);
	if(mysqli_affected_rows($con) > 0){
		header('location:./manage_example_sort.php');
	} else{
		header('location:./update_exampleName.php');
	}
	mysqli_close($con);
?>
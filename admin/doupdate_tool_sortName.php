<?php
	require "./function.php";
	settime();
	$con=dbset();
	$id=$_POST['id'];
	$NEW_tool_sortName=$_POST['NEW_tool_sortName'];
	$SQL2="select name from toolCategory where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$oldName=$row2['name'];
	if(!strlen(trim($NEW_tool_sortName)) > 0 || $NEW_tool_sortName==$oldName){
		header("location:./update_tool_sortName.php?id={$id}");
		exit;
	}
	$SQL="update toolCategory set name='{$NEW_tool_sortName}' where id='{$id}'";
	mysqli_query($con,$SQL);
	if(mysqli_affected_rows($con) > 0){
		header('location:./manage_tool_sort.php');
	} else{
		header('location:./update_tool_sortName.php');
	}
	mysqli_close($con);
?>

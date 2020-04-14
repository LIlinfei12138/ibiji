<?php
	require "./function.php";
	settime();
	$con=dbset();
	$toolName=$_POST['toolName'];
	$SQL2="select name from toolCategory";
	$res2=mysqli_query($con,$SQL2);
	while($row2=mysqli_fetch_assoc($res2)){
		$oldName=$row2['name'];
	if(!strlen(trim($toolName)) > 0 || $toolName == $oldName){
		header("location:./add_tool_Category.html");
		exit;
	}
	}
	$SQL="insert into toolCategory (name) values ('{$toolName}')";
	mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./manage_tool_sort.php");
	}else{
		header("location:./add_tool_Category.html");
	}
		mysqli_close($con);
?>
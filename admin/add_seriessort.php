<?php
	require "./function.php";
	settime();
	$con=dbset();
	$sortName=$_POST['sortName'];
	$SQL2="select name from setCategory";
	$res2=mysqli_query($con,$SQL2);
	while($row2=mysqli_fetch_assoc($res2)){
		$oldName=$row2['name'];
	if(!strlen(trim($sortName)) > 0 || $sortName == $oldName){
		header("location:./main_addseriessort.html");
		exit;
	}
	}
	$SQL="insert into setCategory (name) values ('{$sortName}')";
	mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./main_list.php");
	}else{
		header("location:./main_addseriessort.html");
	}
		mysqli_close($con);
?>
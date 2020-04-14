<?php
	require "./function.php";
	settime();
	$con=dbset();
	$exampleName=$_POST['exampleName'];
	$SQL2="select name from exampleCategory";
	$res2=mysqli_query($con,$SQL2);
	while($row2=mysqli_fetch_assoc($res2)){
		$oldName=$row2['name'];
	if(!strlen(trim($exampleName)) > 0 || $exampleName == $oldName){
		header("location:./add_example_sort.html");
		exit;
	}
	}
	$SQL="insert into exampleCategory (name) values ('{$exampleName}')";
	mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	if ($tmp > 0){
		header("location:./manage_example_sort.php");
	}else{
		header("location:./add_example_sort.html");
	}
		mysqli_close($con);
?>
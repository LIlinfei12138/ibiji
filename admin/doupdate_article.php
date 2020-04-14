<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if(!strlen(trim($_POST['title'])) > 0 || !strlen(trim($_POST['content']))> 0) {
		header("location:./update_article.php");
		exit;
	}
	$id=$_POST['id'];//获取数据
	$SQL2="select thun from article where id={$id}";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$deleFile=$row2['thun'];
	$photoName = upload('photofile','./data');
	$oldCid=$_POST['select_series'];//原来的cid
	$time=time();//获取时间
	$sid=$_POST['select_series'];//获取要改的sid
	$title=$_POST['title'];//获取名字
	$content=$_POST['content'];//获取数据
	// //////////////////////////////////////////
	if (strlen($_FILES['photofile']['name']) > 0){
	unlink("./data/{$deleFile}");
	//////////////////////////////////////////////////////
	$SQL="update article set title='{$title}',ptime={$time},content='{$content}',sid={$sid},thun='{$photoName}' where id={$id}";
	$res=mysqli_query($con,$SQL);
	$tmp=mysqli_affected_rows($con);
	 if ($tmp > 0){
		header("location:./manage_course.php?id={$sid}");
	 }else{
		header("location:./update_article.php");
	 }
} else{
		$SQL2="update article set title='{$title}',ptime={$time},content='{$content}',sid={$sid} where id={$id}";
		$res2=mysqli_query($con,$SQL2);
		$tmp2=mysqli_affected_rows($con);
		if ($tmp2 > 0){
			header("location:./manage_course.php?id={$sid}");
		}else{
			header("location:./update_article.php");
		}
	}
	mysqli_close($con);
?>
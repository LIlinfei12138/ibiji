<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if (!strlen(trim($_POST['article_title'])) > 0 || !strlen(trim($_POST['article_content']))> 0) {
		header("location:./main_add_course.php");
		exit;
	}
	$time=time();//设置时间
	$sid=$_POST['select_series'];//获得所属那个系列
	$article_title=$_POST['article_title'];//获得文章标题
	$article_content=htmlspecialchars($_POST['article_content']);//获得文章内容
	/////////////////////////////////////////////////////////
	$SQL1="insert into article (title,ptime,content,sid) values('{$article_title}',{$time},\"{$article_content}\",{$sid})";
	$res1=mysqli_query($con,$SQL1);
	var_dump($sid);
	$SQL2="select id from article";
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	if (mysqli_affected_rows($con) > 0){
		header("location:./manage_course.php?id={$sid}&xlID={$sid}");
	}else{
		header("location:./main_add_course.php");
	}
	mysqli_close($con);
?>
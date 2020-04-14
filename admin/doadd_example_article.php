<?php
	require "./function.php";
	require "./function_xc.php";
	settime();
	$con=dbset();
	if (!strlen(trim($_POST['article_title'])) > 0 || !strlen(trim($_POST['article_content']))> 0) {
		header("location:./add_example_article.php");
		exit;
	}
	if($photoName = upload('photofile','./data')){
	$time=time();//设置时间
	$sid=$_POST['sid'];//获得所属那个系列
	$article_title=$_POST['article_title'];//获得文章标题
	$article_content=htmlspecialchars($_POST['article_content']);//获得文章内容
	/////////////////////////////////////////////////////////
	$SQL1="insert into article (title,ptime,content,sid,thun,isSet) values('{$article_title}',{$time},\"{$article_content}\",{$sid},'{$photoName}',	2)";
	echo $SQL1;
	$res1=mysqli_query($con,$SQL1);

//	var_dump($sid);
//	$SQL2="select id from article";
//	$res2=mysqli_query($con,$SQL2);
//	$row2=mysqli_fetch_assoc($res2);
	if (mysqli_affected_rows($con) > 0){
		header("location:./look_example_sort.php?id={$sid}");
	}else{
		header("location:./add_example_article.php");
	}
	} else{
		header('location:./add_example_article.php');
	}
	mysqli_close($con);
?>
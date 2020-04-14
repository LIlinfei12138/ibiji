<?php
	require "./admin/function.php";
	settime();
	$con=dbset();
	$search=$_GET['search'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	<link href="./css/base.css" type="text/css" rel="stylesheet" />
	<link href="./css/normalize.css" type="text/css" rel="stylesheet" />
	<link href="./css/module.css" type="text/css" rel="stylesheet" />
	<link href="./css/layout.css" type="text/css" rel="stylesheet" />
	<link href="./css/state.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<header class="row clear">
			<div class="juzhong cdl col-sm-11 col-lg-10">
				<a href="#" class="header-tp" ><img class="logo" src="./images/pc/logo@2x.png" /></a>
				<ul class="nav-four">
					<li><a href="./shouye.php">首页</a></li>
					<li><a href="./xljc.php" class="bottom-border">系列教程</a></li>
					<li><a href="./sy-shilijiaocheng.php">实例教程</a></li>
					<li><a href="./9.php">工具推荐</a></li>
				</ul>
				<form class="sy-form" action="rjxz-sousu.php" method="get">
					<input type="hidden" name="sort" value="all"/>

					<input required class="sy-Input" type="search" name="search" />
					<input type="image" src="./images/pc/sou@2x.png"/>
				</form>
			</div>
		</header>
		<div class="big-second-title"> 
			<div class="col-sm-11 col-lg-10 flex juzhong">
			<div class="second-title-left">
				<img src="./images/ipad/shiliicon@2x.png" />
				<img src="./images/pc/neirongziti@2x.png" />
				<span class="leibie">>前端开发</span>
			</div>
			<div class="second-title-right">
				<form class="second-form" action="rjxz-sousu.php" method="get">
					<input required class="ss" type="search" name="" placeholder="搜索感兴趣的东西" /><input type="image" class="second-sousuo" src="./images/ipad/sousuo@2x.png" />
				</form>
				<div class="second-bottom">
				<span>热搜:</span>
				<span>Node.je</span>　
				<span>JQuery</span>　
				<span>WebApp</span>　
				<span>Angular</span>　
				</div>
			</div>
			</div>
		</div>
		<main id="no-sousu">
			<section class="big-sousu not-found">
				<img class="no-found-image" src="./images/pc/quesehngye@2x.png" />
				<p class="no-found">没有找到"<?= $search?>"相关的结果</p>
			</section>
		</main>
		<footer>
		<div class="footer-div col-sm-11 col-lg-10 juzhong">
			<span class="shengming">声明：本站并不以营利为目的，旨在推广IT技术在国内的应用，所有网站收入均用于网站维持以及服务器的日常开支，并为大家代劳更好的使用体验，如本站的内容对您的权利造成了影响，请发邮件至admin.163.com,我们会在第一时间奖涉及版权的内容删除</span><br />
			<span class="bottom-bottom">Copyorigh@2012-2019 IBIGI tecn 保留所有权利</span>
		</div>
		</footer>
	</body>
</html>
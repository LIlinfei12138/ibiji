<?php
	require "./admin/function.php";
	require "./function.php";
	settime();
	$con=dbset();
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
				<img src="./images/ipad/jiaocheng@2x.png" />
				<span class="leibie">>前端开发</span>
			</div>
			<div class="second-title-right">
				<form class="second-form" action="rjxz-sousu.php" method="get">
					<input type="hidden" name="sort" value="series"/>
					<input required class="ss" type="search" name="search" placeholder="搜索感兴趣的系列" /><input type="image" class="second-sousuo" src="./images/ipad/sousuo@2x.png" />
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
		<main class="margin-2em">
		<section class="big-xljc-content col-sm-11 col-lg-10 juzhong">
			<section class="left-xljc-content">
			<?php
			$sid=$_GET['sid'];
			$SQL1="select * from article where sid={$sid} and isSet=1";
			$res1=mysqli_query($con,$SQL1);
				$a=0;
			while($row1=mysqli_fetch_assoc($res1)){
				$a++;
			?>
				<a class="default-bl" href="./xljc-xq-last.php?id=<?= $row1['id']?>&sid=<?= $_GET['sid']?>"><li class="li li-background
				<?php
					if($_GET['id'] == $row1['id']){
						echo li_back();//加背景
					}
					?>"><span class="number">1-<?= $a?></span><?= $row1['title']?></li></a>
			<?php
			}
			?>
			</section>
			<section class="big-xq sanjiao relative">
				<?php
				$SQL3="select count from article where id={$_GET['id']}";
				$res3=mysqli_query($con,$SQL3);
				$row3=mysqli_fetch_assoc($res3);
				$oldCount=$row3['count'];
				$updateCount="update article set count={$oldCount}+1 where id={$_GET['id']}";
				$updateCount_query=mysqli_query($con,$updateCount);
					$SQL2="select * from article where id={$_GET['id']}";
					$res2=mysqli_query($con,$SQL2);
					$row2=mysqli_fetch_assoc($res2);
					$content=strlen($row2['content']);
				?>
							<div class="xq-title">
								<h3><?= $row2['title']?></h3>
								<div class="sljc-xinxi add-zishu">
									<span>总阅读数:<span class="number-color"><?= $row2['count']?></span></span>
									<span>共<?= $content?>字</span>
									<span>发表时间:<?= date('Y-m-d',$row2['ptime'])?></span>
								</div>
							</div>
							<div class="xq-content">
								<pre><?= htmlspecialchars_decode($row2['content'])?></pre>
							</div>
						</section>
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

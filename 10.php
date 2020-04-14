<?php
	require "./admin/function.php";
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
					<li><a href="./xljc.php">系列教程</a></li>
					<li><a href="./sy-shilijiaocheng.php">实例教程</a></li>
					<li><a href="./9.php" class="bottom-border">工具推荐</a></li>
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
				<img src="./images/ipad/gongjuwenzi@2x.png" />
				<span class="leibie">>软件下载</span>
			</div>
			<div class="second-title-right">
				<form class="second-form" action="./rjxz-sousu.php" method="get">
					<input type="hidden" name="sort" value="tool"/>

					<input required class="ss" type="search" name="search" placeholder="搜索感兴趣的软件" /><input type="image" class="second-sousuo" src="./images/ipad/sousuo@2x.png" />
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
		<!-- <nav class="lianjie second-lianjie have-shadow"> 
			<div class="col-sm-11 col-lg-10 juzhong">
				<li class="inline-block background_color"><a href="#" class="inline-block col-sm-1">全部</a></li>
				<?php
					/*$SQL1="select * from toolCategory order by id desc limit 11";
					$res1=mysqli_query($con,$SQL1);
					while($row1=mysqli_fetch_assoc($res1)){;
				?>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1"><?= $row1['name']?></a></li>
				<?php
				}*/
				?>
				</div>
		</nav>-->
		<main class="margin-2em">
			<?php
			$id=$_GET['id'];
			$SQL2="select count from tools where id={$id}";//查看阅读人数
			$res2=mysqli_query($con,$SQL2);
			$row2=mysqli_fetch_assoc($res2);
			$oldCount=$row2['count'];
			$updateCount="update tools set count={$oldCount}+1 where id={$id}";
			$updateCount_query=mysqli_query($con,$updateCount);//查看阅读人数
			//////////////////////////////////////////////////
			$SQL3="select * from tools where id={$id}";
			$res3=mysqli_query($con,$SQL3);
			$row3=mysqli_fetch_assoc($res3);
			?>
			<section class="big-rj-xq col-sm-11 col-lg-10 juzhong min-height">
				<div class="rj-xq">
					<img class="rj-xq-image" src="./admin/data/<?= $row3['thun']?>" />
					<div class="rj-xq-title inline-block">
						<h4><?= $row3['name']?></h4>
						<div class="sljc-xinxi add-zishu">
							<span>总阅读数:<span class="number-color"><?= $row3['count']?></span></span>
							<span>字数:<?= strlen($row3['content'])?></span>
							<span>发表时间:<?= date('Y-m-d',$row3['time'])?></span>
						</div>
					</div>
				</div>
				<pre class="last-pre"><?= $row3['content']?></pre>
			</section>
			<div class="last-html gy-rj col-sm-8 col-lg-6">
						<a href="https://<?= $row3['downloadURL']?>" class="gy xiazai" title="自己不会百度吗" target="_blank">官方下载</a>
						<a href="https://<?= $row3['officialURL']?>" class="gy guanwang" title="自己不会百度吗？" target="_blank">软件官方</a>
						<a href="https://<?= $row3['docURL']?>" class="gy wendang" title="自己不会百度吗？" target="_blank">软件文档</a>
			</div>
		</main>
		<footer>
		<div class="footer-div col-sm-11 col-lg-10 juzhong">
			<span class="shengming">声明：本站并不以营利为目的，旨在推广IT技术在国内的应用，所有网站收入均用于网站维持以及服务器的日常开支，并为大家代劳更好的使用体验，如本站的内容对您的权利造成了影响，请发邮件至admin.163.com,我们会在第一时间奖涉及版权的内容删除</span><br />
			<span class="bottom-bottom">Copyorigh@2012-2019 IBIGI tecn 保留所有权利</span>
		</div>
		</footer>
	</body>
</html>

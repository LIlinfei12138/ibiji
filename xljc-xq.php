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
		<nav class="lianjie xljc-xq-lianjie have-shadow">
			<div class="flex col-sm-11 col-lg-10 juzhong">
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">全部</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Java</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Vue.js</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">计算机网络</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">SSM</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Python</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Anguer</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Web app</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">小程序</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">Anguer</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">web app</a></li>
				<li class="inline-block"><a href="#" class="inline-block col-sm-1">SSM</a></li>
				</div>
		</nav>
		<?php
			$arr1=array(
				1=>'入门',
				2=>'初级',
				3=>'中级',
				4=>'高级'
			);
			$arr2=array(
				1=>'★',
				2=>'★★',
				3=>'★★★',
				4=>'★★★★'
			);
			$id=$_GET['id'];
			$SQL2="select * from sets where id={$id}";
			$res2=mysqli_query($con,$SQL2);
			$row2=mysqli_fetch_assoc($res2);
			$oldCount=$row2['count'];
			$updateCount="update sets set count={$oldCount}+1 where id={$id}";
			$updateCount_query=mysqli_query($con,$updateCount);//改阅读人数
			////////////////////////////////////////////////////////
			$SQL3="select * from sets where id={$id}";
			$res3=mysqli_query($con,$SQL3);
			$row3=mysqli_fetch_assoc($res3);
			$cid=$row3['cid'];
			////////////////////////////////////////
			$SQL7="select id from article where sid={$row3['id']} and isSet=1";
			$res7=mysqli_query($con,$SQL7);
			$row7=mysqli_fetch_assoc($res7);
		?>
		<main class="margin-2em xljc-xq-main">
		<div class="white padding">
			<div class="col-sm-11 col-lg-10 juzhong">
			<section class="one-sljc col-sm-11 col-lg-10  juzhong flex jcs">
								<a class="a-sljc" href="./xljc-xq-last.php?id=<?= $row7['id']?>&sid=<?= $row3['id']?>"><img class="left-sljc" src="./admin/data/<?= $row3['thun']?>" /></a>
								<div class="inline-block right-sljc">
									<h3 class="sljc-small-title"><?= $row3['name']?></h3>
									<p class="word-break"><?= $row3['summary']?></p>
									<div class="sljc-xinxi flex">
										<span>难度:<?= $arr1[$row3['ilevel']]?><span class="number-color"><?= $arr2[$row3['ilevel']]?></span></span>
										<span>总阅读数:<span class="number-color"><?= $row3['count']?></span></span>
										<span>修改时间 <?= date('Y-m-d H:i:s',$row3['ptime'])?></span>
										<a class="inline-block lijixuexi" href="./xljc-xq-last.php?id=<?= $row7['id']?>&sid=<?= $row3['id']?>">立即学习</a>
									</div>
								</div>
							</section>
						</div>
				<section class="mulu col-sm-11 col-lg-10 flex juzhong">
					<?php
						$a=0;
					$SQL4="select id,title from article where sid={$row3['id']} and isSet=1";//获得文章的
					$res4=mysqli_query($con,$SQL4);
					while($row4=mysqli_fetch_assoc($res4)){
						$a++;
					?>
					<li class="first-mulu"><a href="./xljc-xq-last.php?id=<?= $row4['id']?>&sid=<?= $row3['id']?>">1-<?= $a?> <?= $row4['title']?></a></li>
					<?php
					}
					?>
				</section>
			</div>
				<section class="jc big-xl col-sm-11 col-lg-10 juzhong">
					<div class="small-title relative">
						<img src="./images/ipad/lianjie@2x.png" />
						相关系列课程
						<a href="#" class="gengduo right">更多
						<img src="./images/ipad/fanye@2x.png" /></a>
					</div>
					<div class="jiaocheng">
						<?php
							$SQL5="select * from sets where cid={$cid} order by ptime desc limit 4";
							$res5=mysqli_query($con,$SQL5);
							while($row5=mysqli_fetch_assoc($res5)){
						?>
					<section class="one-jc xljctj inline-block">
						<a href="./xljc-xq.php?id=<?= $row5['id']?>"><img src="./admin/data/<?= $row5['thun']?>" /></a>
						<h4 class="jieshao"><?= $row5['name']?></h4>
						<h5 class="one-jc-bottom">共<span class="ydnumber"><?= $row5['count']?></span>人阅读
						<span class="right"><?= $arr1[$row5['ilevel']]?></span></h5>
					</section>
					<?php
					}
					?>
					</div>
				</section>
				<section class="jc big-xl col-sm-11 col-lg-10 juzhong">
					<div class="small-title relative">
						<img src="./images/ipad/tuijian@2x.png" />
						推荐系列课程
						<a href="#" class="gengduo right">更多
						<img src="./images/ipad/fanye@2x.png" /></a>
					</div>
					<div class="jiaocheng">
						<?php
						$SQL6="select * from sets order by count desc limit 4";
						$res6=mysqli_query($con,$SQL6);
						while($row6=mysqli_fetch_assoc($res6)){
						?>
					<section class="one-jc xljctj inline-block">
						<a href="./xljc-xq.php?id=<?= $row6['id']?>"><img src="./admin/data/<?= $row6['thun']?>" /></a>
						<h4 class="jieshao"><?= $row6['name']?></h4>
						<h5 class="one-jc-bottom">共<span class="ydnumber"><?= $row6['count']?></span>人阅读
						<span class="right"><?= $arr1[$row6['ilevel']]?></span></h5>
					</section>
					<?php
					}
					?>
					</div>
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

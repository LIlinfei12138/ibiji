<?php
	require "./admin/function.php";
	settime();
	$con=dbset();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="./css/base.css" type="text/css" rel="stylesheet" />
		<link href="./css/normalize.css" type="text/css" rel="stylesheet" />
		<link href="./css/module.css" type="text/css" rel="stylesheet" />
		<link href="./css/layout.css" type="text/css" rel="stylesheet" />
		<link href="./css/state.css" type="text/css" rel="stylesheet" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<!-- 导航栏 -->
		<header class="row clear">
			<div class="juzhong cdl col-sm-11 col-lg-10">
				<a href="#" class="header-tp" ><img class="logo" src="./images/pc/logo@2x.png" /></a>
				<ul class="nav-four">
					<li><a href="./shouye.php" class="bottom-border">首页</a></li>
					<li><a href="./xljc.php">系列教程</a></li>
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
	<main>
		<div>
			<img class="big-pt" src="./images/pc/banner@2x.png" />
		</div>
		<section class="jc big-xl col-sm-11 col-lg-10 juzhong">
			<div class="small-title relative">
				<img src="./images/ipad/huanggauan@2x.png" />
				系列教程推荐
				<span class="small-small-title">SERI OF TUTORIALS</span>
				<a href="./xljc.php" class="gengduo right">更多
				<img src="./images/ipad/fanye@2x.png" /></a>
			</div>
			<div class="jiaocheng">
				<?php
					$arr=array(
						1=>'入门级',
						2=>'初级',
						3=>'中级',
						4=>'高级'
					);
					$SQL1="select * from sets order by ptime desc limit 12";
					$res1=mysqli_query($con,$SQL1);
					while($row1=mysqli_fetch_assoc($res1)){
						$id=$row1['id'];
						$thun=$row1['thun'];
						$name=$row1['name'];
						$count=$row1['count'];
						$ilevel=$row1['ilevel'];
				?>
			<section class="one-jc xljctj">
				<a href="./xljc-xq.php?id=<?= $id?>"><img src="./admin/data/<?= $thun?>" /></a>
				<h4 class="jieshao"><?= $name?></h4>
				<h5 class="one-jc-bottom">共<span class="ydnumber"><?= $count?></span>人阅读
				<span class="right"><?= $arr[$ilevel]?></span></h5>
			</section>
			<?php
			}
			?>
			</div>
		</section>
		<div class="white">
		<section class="jc big-zx col-sm-11 col-lg-10 juzhong">
			<div class="small-title relative">
				<img src="./images/ipad/xingxing@2x.png" />
				最新实例教程
				<span class="small-small-title">Tutorial case</span>
				<a href="./sy-shilijiaocheng.php" class="gengduo right">更多
				<img src="./images/ipad/fanye@2x.png" /></a>
			</div>
			<div class="jiaocheng">
			<?php
			$SQL2="select * from article where isSet=2 order by ptime desc limit 10";
			$res2=mysqli_query($con,$SQL2);
			while($row2=mysqli_fetch_assoc($res2)){
				$summary=mb_substr($row2['content'],0,80);
			?>
				<section class="one-jc zxsljc">
<a href="./sy-sljc-xq.php?id=<?= $row2['id']?>">	<img src="./admin/data/<?=$row2['thun']?>" /></a>
					<div class="jieshi"><?= htmlspecialchars_decode($summary)?>
					<hr />
					<div class="relative">
					<span><?= $row2['count']?></span>
					<span class="right"><?= date('Y-m-d',$row2['ptime'])?></span>
					</div>
					</div>
				</section>
				<?php
				}
				?>
			</div>
		</section>
		</div>
		<section class="big-tj col-sm-11 col-lg-10 juzhong">
			<div class="small-title relative">
				<img src="./images/ipad/tuijian@2x.png" />
				推荐软件
				<span class="small-small-title">SOFTWARE RECOMMENDATION</span>
				<a href="9.php" class="gengduo right">更多
				<img src="./images/ipad/fanye@2x.png" /></a>
			</div>
			<div class="rj">
				<?php
					$SQL3="select id,name,thun,summary from tools order by time desc";
					$res3=mysqli_query($con,$SQL3);
					$row3=mysqli_fetch_assoc($res3);
				?>
				<section class="first-rj">
					<a href="./10.php?id=<?= $row3['id']?>">
					<img class="gongju first-img-gj" src="./admin/data/<?= $row3['thun']?>" />
					</a>
					<h4 class="first-title">
                            <? $row3['name']=?>
                        </h4>
					<div class="sy-hr">
					</div>
					<hr class="gj-hr" />
					<p class="gj-content"><?= $row3['summary']?></p>
				</section>
				<?php
					$SQL4="select id,name,thun from tools order by time desc limit 1,7";
					$res4=mysqli_query($con,$SQL4);
					while($row4=mysqli_fetch_assoc($res4)){
				?>
				<section class="many-gj">
					<a href="./10.php?id=<?= $row4['id']?>">
					<img class="gongju many-GJ" src="./admin/data/<?= $row4['thun']?>" />
					</a>
					<h4 class="first-title"><?= $row4['name']?></h4>
				</section>
				<?php
				}
				?>
			</div>
		</section>
		<section class="yqlj col-sm-11 col-lg-10 juzhong">
			<div class="youqing">友情链接</div>
			<nav class="bottom-logo">
				<a class="bottom-four" href="#"><img class="xinlang" src="./images/ipad/xinlang@2x.png" /></a>
				<a class="bottom-four" href="#"><img class="wangyi" src="./images/ipad/wangyi@2x.png" /></a>
				<a class="bottom-four" href="#"><img class="sougu" src="./images/ipad/sougou@2x.png" /></a>
				<a class="bottom-four" href="#"><img class="souhu" src="./images/ipad/souhu@2x.png" /></a>
			</nav>
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
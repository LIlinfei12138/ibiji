<?php
	require "./admin/function.php";
	require "./function.php";
	settime();
	$con=dbset();
	if(isset($_GET['id'])){
		$where="where cid={$_GET['id']}";
	}else{
		$where="";
	}
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
				<form class="sy-form" action="./rjxz-sousu.php" method="get">
					<input type="hidden" name="sort" value="all"/>
					<input class="sy-Input" type="search" name="search" />
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
				<form class="second-form" action="rjxz-sousu.php" method="get">
				<input type="hidden" name="sort" value="tools"/>
					
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
		<nav class="lianjie second-lianjie have-shadow">
			<div class="col-sm-11 col-lg-10 juzhong">
				<li class="inline-block
				<?php
					if(!isset($_GET['id'])){
						echo background();
					}
				?>"><a href="./9.php" class="inline-block col-sm-1">全部</a></li>
				<?php
					$SQL1="select * from toolCategory order by id desc limit 11";
					$res1=mysqli_query($con,$SQL1);
					while($row1=mysqli_fetch_assoc($res1)){
						$CateName=$row1['name'];
				 ?>
				<li class="inline-block
					<?php
						if($_GET['id'] == $row1['id']){
							echo background();
						}
					?>"><a href="./9.php?id=<?= $row1['id']?>" class="inline-block col-sm-1"><?= $CateName?></a></li>
				<?php
				}
				?>
				</div>
		</nav>
		<main class="margin-2em">
			<section class="big-rjxz flex col-sm-11 col-lg-10 juzhong ">
				<?php
				$pageCount=6;
				$nowPage=isset($_GET['nowPage']) ? $_GET['nowPage'] : 1;
				$start=($nowPage - 1) * $pageCount;
				if($nowPage > 1){
					$prevPage = $nowPage - 1;
				}else{
					$prevPage=1;
				}
				$totalPage="select count(*) as count from tools {$where}";//一共有多少系列
				$resPage=mysqli_query($con,$totalPage);
				$rowPage=mysqli_fetch_assoc($resPage);
				$totalCount=ceil($rowPage['count'] / $pageCount);//一共有多少页
				if($nowPage < $totalCount){
					$nextPage = $nowPage + 1;
				} else{
					$nextPage = $totalCount;
				}
				
					$SQL2="select * from tools {$where} order by time limit {$start},{$pageCount}";
					$res2=mysqli_query($con,$SQL2);
					while($row2=mysqli_fetch_assoc($res2)){
				?>
				<section class="one-rjxz inline-block">
					<div class="have-image flex">
						<a class="tupian-image" href="./10.php?id=<?= $row2['id']?>">
						<img class="rj-image" src="./admin/data/<?= $row2['thun']?>" />
						</a>
						<div class="right-rjxz">
							<div><?= $row2['name']?></div>
							<div class="time-language">更新时间：<?= date('Y-m-d',$row2['time'])?></div>
							<div class="time-language">软件语言：<?= $row2['lang']?></div>
							<div class="gy-rj">
								<a href="http:<?= $row2['download']?>" class="gy xiazai">官方下载</a>
								<a href="http:<?= $row2['officialURL']?>" class="gy guanwang">软件官方</a>
								<a href="http:<?= $row2['docURL']?>" class="gy wendang">软件文档</a>
							</div>
						</div>
					</div>
					<p class="no-image"><?= $row2['summary']?></p>
				</section>
				<?php
				}
				?>
			</section>
		<section class="page col-sm-6 col-lg-6 flex juzhong">
			<a href="./9.php?nowPage=1<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">首页</a>
			<a href="./9.php?nowPage=<?= $prevPage?>
			<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">上一页</a>
			<?php
				for($l=1;$l <=$totalCount;$l++){
			?>
				<a class="<?php
					if($nowPage == $l){
						echo "page-background";
					}
				?>" href="./9.php?nowPage=<?= $l?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>"><?= $l?></a>
			<?php
			}
			?>
			<a href="./9.php?nowPage=<?= $nextPage?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">下一页</a>
			<a href="./9.php?nowPage=<?= $totalCount?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">尾页</a>
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
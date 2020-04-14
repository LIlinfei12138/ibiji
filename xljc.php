<?php
	require "./admin/function.php";
	require "./function.php";
	settime();
	$con=dbset();
	//////////////////////////////////////////////////
	if(!isset($_GET['id']) && !isset($_GET['ilevel'])){
		$where="";
	}elseif (isset($_GET['id']) && !isset($_GET['ilevel'])){	
		$where="where cid={$_GET['id']}";
	}elseif (!isset($_GET['id']) && isset($_GET['ilevel'])){
		$ilevel=$_GET['ilevel'];
		$where="where ilevel={$ilevel}";
	}elseif (isset($_GET['id']) && isset($_GET['ilevel'])){
		$id=$_GET['id'];
		$where="where cid={$id} and ilevel={$_GET['ilevel']}";
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
				<span class="leibie">>教程分类</span>
			</div>
			<div class="second-title-right">
				<form class="second-form" action="./rjxz-sousu.php" method="get">
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
		<nav class="lianjie">
			<div class="flex col-sm-11 col-lg-10 juzhong">
				<li class="inline-block 
				<?php
					if(!isset($_GET['id'])){//是否给全部加背景
						echo background();//是否加全部背景
					}//是否给全部加背景
				?>">
				<a href="././xljc.php
				<?php
					if(isset($_GET['ilevel'])){//是否有等级
						echo "?ilevel={$_GET['ilevel']}";//是否有等级
					}//是否有等级
				?>" class="inline-block col-sm-1">全部</a></li>
				<?php
					$SQL1="select * from setCategory order by id desc limit 11";
					$res1=mysqli_query($con,$SQL1);
					while($row1=mysqli_fetch_assoc($res1)){
						$chuanID=$row1['id'];
				?>
				
				<li class="inline-block
				<?php
				if($_GET['id'] == $chuanID){//是否给第一行选择的加背景
					echo background();//是否给第一行选择的加背景
				}//是否给第一行选择的加背景
				?>"><a href="./xljc.php?id=<?= $row1['id']?>&
			<?php
				if(isset($_GET['ilevel'])){//选择的第一行是否有难度
					echo "&ilevel={$_GET['ilevel']}";//选择的第一行是否有难度
				}//选择的第一行是否有难度
			?>" class="inline-block col-sm-1"><?=$row1['name']?></a></li>
				<?php
				}
				?>
				</div>
		</nav>
		<div class="xljc-hr"><hr class="hr-lianjie col-sm-11 col-lg-10 juzhong" /></div>
		<nav class="lianjie second-lianjie have-shadow">
			<div class="col-sm-11 col-lg-10 juzhong">
				<li class="inline-block 
				<?php
					if(!isset($_GET['ilevel'])){//给第二行'全部'加背景
						echo background();//给第二行'全部'加背景
					}//给第二行'全部'加背景
				?>">
				<a href="./xljc.php
				<?php
					if(isset($_GET['id'])){//第二行是否有id
						echo "?id={$_GET['id']}";//第二行是否有id
					}//第二行是否有id
				?>" class="inline-block col-sm-1">全部</a></li>
				<?php
					$arrilevel=array(
						1=>'入门',
						2=>'初级',
						3=>'中级',
						4=>'高级'
					);
					for($j=1;$j<5;$j++){
				?>
					<li class="inline-block
						<?php
						if($_GET['ilevel'] == $j){//给选中的第二行加背景
								echo background();//给选中的第二行加背景
							}//给选中的第二行加背景
						?>">
						<a href="./xljc.php?
					<?php
					if(isset($_GET['id'])){//是否有id
						echo "id={$_GET['id']}&";//是否有id
					}//是否有id
					?>ilevel=<?= $j?>" class="inline-block col-sm-1"><?= $arrilevel[$j]?></a></li>
				<?php
				}
				?>
		</nav>
		<section class="jc big-xl col-sm-11 col-lg-10 juzhong min-height">
			<div class="small-title relative">
				<img src="./images/ipad/huanggauan@2x.png" />
				系列教程推荐
				<span class="small-small-title">SERI OF TUTORIALS</span>
				<a href="#" class="gengduo right">更多
				<img src="./images/ipad/fanye@2x.png" /></a>
			</div>
			<div class="jiaocheng">
				<?php
				$pageCount=16;
				$nowPage=isset($_GET['nowPage']) ? $_GET['nowPage'] : 1;
				$start=($nowPage - 1) * $pageCount;
				if($nowPage > 1){
					$prevPage = $nowPage - 1;
				}else{
					$prevPage=1;
				}
				$totalPage="select count(*) as count from sets {$where}";//一共有多少系列
				$resPage=mysqli_query($con,$totalPage);
				$rowPage=mysqli_fetch_assoc($resPage);
				$totalCount=ceil($rowPage['count'] / $pageCount);//一共有多少页
				if($nowPage < $totalCount){
					$nextPage = $nowPage + 1;
				} else{
					$nextPage = $totalCount;
				}
				
				$SQL2="select * from sets {$where} order by ptime desc limit {$start},{$pageCount}";
				$res2=mysqli_query($con,$SQL2);
				while($row2=mysqli_fetch_assoc($res2)){
				?>
			<section class="one-jc xljctj inline-block">
				<a href="./xljc-xq.php?id=<?= $row2['id']?>"><img src="./admin/data/<?= $row2['thun']?>" /></a>
				<h4 class="jieshao"><?= $row2['name']?></h4>
				<h5 class="one-jc-bottom">共<span class="ydnumber"><?= $row2['count']?></span>人阅读
				<span class="right"><?= $arrilevel[$row2['ilevel']]?></span></h5>
			</section>
			<?php
			}
			?>
			</div>
		</section>
		<section class="page col-sm-6 col-lg-6 flex juzhong">
			<a href="./xljc.php?nowPage=1<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
				if(isset($_GET['ilevel'])){
					echo "&ilevel={$_GET['ilevel']}";
				}
			?>">首页</a>
			<a href="./xljc.php?nowPage=<?= $prevPage?>
			<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
				if(isset($_GET['ilevel'])){
					echo "&ilevel={$_GET['ilevel']}";
				}
			?>">上一页</a>
			<?php
				for($l=1;$l <=$totalCount;$l++){
			?>
				<a class="<?php
					if($nowPage == $l){
						echo "page-background";
					}
				?>" href="./xljc.php?nowPage=<?= $l?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
				if(isset($_GET['ilevel'])){
					echo "&ilevel={$_GET['ilevel']}";
				}
			?>"><?= $l?></a>
			<?php
			}
			?>
			<a href="./xljc.php?nowPage=<?= $nextPage?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
				if(isset($_GET['ilevel'])){
					echo "&ilevel={$_GET['ilevel']}";
				}
			?>">下一页</a>
			<a href="./xljc.php?nowPage=<?= $totalCount?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
				if(isset($_GET['ilevel'])){
					echo "&ilevel={$_GET['ilevel']}";
				}
			?>">尾页</a>
		</section>
	<footer>
	<div class="footer-div col-sm-11 col-lg-10 juzhong">
		<span class="shengming">声明：本站并不以营利为目的，旨在推广IT技术在国内的应用，所有网站收入均用于网站维持以及服务器的日常开支，并为大家代劳更好的使用体验，如本站的内容对您的权利造成了影响，请发邮件至admin.163.com,我们会在第一时间奖涉及版权的内容删除</span><br />
		<span class="bottom-bottom">Copyorigh@2012-2019 IBIGI tecn 保留所有权利</span>
	</div>
	</footer>
	</body>
</html>
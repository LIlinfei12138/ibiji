<?php
	require "./admin/function.php";
	require "./function.php";
	settime();
	$con=dbset();
	if(isset($_GET['id'])){
		$where="where sid={$_GET['id']} and ";
	}else{
		$where="where ";
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
					<li><a href="./shouye.php" >首页</a></li>
					<li><a href="./xljc.php">系列教程</a></li>
					<li><a href="./sy-shilijiaocheng.php" class="bottom-border">实例教程</a></li>
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
				<img src="./images/ipad/shiliwenzi@2x.png" />
				<span class="leibie">>教程分类</span>
			</div>
			<div class="second-title-right">
				<form class="second-form" action="rjxz-sousu.php" method="get">
				<input type="hidden" name="sort" value="example"/>

					<input required class="ss" type="search" name="search" placeholder="搜索感兴趣的实例教程" /><input type="image" class="second-sousuo" src="./images/ipad/sousuo@2x.png" />
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
		<nav class="lianjie have-shadow">
			<div class="flex col-sm-11 col-lg-10 juzhong">
				<li class="inline-block
				<?php
					if(!isset($_GET['id'])){
						echo background();
					}
				?>"><a href="./sy-shilijiaocheng.php" class="inline-block col-sm-1">全部</a></li>
				<?php
					$SQL1="select * from exampleCategory order by id desc limit 11";
					$res1=mysqli_query($con,$SQL1);
					while($row1=mysqli_fetch_assoc($res1)){
						$CateName=$row1['name'];
				 ?>
				<li class="inline-block
				<?php
					if($_GET['id'] == $row1['id']){
						echo background();
					}
				?>"><a href="./sy-shilijiaocheng.php?id=<?= $row1['id']?>" class="inline-block col-sm-1"><?= $CateName?></a></li>
				<?php
				}
				?>
				</div>
		</nav>
		<main class="margin-2em">
			<section class="big-sljc col-lg-10 juzhong">
				<div class="many-sljcs">
				<?php
				$pageCount=5;
				$nowPage=isset($_GET['nowPage']) ? $_GET['nowPage'] : 1;
				$start=($nowPage - 1) * $pageCount;
				if($nowPage > 1){
					$prevPage = $nowPage - 1;
				}else{
					$prevPage=1;
				}
				$totalPage="select count(*) as count from article {$where} isset=2";//一共有多少系列
				$resPage=mysqli_query($con,$totalPage);
				$rowPage=mysqli_fetch_assoc($resPage);
				$totalCount=ceil($rowPage['count'] / $pageCount);//一共有多少页
				if($nowPage < $totalCount){
					$nextPage = $nowPage + 1;
				} else{
					$nextPage = $totalCount;
				}
				
					$SQL2="select * from article {$where} isSet=2 order by count desc limit {$start},{$pageCount}";
					$res2=mysqli_query($con,$SQL2);
					while($row2=mysqli_fetch_assoc($res2)){
						$summary= mb_substr($row2['content'],0,80);
				?>
				<section class="one-sljc col-sm-10 juzhong flex">
					<a class="sljc-left-img" href="./sy-sljc-xq.php?id=<?= $row2['id']?>"><img class="left-sljc-img" src="./admin/data/<?= $row2['thun']?>" /></a>
					<div class="inline-block right-sljc">
						<h3 class="sljc-small-title"><?= $row2['title']?></h3>
						<p><?= htmlspecialchars_decode($summary)?></p>
						<div class="sljc-xinxi flex">
							<span>总阅读数:<span class="number-color"><?= $row2['count']?></span></span>
							<span>发表时间:<?= date('Y-m-d',$row2['ptime'])?></span>
							<a class="inline-block lijixuexi" href="sy-sljc-xq.php?id=<?= $row2['id']?>">立即学习</a>
						</div>
					</div>
				</section>
				<?php
				}
				?>
				</div>
				<div class="jctj">
					<div class="inside-jctj">
					<div class="jctj-title border-bottom flex">
						<div>
						<h3 class="inline-block big-jctj-title">教程推荐</h3>
						<div class="big inline-block"></div>
						<div class="small inline-block"></div>
						</div>
						<a class="huanyipi" href="#">换一批</a>
					</div>
					<div class="jctj-content">
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
						<div class="one-jctj border-bottom">
							<a class="inline-block" href="#">
								本课程的见解就是阿是假的叫的html阿里科是假的r说重点就是鼠标引入显示全部内容字体加粗
							</a>
							<div class="bottom-one-jctj">
								<span class="ydrs">阅读人数：2888</span>
								<span class="fbsj">发表时间：2019-12-23</span>
							</div>
						</div>
					</div>
					</div>
				</div>
			</section>
		<section class="page col-sm-6 col-lg-6 flex juzhong">
			<a href="./sy-shilijiaocheng.php?nowPage=1<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">首页</a>
			<a href="./sy-shilijiaocheng.php?nowPage=<?= $prevPage?>
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
				?>" href="./sy-shilijiaocheng.php?nowPage=<?= $l?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>"><?= $l?></a>
			<?php
			}
			?>
			<a href="./sy-shilijiaocheng.php?nowPage=<?= $nextPage?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">下一页</a>
			<a href="./sy-shilijiaocheng.php?nowPage=<?= $totalCount?><?php
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
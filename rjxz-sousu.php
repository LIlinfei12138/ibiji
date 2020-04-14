<?php
	require "./admin/function.php";
	settime();
	$con=dbset();
	$sort = $_GET['sort'];
	$search=$_GET['search'];
/*	$isSet=$sort == 'example' ? "isSet=2 and " : "";
	$isSet2=$sort == 'example' ? "isSet=2" : "";
	$where=$sort == 'example' || $sort == 'tool' ? "where" : "";
	if ($sort == 'series'){
		$name="name";
		$table="sets";
		$where="";
	} elseif($sort == 'example'){
		$name="title";
		$table="article";
	} elseif($sort == 'tool'){
		$name="name";
		$table="tools";
	}
		$SQL1="select id,{$name} from {$table} {$where} {$isSet} {$name} like '%{$search}%'";
		$SQL2="select count({$name}) as count from {$table} {$where} {$isSet} {$name} like '%{$search}%'";*/
		//////////////////////////////////////
		if($sort == 'series'){
			$SQL1="select id,name from sets where name like '%{$search}%'";
			$SQL2="select count(name) as count from sets where name like '%{$search}%'";
			$totalPage="select count(*) as count from sets";//一共有多少数量
			
			
			
		}elseif($sort == 'example'){
			$SQL1="select id,title from article where isSet=2 and title like '%{$search}%'";
			$SQL2="select count(title) as count from article where isSet=2 and title like '%{$search}%'";
			$totalPage="select count(*) as count from article where isSet=2";//一共有多少数量
			
			
			
			
		}elseif($sort == 'tools'){
			$SQL1="select id,name from tools where name like '%{$search}%'";
			$SQL2="select count(name) as count from tools where name like '%{$search}%'";
			$totalPage="select count(*) as count from tools";//一共有多少数量
			
		}
		/*elseif($sort == 'all'){
			$SQL1="select s.id,a.id,t.id,s.name,a.title,t.name from sets as s,article as a,tools as t where s.name,a.title,t.name like '%{$search}%'";
			$SQL2="select count(*) as count from sets as s,article as a,tools as t where s.name,a. like '%{$search}%'";
			$totalPage="select count(*) as count from sets,article,tools";
		}*/
		elseif($sort == 'all'){
			$sql = "select t.tname as name,s.name,a.title as name from sets as s,article as a,tools as t {$where} limit {$start},{$pagecount}";
			$totalpagesql = "select count(*) as count from tools,article,sets where name like '%{$search}%'";
		}
	$res1=mysqli_query($con,$SQL1);
	$res2=mysqli_query($con,$SQL2);
	$row2=mysqli_fetch_assoc($res2);
	$count=$row2['count'];
	if($count ==0){
		header("location:./rjxz.php?search={$search}");
		exit;
	}
?>
<?php
				$pageCount=10;
				$nowPage=isset($_GET['nowPage']) ? $_GET['nowPage'] : 1;
				$start=($nowPage - 1) * $pageCount;
				if($nowPage > 1){
					$prevPage = $nowPage - 1;
				}else{
					$prevPage=1;
				}
				$resPage=mysqli_query($con,$totalPage);
				$rowPage=mysqli_fetch_assoc($resPage);
				$totalCount=ceil($rowPage['count'] / $pageCount);//一共有多少页
				if($nowPage < $totalCount){
					$nextPage = $nowPage + 1;
				} else{
					$nextPage = $totalCount;
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
					<li><a href="./rjxz-sousu.php">实例教程</a></li>
					<li><a href="./9.php">工具推荐</a></li>
				</ul>
				<form class="sy-form" action="./rjxz-sousu.php" method="get">
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
		<div class="top-sousu">
			<div class="small"></div>
			<div class="big"></div>
			<div class="ct">关于<?= $search?>的结果共<?= $count?>条</div>
			<div class="big"></div>
			<div class="small"></div>
		</div>
		<main class="margin-2em">
			<section class="sousu-content col-sm-11 col-lg-10 juzhong">
				<?php
				while($row1=mysqli_fetch_assoc($res1)){
					$name=$sort == 'example' ? "title" : "name";
				?>
				<li><a href="#"><?= $row1["{$name}"]?></a></li>
				<?php
				}
				?>
			</section>
		</main>
<section class="page col-sm-6 col-lg-6 flex juzhong">
			<a href="./rjxz-sousu.php?sort=<?= $sort?>&search=<?= $search?>&nowPage=1<?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">首页</a>
			<a href="./rjxz-sousu.php?sort=<?= $sort?>&search=<?= $search?>&nowPage=<?= $prevPage?>
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
				?>" href="./rjxz-sousu.php?sort=<?= $sort?>&search=<?= $search?>&nowPage=<?= $l?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>"><?= $l?></a>
			<?php
			}
			?>
			<a href="./rjxz-sousu.php?sort=<?= $sort?>&search=<?= $search?>&nowPage=<?= $nextPage?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
				}
			?>">下一页</a>
			<a href="./rjxz-sousu.php?sort=<?= $sort?>&search=<?= $search?>&nowPage=<?= $totalCount?><?php
				if(isset($_GET['id'])){
					echo "&id={$_GET['id']}";
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

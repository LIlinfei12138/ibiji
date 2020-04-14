	<?php
		require "./function.php";
		settime();
		$con=dbset();
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>主要内容区main</title>
	<link href="css/css.css" type="text/css" rel="stylesheet" />
	<link href="css/main.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="images/main/favicon.ico" />
	<style>
	body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
	#searchmain{ font-size:12px;}
	#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
	#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
	#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
	#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
	#search a.add{ background:url(images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
	#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
	#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
	#main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
	#main-tab td{ font-size:12px; line-height:40px;}
	#main-tab td a{ font-size:12px; color:#548fc9;}
	#main-tab td a:hover{color:#565656; text-decoration:underline;}
	.bordertop{ border-top:1px solid #ebebeb}
	.borderright{ border-right:1px solid #ebebeb}
	.borderbottom{ border-bottom:1px solid #ebebeb}
	.borderleft{ border-left:1px solid #ebebeb}
	.gray{ color:#dbdbdb;}
	td.fenye{ padding:10px 0 0 0; text-align:right;}
	.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
	.main-for{ padding:10px;}
	.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
	.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
	.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
	#addinfo a{ font-size:14px; font-weight:bold; background:url(images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
	#addinfo a:hover{ background:url(images/main/addinfoblue.jpg) no-repeat 0 1px;}
	.jianjie{
		width:310px;
		height:200px;
	}
	input[name="nandu"]{
		display:none;
	}
	label{
		display:inline-block;
		padding:1%;
		margin-right:0.5em;
		border: #b5b0b0 1px solid;
	}
	input[id="ND-one"]:checked+label,input[id="ND-two"]:checked+label,input[id="ND-three"]:checked+label,input[id="ND-four"]:checked+label{
		color:#529DDC;
	}
	</style>
	</head>
	<body>
	<!--main_top-->
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
	  <tr>
	    <td width="99%" align="left" valign="top">您的位置：系列教程&nbsp;&nbsp;>&nbsp;&nbsp;管理系列&nbsp;&nbsp;>&nbsp;&nbsp;修改</td>
	  </tr>
	  <tr>
	    <td align="left" valign="top" id="addinfo">
	    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">修改系列</a>
	    </td>
	  </tr>
	  <tr>
	    <td align="left" valign="top">
	    <form method="post" action="doupdate_series.php" enctype="multipart/form-data">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">选择分类：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <select name="cid">
				<?php
					$id=$_GET['id'];
					$oldCid=$_GET['oldCid'];
					$SQL1="select * from setCategory";
					$SQL2="select * from sets where id={$id}";
					$res1=mysqli_query($con,$SQL1);//第一个表里面的
					$res2=mysqli_query($con,$SQL2);//第二个表里面的
					$row2=mysqli_fetch_assoc($res2);
					while($row1=mysqli_fetch_assoc($res1)){
						$CateID=$row1['id'];
				?>
				<option <?= optionSel($CateID,$oldCid)?> name="cid" value="<?= $row1['id']?>">&nbsp;&nbsp;<?= $row1['name']?></option>
				<?php
				}
				?>
	        </select>
	        </td>
	      </tr>
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		    <td align="right" valign="middle" class="borderright borderbottom bggray">系列名：</td>
		    <td align="left" valign="middle" class="borderright borderbottom main-for">
		    <input type="text" name="series" value="<?= $row2['name']?>" class="text-word">
		    </td>
		   </tr>
		   <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		     <td align="right" valign="middle" class="borderright borderbottom bggray">难度等级</td>
		     <td align="left" valign="middle" class="borderright borderbottom main-for">
				 <input <?= star($row2['ilevel'],1)?> id="ND-one" type="radio" name="nandu" value="1" />
				 <label for="ND-one">★</label>
				 <input <?= star($row2['ilevel'],2)?> id="ND-two" type="radio" name="nandu" value="2" />
				 <label for="ND-two">★★</label>
				 <input <?= star($row2['ilevel'],3)?> id="ND-three" type="radio" name="nandu" value="3" />
				 <label for="ND-three">★★★</label>
				 <input <?= star($row2['ilevel'],4)?> id="ND-four" type="radio" name="nandu" value="4" />
				 <label for="ND-four">★★★★</label>
		     </td>
		     </tr>
			<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			 <td align="right" valign="middle" class="borderright borderbottom bggray">上传图片：</td>
			 <td align="left" valign="middle" class="borderright borderbottom main-for">
			 <input type="file" multiple name="photofile" value="" class="text-word">
			 </td>
			</tr>
			<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			  <td align="right" class="borderright borderbottom bggray">简介</td>
			  <td align="left" valign="top" class="borderright borderbottom main-for">
				<textarea name="jianjie" class="jianjie"><?= $row2['summary']?></textarea>
			  </td>
			</tr>
	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="hidden" name="id" value="<?= $_GET['id']?>" />
			<input type="hidden" name="oldCid" value="<?= $_GET['oldCid']?>" />
	        <input name="" type="submit" value="提交" class="text-but">
	        <input name="" type="reset" value="重置" class="text-but"></td>
	        </tr>
	    </table>
	    </form>
	    </td>
	    </tr>
	</table>
	</body>
	</html>
<?php
	mysqli_close($con);
?>
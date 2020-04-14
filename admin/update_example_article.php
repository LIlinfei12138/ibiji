<!DOCTYPE html>
<?php
	require "./function.php";
	require "./function_xc.php";
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
<link rel="stylesheet" type="text/css" href="./pro/editor/styles/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="./pro/editor/styles/simditor.css" />
<link rel="stylesheet" type="text/css" href="./pro/editor/styles/simditor-emoji.css" />
<script type="text/javascript" src="./pro/editor/scripts/jquery.min.js"></script>
<script type="text/javascript" src="./pro/editor/scripts/module.js"></script>
<script type="text/javascript" src="./pro/editor/scripts/uploader.js"></script>
<script type="text/javascript" src="./pro/editor/scripts/simditor.js"></script>
<script type="text/javascript" src="./pro/editor/scripts/simditor-emoji.js"></script>
<script type="text/javascript" src="./pro/editor/scripts/config.js"></script>
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
.article-content{
	width: 100%;
	height: 240px;
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
    <td width="99%" align="left" valign="top">您的位置：实例教程&nbsp;&nbsp;>&nbsp;&nbsp;管理分类&nbsp;&nbsp;>&nbsp;&nbsp;查看分类&nbsp;&nbsp;>&nbsp;&nbsp;修改</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">修改教程</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="./doupdate_example_article.php" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">修改系列：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="sid">
			<?php
				$id=$_GET['id'];
				$sid=$_GET['sid'];
				$SQL2="select * from article where id={$id}";
				$res2=mysqli_query($con,$SQL2);
				$row2=mysqli_fetch_assoc($res2);
				$SQL="select * from exampleCategory";
				$res=mysqli_query($con,$SQL);
				while ($row=mysqli_fetch_assoc($res)){
					$ID=$row['id'];
			?>
	    <option <?= optionSel($sid,$ID)?> value="<?= $row['id']?>" >&nbsp;&nbsp;<?= $row['name']?></option>
		<?php
		}
		?>
        </select>
        </td>
      </tr>
	  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	    <td align="right" valign="middle" class="borderright borderbottom bggray">文章标题：</td>
	    <td align="left" valign="middle" class="borderright borderbottom main-for">
	    <input type="text" name="title" value="<?= $row2['title']?>" class="text-word">
	    </td>
	   </tr>
	   	 <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	     <td align="right" valign="middle" class="borderright borderbottom bggray">上传图片：</td>
	     <td align="left" valign="middle" class="borderright borderbottom main-for">
	     <input type="file" multiple name="photofile" value="" class="text-word">
	     </td>
	    </tr>
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		  <td align="right" class="borderright borderbottom bggray">文章内容</td>
		  <td align="left" valign="top" class="borderright borderbottom main-for">
			<textarea id="editor" placeholder="这里输入内容" class="article-content" autofocus name="content"><?= $row2['content']?></textarea>
		  </td>
		</tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
		<input type="hidden" name="id" value="<?= $id?>" />
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
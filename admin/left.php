<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="images/main/member.gif" width="44" height="44" /></div>
	<?php
	//	$userName=$_GET['userName'];
	?>
    <span>用户：admin<br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>系列教程</span>
        <a href="main_addseriessort.html" target="mainFrame" onFocus="this.blur()">添加分类</a>
        <a href="main_list.php" target="mainFrame" onFocus="this.blur()">管理分类</a>
        <a href="main_info.php" target="mainFrame" onFocus="this.blur()">添加系列</a>
        <a href="main_message.php" target="mainFrame" onFocus="this.blur()">管理系列</a>
		<a href="main_add_course.php" target="mainFrame" onFocus="this.blur()">添加教程</a>
      </div>
      <div>
        <span>实例教程</span>
        <a href="./add_example_sort.html" target="mainFrame" onFocus="this.blur()">添加分类</a>
        <a href="./manage_example_sort.php" target="mainFrame" onFocus="this.blur()">管理分类</a>
        <a href="./add_example_article.php" target="mainFrame" onFocus="this.blur()">添加教程</a>
      </div>
      <div>
        <span>工具推荐</span>
        <a href="./add_tool_Category.html" target="mainFrame" onFocus="this.blur()">添加分类</a>
        <a href="./manage_tool_sort.php" target="mainFrame" onFocus="this.blur()">管理分类</a>
        <a href="./add_tools.php" target="mainFrame" onFocus="this.blur()">添加工具</a>
      </div>
    </div>
</body>
</html>
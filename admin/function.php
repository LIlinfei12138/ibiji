<?php
function settime(){
	return date_default_timezone_set('prc');
}
function dbset(){
	$con = @mysqli_connect('localhost','root','lxc1118');
	if(mysqli_connect_errno($con)){
		echo mysqli_connect_error($con).'('.mysqli_connect_errno($con).')';
		exit;
	}
	mysqli_select_db($con,'ibiji');
	mysqli_set_charset($con,'utf8');
	return $con;
}

	function star($starNum,$num){
		if ($starNum ==$num){
			return "checked";
		} else{
			return "";
		}
	}
	function optionSel($ID,$CID){
		if ($ID == $CID){
			return "selected";
		} else{
			return "";
		}
	}
?>
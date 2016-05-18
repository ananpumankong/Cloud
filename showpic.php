<?php 
	$id = $_GET['id'];

	mysql_connect("us-cdbr-azure-west-c.cloudapp.net","b287023b504590","03d275fa");
	mysql_select_db("acsm_17670caadcc3c49");

	$result = mysql_query("select fileType, fileContent from products where PID = $id")or die(mysql_error());
	$type = mysql_result($result, 0, 'fileType');
	$content = mysql_result($result, 0, 'fileContent');

	// header("content-Disposition: attachment; filename=aaa.jpg");
	header("Content-type: $type");
	echo $content;
?>
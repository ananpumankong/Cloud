<?php
session_start();
mysql_connect("us-cdbr-azure-west-c.cloudapp.net","b287023b504590","03d275fa");
mysql_select_db("acsm_17670caadcc3c49");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_results='UTF8'");
  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orders (OrderDate,Name,Address,Tel,Email)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtname"]."','".$_POST["txtaddress"]."' ,'".$_POST["txttel"]."','".$_POST["txtemail"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO orders_detail (OrderID,ProductID,Qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }

mysql_close();

session_destroy();

header("location:finishorder.php?OrderID=".$strOrderID);
?>
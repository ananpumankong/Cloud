<?php

session_start();
include ("Connect_To_Database.php");

$USERNAME = $_POST['USERNAME'];
$PASSWORD = $_POST['PASSWORD'];
$PASSWORDenc = md5($PASSWORD);


$strSQL = "SELECT * FROM giswebdatabase WHERE USER_ID = '$USERNAME'
	and PASSWORD = '$PASSWORDenc'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if (!$objResult) {
    echo (3);
} 
else 
{

    $_SESSION["ID"]      = $objResult["ID"];
    $_SESSION["STATUS"]  = $objResult["STATUS"];
    $_SESSION["USER_ID"] = $objResult["USER_ID"];
	
 

    if ($objResult["STATUS"] == "ADMIN") {
        echo (1);
    } else if ($objResult["STATUS"] == "USER") 
	{
		$_SESSION['LAST_ACTIVITY'] = time();
        echo (2);
    }
	
}
session_write_close();
mysql_close($objConnect);
?>


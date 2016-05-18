<?php
$strMode = $_POST["SelectMode"];


$USER_ID = $_POST["USER_ID"];
$PASSWORD = $_POST["PASSWORD"];
$PASSWORDNEW = md5($PASSWORD);
$EMAIL = $_POST["EMAIL"];
$data_id = $_POST["BD"];
$STATUS = $_POST["STATUS"];

include ("Connect_To_Database.php");


if ($strMode == "INSERT") {
    
    $strSQL = "INSERT INTO giswebdatabase (USER_ID,PASSWORD,EMAIL,BD,STATUS)VALUES ('$USER_ID','$PASSWORDNEW','$EMAIL','$data_id','$STATUS')";
    $objQuery = mysql_query($strSQL);   
}
if($objQuery)
{
    echo 1;
}
else{
    echo 0;
}

?>

<?php
$strMode = $_POST["SelectMode"];


$NAME = $_POST["NAME"];
$SURNAME = $_POST["SURNAME"];
$EMAIL = $_POST["EMAIL"];
$TITLE = $_POST["TITLE"];
$MSG = $_POST["MSG"];

include ("Connect_To_Database.php");


if ($strMode == "INSERT") {
    
    $strSQL = "INSERT INTO contact (NAME,SURNAME,EMAIL,TITLE,MSG)VALUES ('$NAME','$SURNAME','$EMAIL','$TITLE','$MSG')";
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
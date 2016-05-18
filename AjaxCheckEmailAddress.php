<?php

$strMode = $_POST["SelectMode"];
$EMAIL = $_POST["EMAIL"];

include ("Connect_To_Database.php");



if ($strMode == 'CheckEmail') {
    $strSQL = "SELECT * FROM giswebdatabase WHERE EMAIL = '$EMAIL' ";
    $objQuery = mysql_query($strSQL);
    $row = mysql_num_rows($objQuery);
}

if ($row > 0) {
    echo 1;
} else {
    echo 0;
}
?>

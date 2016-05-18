<?php

$strMode = $_POST["SelectMode"];
$USER_ID = $_POST["USER_ID"];

include ("Connect_To_Database.php");



if ($strMode == 'CheckName') {
    $strSQL = "SELECT * FROM giswebdatabase WHERE USER_ID = '$USER_ID' ";
    $objQuery = mysql_query($strSQL);
    $row = mysql_num_rows($objQuery);
}

if ($row > 0) {
    echo 1;
} else {
    echo 0;
}
?>

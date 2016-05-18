<?php
    //$host = server, ip, computer - name;
    //$user = user;
    //$pass = password;
    $host = "us-cdbr-azure-west-c.cloudapp.net";
    $user = "b287023b504590";
    $pass = "03d275fa";
    $objConnect = mysql_connect($host, $user, $pass);
    $objSelectDB = mysql_select_db("acsm_17670caadcc3c49");
   
  /*  if ($objSelectDB) {
        echo "Connect sure";
    } else {
        echo "Database Connect Failed.";
    }*/

    //mysql_close($objConnect); 

?>
   
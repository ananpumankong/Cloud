<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>shopping homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/step_page.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
				

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="image/logo.png" alt="" /></a>
						</div>
						
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						
							<ul class="nav navbar-nav">
							
							
								<li><img class="circular"src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=50&height=50"></li>
								<li><a href="profile.php"><i class="fa fa-user"></i>บัญชีผู้ใช้</a></li>
								<li><a href="select.php"><i class="fa fa-shopping-cart"></i>รถเข็น</a></li>
								<li><a href="step.html"><i class="fa fa-qrcode"></i> ขั้นตอนการสั่งซื้อ</a></li>
								<li><a href="contact.html"><i class="fa fa-crosshairs"></i>ติดต่อเรา</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> ออกจากระบบ</a></li>
							</ul>
							
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
        <!-- /.container -->
    </nav>
<?php

if(!isset($_SESSION["intLine"]))
{
	echo "ไม่มีการสั่งซื้อสินค้า";
	exit();
}

mysql_connect("us-cdbr-azure-west-c.cloudapp.net","b287023b504590","03d275fa");
mysql_select_db("acsm_17670caadcc3c49");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_results='UTF8'");


?>
    <!-- Page Content -->
    <div class="container">
	<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#รหัสสินค้า ชื่อสินค้า</th>
						<th class="text-center">จำนวน</th>
                        <th class="text-center">ราคา</th>
                        <th class="text-center">ราคารวม</th>
                        <th> </th>
                    </tr>
					
                </thead>
                <tbody>
								<?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM products WHERE PID = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="showpic.php?id=<?php echo $objResult['PID']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"></a>#<?php echo $_SESSION["strProductID"][$i];?></h4>
								 <h4 class="media-heading"><a href="#"></a><?php echo $objResult["PName"];?></h4>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $_SESSION["strQty"][$i];?>ชิ้น</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $objResult["Price"];?>บาท</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($Total,2);?>บาท</strong></td>
                        
                    </tr>
                   <?php
	  }
  }
  ?>
                   
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>ราคารวม</h3></td>
                        <td class="text-right"><h3><strong> <?php echo number_format($SumTotal,2);?>บาท</strong></h3></td>
                    </tr>
					<tr>
					<h2>กรุณากรอกข้อมูลสำหรับจัดส่งสินค้า</h2>
					<br></br>
                    
                       <form name="form1" method="post" action="save_checkout.php">
						<h4>ชื่อ-นามสกุล</h4>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-user"style = "font-size:20px;"></span></span>
						<input maxlength=50 type="text" name="txtname" id = "RegisterUsername" class="form-control"  data-mini="true" placeholder="กรุณาใส่ชื่อผู้ใช้งาน" aria-describedby="basic-addon2">
					</div>
					<h4>ที่อยู่</h4>
					<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"style = "font-size:20px;"></span></span>
							<textarea maxlength=100 type="text" name="txtaddress" id = "RegisterPassword"  data-mini="true" class="form-control" placeholder="กรุณาใส่ที่อยู่สำหรับการจัดสง" aria-describedby="basic-addon1"></textarea>
					</div>
					 <h4>เบอร์โทรศัพท์</h4>
					<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"style = "font-size:20px;"></span></span>
							<input maxlength=20 type="text" name="txttel" id = "emp_birtdate"  data-mini="true" class="form-control" placeholder="กรุณาใส่เบอร์โทรศัพท์" aria-describedby="basic-addon1">
					</div>
					
					<h4>อีเมล์</h4>
					<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"style = "font-size:20px;"></span></span>
							<input maxlength=50 type="text" name="txtemail" id = "RegisterEMAIL"  data-mini="true" class="form-control" placeholder="กรุณาใส่อีเมล" aria-describedby="basic-addon1">
					</div>
					<br></br>
					<a><input type="submit" name="Submit" value="ยืนยันการสั่งซื้อ"type="button" class="btn btn-success"></a>
					</form> 
				
                    </tr>
					
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
						<a href="index.php" class="btn btn-default" ><span class="glyphicon glyphicon-shopping-cart"></span> ช๊อปปิ้งต่อ</a></td>
                        <td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
<footer>
        <!-- Footer -->
       

		
    <!-- /.container -->
	</footer><!--/Footer-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<?php
mysql_close();
?>
</body>
<


</html>


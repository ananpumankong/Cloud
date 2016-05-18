
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
	<link href="css/viwe.css" rel="stylesheet">

</head>

<body>
				

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="image/logo.png" alt="" /></a>
						</div>
						
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						
							<ul class="nav navbar-nav">
							
							
								
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



mysql_connect("us-cdbr-azure-west-c.cloudapp.net","b287023b504590","03d275fa");
mysql_select_db("acsm_17670caadcc3c49");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_results='UTF8'");

$strSQL = "SELECT * FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
$objResult = mysql_fetch_array($objQuery);
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

$strSQL2 = "SELECT * FROM orders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysql_query($strSQL2)  or die(mysql_error());

while($objResult2 = mysql_fetch_array($objQuery2))
{
		$strSQL3 = "SELECT * FROM products WHERE PID = '".$objResult2["ProductID"]."' ";
		$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
		$objResult3 = mysql_fetch_array($objQuery3);
		$Total = $objResult2["Qty"] * $objResult3["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	 
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="showpic.php?id=<?php echo $objResult2['ProductID']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"></a>#<?php echo $objResult2["ProductID"];?></h4>
								 <h4 class="media-heading"><a href="#"></a><?php echo $objResult3["PName"];?></h4>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $objResult2["Qty"];?>ชิ้น</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $objResult3["Price"];?>บาท</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($Total,2);?>บาท</strong></td>
                        
                    </tr>
                   <?php
	  }
  
  ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>ราคารวม</h3></td>
                        <td class="text-right"><h3><strong><?php echo number_format($SumTotal,2);?>บาท</strong></h3></td>
                    </tr>
				<h1>ข้อมูลการสั่งซื้อสินค้า</h1>
				<div class="col-sm-8 col-md-6">
						<div class="container">
							<div class="notice notice-success">
								<strong><h4>รหัสการสั่งซื้อ</h4></strong>#<?php echo $objResult["OrderID"];?>
							</div>
							<div class="notice notice-danger">
								<strong><h4>ชื่อ-นามสกุล</h4>:</strong><?php echo $objResult["Name"];?>
							</div>
							<div class="notice notice-info">
								<strong><h4>ที่อยู่</h4>:</strong><?php echo $objResult["Address"];?>
							</div>
							<div class="notice notice-warning">
								<strong><h4>เบอร์โทรศัพท์</h4>:</strong><?php echo $objResult["Tel"];?>
							</div>
							<div class="notice notice-success">
								<strong><h4>อีเมล์</h4>:</strong><?php echo $objResult["Email"];?>
							</div>
    
						</div>
					</div>
					
					
					
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
						
                        <td>
                        <a href="clear.php" type="button" class="btn btn-success">กลับสู่หน้าหลัก<span class="glyphicon glyphicon-play"></span></a></td>
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


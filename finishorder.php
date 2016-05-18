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



    <!-- Page Content -->
    <div class="container">
	
   Finish Your Order. <br><br>

<a href="viwe_order.php?OrderID=<?php echo $_GET["OrderID"];?>">View Order</a>

    </div>
<footer>
        <!-- Footer -->
       

		
    <!-- /.container -->
	</footer><!--/Footer-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>



</html>


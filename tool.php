<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>tool_page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		<div class="col-md-10">
				<h1>เครื่องมือช่าง(Tools)</h1>
				<div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="image/tool1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/tool2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/tool3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
				</div>

            <div class="col-md-2">
                <p class="lead">หมวดหมู่สินค้า</p>
				
                <div class="list-group">
                   <a href="boad.php" class="list-group-item">บอร์ด</a>
                    <a href="motor.php" class="list-group-item">มอเตอร์</a>
                    <a href="servo.php" class="list-group-item">เซอร์โวมอเตอร์</a>
					<a href="tool.php" class="list-group-item">เครื่องมือช่าง</a>
                    <a href="3d.php" class="list-group-item">อุปกรณ์เครื่อง 3D</a>
                    <a href="sensor.php" class="list-group-item">เซนเซอร์และโมดูล</a>
                </div>
				
            </div>

                <div class="row">
				<?php
               mysql_connect("us-cdbr-azure-west-c.cloudapp.net","b287023b504590","03d275fa");
	           mysql_select_db("acsm_17670caadcc3c49");
				$strSQL = mysql_query("select * from products where Type=5 order by PID desc ")or die(mysql_error());
                while($objResult = mysql_fetch_array($strSQL)){
                    ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="showpic.php?id=<?php echo $objResult['PID']; ?>"style="width: 300px; height: 150px;">
                            <div class="caption">
                                <h4 class="pull-right">ราคา :<?php echo $objResult['Price'] ?>บาท</h4>
                                <h4><a href="#"><?php echo $objResult['PName']; ?></a>
                                </h4>
                                <p><?php echo $objResult['Detail'] ?>...</p>
                            </div>
                            <div class="ratings">
							<a class="btn btn-default btn-primary" href="order.php?PID=<?php echo $objResult["PID"];?>">สั่งซื้อ</a>
                            </div>
                        </div>
                    </div>
                    <?php
					}
					?>
                    
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
	<footer id="footer">
		<div class="container">

        <hr>

        <!-- Footer -->
       <div class="footer-bottom">
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +66 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ceananmix@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
			
		</div><!--/header_top-->
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015  Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a>ANAN TEERAPAT PANUWIT</a></span></p>
				</div>
			</div>
		</div>
		</div>
		
	

		
    <!-- /.container -->
	</footer><!--/Footer-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

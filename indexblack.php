
<?php
mysql_connect("localhost","root","");
mysql_select_db("my_database_gis");
$strSQL = "SELECT * FROM product";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>shopping homepage</title>

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
							<a href="index.html"><img src="image/logo.png" alt="" /></a>
						</div>
						
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						
							<ul class="nav navbar-nav">
							
							
								<li><a href="profile.html"><i class="fa fa-user"></i>บัญชีผู้ใช้</a></li>
								<li><a href="select.php"><i class="fa fa-shopping-cart"></i>รถเข็น</a></li>
								<li><a href="step.html"><i class="fa fa-qrcode"></i> ขั้นตอนการสั่งซื้อ</a></li>
								<li><a href="contact.html"><i class="fa fa-crosshairs"></i>ติดต่อเรา</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> </a></li>
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

            <div class="col-md-2">
                <p class="lead">หมวดหมู่สินค้า</p>
                <div class="list-group">
                    <a href="boad.html" class="list-group-item">บอร์ด</a>
                    <a href="motor.html" class="list-group-item">มอเตอร์</a>
                    <a href="servo.html" class="list-group-item">เซอร์โวมอเตอร์</a>
					<a href="tool.html" class="list-group-item">เครื่องมือช่าง</a>
                    <a href="3d.html" class="list-group-item">อุปกรณ์เครื่อง 3D</a>
                    <a href="sensor.html" class="list-group-item">เซนเซอร์และโมดูล</a>
                </div>
				
            </div>

            <div class="col-md-9">

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
                                    <img class="slide-image" src="image/a.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/arduino.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/c.jpg" alt="">
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

                <div class="row">
                <?php
				while($objResult = mysql_fetch_array($objQuery))
					{
				?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/<?php echo $objResult["Picture"];?>" style="width:200px">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $objResult["Price"];?>บาท</h4>
                                <h4><a href="#"><?php echo $objResult["ProductName"];?></a>
                                </h4>
                                <p><?php echo $objResult["detail"];?>...</p>
                            </div>
                            <div class="ratings">
							<a class="btn btn-default btn-primary" href="order.php?ProductID=<?php echo $objResult["ProductID"];?>">สั่งซื้อ</a>
                            </div>
                        </div>
                    </div>
                   <?php
  }
  ?>

                </div>
					<div class= "col-sm-12">
			<hr></hr>
			</div>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">สินค้าขายดี</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd4.jpg" alt="" />
													<h2>500บาท</h2>
													<p>มอเตอร์</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd3.jpg" alt="" />
													<h2>100บาท</h2>
													<p>เซ็นเซอร์วัดระยะ</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd2.jpg" alt="" />
													<h2>359บาท</h2>
													<p>บอร์ดArduino Uno R3</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd1.jpg" alt="" />
													<h2>400บาท</h2>
													<p>ชุดสว่านไฟฟ้า</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd5.jpg" alt="" />
													<h2>250บาท</h2>
													<p>เครื่องวัดไฟฟ้า</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="image/kd6.jpg" alt="" />
													<h2>129บาท</h2>
													<p>ตะไบ</p>
													<button type="submit" class="btn btn-default btn-primary">สั่งซื้อ</button>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
                    

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
<?php
mysql_close();
?>
</html>
</body>	



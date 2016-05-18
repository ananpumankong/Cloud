<?php
session_start(); 
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">

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
    <link href="css/viwe.css" rel="stylesheet">

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
							<li>
							<img class="circular" src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=1500&height=1500"></li>
								<li><a href="profile.php"><i class="fa fa-user"></i><?php echo $_SESSION['FULLNAME']; ?></a></li>
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
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				
    <!-- Page Content -->
    <div class="containe">
		
    <div class="card hovercard">
        <div class="card-background">
            <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=1500&height=1500">
            
        </div>
        <div class="useravatar">
            <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=1500&height=1500">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $_SESSION['FULLNAME']; ?></span>

        </div>
    </div>
	
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs"><p>โปรไฟล์(Profile)</p></div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        
        <div class="tab-pane fade in" id="tab2">
         <h4>ชื่อผู้ใช้งาน</h4><h3><?php echo $_SESSION['FULLNAME']; ?></h3>
		 <h4>ID</h4><h3><?php echo $_SESSION['FBID']; ?></h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
		
          <h4>ชื่อผู้ใช้งาน  </h4>
		  <div class="input-group">
						<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-user"style = "font-size:20px;"></span></span>
						<input maxlength=16 type="text" name="RegisterUsername" id = "RegisterUsername" class="form-control"  data-mini="true" placeholder="" aria-describedby="basic-addon2">
					</div>
					
		 <h4>เปลี่ยนรหัสผ่าน</h4>
		 <div class="input-group">
						<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-repeat"style = "font-size:20px;"></span></span>
						<input maxlength=16 type="text" name="RegisterUsername" id = "RegisterUsername" class="form-control"  data-mini="true" placeholder="" aria-describedby="basic-addon2">
					</div>
					
				
		 <h4>อีเมล์</h4>
		 <div class="input-group">
						<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-envelope"style = "font-size:20px;"></span></span>
						<input maxlength=16 type="text" name="RegisterUsername" id = "RegisterUsername" class="form-control"  data-mini="true" placeholder="" aria-describedby="basic-addon2">
					
					</div>
		 <div class="form-group">
						<label for="exampleInputFile"><h4>รูปภาพ</h4></label>
						<p><input type="file" id="exampleInputFile"></p>
						<p class="help-block "></p>
					</div>
		 
		 
		 <hr></hr><button type="submit" class="btn btn-default btn-primary btn-center"><p>อัพเดทโปรไฟล์</p></button></div>
					
        
     </div>
	</div>	 
   </div>

            
    
        

    </div>
    <!-- /.container -->
	<footer id="footer">
		
    <!-- /.container -->
	</footer><!--/Footer-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>


</html>
